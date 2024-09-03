<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\ChatMessage;
use App\Models\StudentCourseAdding;
use App\Models\UsersTables;
use Livewire\WithFileUploads;
use App\Mail\MessageEmail;
use Illuminate\Support\Facades\URL;

class Message extends Component
{
    use  WithFileUploads;

    public $studentId;

    public $studentsMessagesChain,$ChatsMessage,$userDetails;

    #send Message details
    public $message,$receiver_id,$file,$consecutiveMessagesCount;


    protected $rules = [
        'message' => 'required|string',
    ];

    #Message ChainList
    public function mount(){

        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        $userId=auth()->guard('web')->user()->id;
        $this->studentsMessagesChain = StudentCourseAdding::with(['student', 'chats' => function ($query) use ($userId) {
            $query->where('sender_id', $userId)->orWhere('receiver_id', $userId)->orderBy('created_at', 'desc');
        }])
        ->where(['proguide_id' => $userId, 'payment_status' => 'paid'])
        ->orderBy('created_at', 'asc')
        ->get()
        ->unique('student_id');

        #User details
        $this->userDetails=UsersTables::where(['id'=>$this->lastSegment])->first();

        if($this->userDetails==TRUE){

                $this->studentId=$this->lastSegment;
                $this->receiver_id=$this->lastSegment;

                #message Receiver Id and get message
                $this->ShowMessages();
      
        }
        else{

        }

       
    }


    public function ShowMessages(){
        
        $userId = auth()->guard('web')->user()->id;
        $StudentsId=$this->studentId;

        #Fetch the student details
        $student = UsersTables::findOrFail($StudentsId);

        #Fetch the chat messages between the authenticated user and the selected student
        $chats = ChatMessage::where(function ($query) use ($userId, $StudentsId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $StudentsId);
        })->orWhere(function ($query) use ($userId, $StudentsId) {
            $query->where('sender_id', $StudentsId)
                ->where('receiver_id', $userId);
        })
        ->orderBy('created_at', 'asc')
        ->get();
        $this->ChatsMessage=$chats;


    }

  

    #Send Message
    public function sendMessage(){
        try{

            
            
                #$files
                if(is_file($this->file)){

                    $this->validate([
                        'file'=>'mimes:jpg,bmp,png,jpeg,mp4,mov,ogg,qt,mkv,pdf,msword,txt',
                    ]);
                    $ext = $this->file->extension();
                    $sizeFile = $this->file->getSize();

                    #upload file AWS
                    $files=$this->file->store('/', 'chat_files');
                
                    #file URL
                    $fileUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/chat_files/".$files;

                    
                }
                
                #chat code
                if (auth()->guard('web')->user()->id > $this->receiver_id) {
                    $code = auth()->guard('web')->user()->id . "" . $this->receiver_id;
                } 
                else {
                    $code = $this->receiver_id . "" . auth()->guard('web')->user()->id;

                }
            
                ChatMessage::create([
                    'sender_id' => auth()->guard('web')->user()->id,
                    'receiver_id' => $this->receiver_id,
                    'message' => $this->message,
                    'files' => $fileUrl ?? null,
                    'chat_code' => $code,
                    'file_type' => $ext ?? null,
                    'file_size'=> $sizeFile ?? null,
                ]);

                
                
    #==================Send Email on 3 Messages no Reply========================#
    
                $userId = auth()->guard('web')->user()->id;
                
                $StudentsId=$this->studentId;

                
                #Fetch the chat messages between the authenticated user and the selected student
                $Checkchats = ChatMessage::where(function ($query) use ($userId, $StudentsId) {
                    $query->where('sender_id', $userId)
                        ->where('receiver_id', $StudentsId);
                })->orWhere(function ($query) use ($userId, $StudentsId) {
                    $query->where('sender_id', $StudentsId)
                        ->where('receiver_id', $userId);
                })
                ->orderBy('created_at', 'asc')
                ->get();

                
                $this->ChatsMessage=$Checkchats;

        
                $lastSenderId = null;
                $consecutiveMessages = 0;
                foreach ($Checkchats as $message) {
                    if ($message->sender_id === $userId) {
                        if ($message->sender_id === $lastSenderId) {
                            $consecutiveMessages++;
                        } else {
                            $consecutiveMessages = 1;
                        }
                        $lastSenderId = $message->sender_id;
                    } else {
                        $consecutiveMessages = 0;
                    }

                    
                }

                #Check if the consecutive messages are 5 or more
                if ($consecutiveMessages >= 3) {
                    
                    $this->message = '';
                    $this->file="";
                    
                     #Fetch the student details
                     $StudentDetails = UsersTables::where('id',$StudentsId)->first();

                     $proguideName=$StudentDetails->full_name;
                     $studenName=auth()->guard('web')->user()->full_name;
                     $proguideEmail=$StudentDetails->email;
                     $messagCount=$consecutiveMessages;
 
                     Mail::to($proguideEmail)->send(new MessageEmail($proguideName,$studenName,$proguideEmail,$messagCount));
                     
                     #dd($consecutiveMessages);
                     
                     $this->ShowMessages($this->receiver_id);

                }

                $this->message = '';
                $this->file="";
                $this->ShowMessages($this->receiver_id);
                

        }
        catch(\Throwable $g){

            #session()->flash('error','An error occured please try again.');
            #dd($g->getMessage());
        }

        
    }

    


    public function render()
    {
        return view('livewire.proguides.message');
    }
}
