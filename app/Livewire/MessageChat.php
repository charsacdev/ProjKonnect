<?php

namespace App\Livewire;

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
use Illuminate\Support\Facades\URL;
use App\Mail\MessageEmail;

class MessageChat extends Component
{
    use  WithFileUploads;

    public $proguideId;

    public $studentsMessagesChain,$ChatsMessage,$userDetails;

    #send Message details
    public $message,$receiver_id,$file;

    protected $rules = [
        'message' => 'required|string',
    ];

    #Message ChainList
    public function mount(){

        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        $userId=auth()->guard('web')->user()->id;
        $this->studentsMessagesChain = StudentCourseAdding::with(['proguideChat', 'chats' => function ($query) use ($userId) {
            $query->where('sender_id', $userId)->orWhere('receiver_id', $userId)->orderBy('created_at', 'desc');
        }])
        ->where(['student_id' => $userId, 'payment_status' => 'paid'])
        ->orderBy('created_at', 'asc')
        ->get()
        ->unique('proguide_id');

        #dd($this->studentsMessagesChain);

        #User details
        $this->userDetails=UsersTables::where(['id'=>$this->lastSegment])->first();

        if($this->userDetails==TRUE){
                #message Receiver Id and get message
                $this->proguideId=$this->lastSegment;
                $this->showMessage($this->lastSegment);
                $this->receiver_id=$this->lastSegment;
        }
        else{
              
        }

       
    }


    public function showMessage($proguideId){
        
        $userId = auth()->guard('web')->user()->id;
        $ProguideId=$this->proguideId;

        #Fetch the student details
        $student = UsersTables::findOrFail($ProguideId);
       
        #Fetch the chat messages between the authenticated user and the selected student
        $chats = ChatMessage::where(function ($query) use ($userId, $proguideId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $proguideId);
        })->orWhere(function ($query) use ($userId, $proguideId) {
            $query->where('sender_id', $proguideId)
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
                $ProguideId=$this->proguideId;
               
                #Fetch the chat messages between the authenticated user and the selected student
                $chats = ChatMessage::where(function ($query) use ($userId, $ProguideId) {
                    $query->where('sender_id', $userId)
                        ->where('receiver_id', $ProguideId);
                })->orWhere(function ($query) use ($userId, $ProguideId) {
                    $query->where('sender_id', $ProguideId)
                        ->where('receiver_id', $userId);
                })
                ->orderBy('created_at', 'asc')
                ->get();

                $this->ChatsMessage=$chats;

                $lastSenderId = null;
                $consecutiveMessages = 0;
                foreach ($chats as $message) {
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

                #dd($consecutiveMessages);

                 #Check if the consecutive messages are 5 or more
                 if($consecutiveMessages >= 3) {
                    #send email
                   
                   
                    #show all messages
                    $this->message = '';
                    $this->file="";
                    $this->showMessage($this->receiver_id);

                     #Fetch the Proguide details
                     $ProguideDetails = UsersTables::where('id',$ProguideId)->first();

                    
                     $proguideName=$ProguideDetails->full_name;
                     $studenName=auth()->guard('web')->user()->full_name;
                     $proguideEmail=$ProguideDetails->email;
                     $messagCount=$consecutiveMessages;

                     #dd($consecutiveMessages);
                     Mail::to($proguideEmail)->send(new MessageEmail($proguideName,$studenName,$proguideEmail,$messagCount));
                     
                     
                }

                #show all messages
                $this->message = '';
                $this->file="";
                $this->showMessage($this->receiver_id);

        }
        catch(\Throwable $g){

            #session()->flash('error','An error occured please try again.');
            #dd($g->getMessage());
        }

        
    }


    public function render()
    {
        return view('livewire.message-chat');
    }
}
