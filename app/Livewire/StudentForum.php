<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\Forum;
use App\Models\ForumComments;
use Illuminate\Support\Facades\URL;

class StudentForum extends Component
{
    use WithFileUploads,WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $discussion,$file;

    public $paginate;

    public $forumDisscusssion,$forumId,$userComment,$getAllComment;

    protected $rules = [
        'discussion' => 'required',
        'file'=>'nullable|mimes:jpg,bmp,png,jpeg,mp4,mov,ogg,qt,mkv,pdf,msword,txt',  
    ];
     public function updated($propertyName){

        $this->validateOnly($propertyName);
      
    }


    public function mount(){

        $this->paginate="10";
        $userId=auth()->guard('web')->user()->id;

        #Forum Details
        $url = URL::current(); 
        $segments = explode("/",$url);

        #dd($segments);

        if(isset($segments[4])){
            $this->forumId=base64_decode($segments[4]);

            $this->forumDisscusssion=Forum::with(['student'])->where(['id'=>$this->forumId])->first();
            if($this->forumDisscusssion){
                 #show comments
                 $this->ShowComment($this->forumId);
            }
            else{
                return redirect('/student-forum');
            }

           

        }

    }

    #insert a forum discussion
    public function CreateDiscussion(){

        try{

            $userId=auth()->guard('web')->user()->id;

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

             $insertForum=Forum::create([
                'user_id' => $userId,
                'forum_discussion' => $this->discussion,
                'forum_file'=>$fileUrl ?? null,
                'file_type' => $ext ?? null,
                'file_size'=> $sizeFile ?? null,
                'like_forum'=>'0',
                'dislike_forum'=>'0'
            ]);

            if($insertForum){
                session()->flash('success','A new discussion added');
                return redirect('/student-forum');
            }

        }
        catch(\Throwable $g){

            session()->flash('error','An error occured please try again.');
            #dd($g->getMessage());
        }

        
    }


    #Delete Discussion
    public function DeleteDiscussion($id){
        try{
            $DeleteForum=Forum::where('id',$id)->delete();
            $DeleteReplies=ForumComments::where('forum_id',$id)->delete();
            if($DeleteReplies){
                session()->flash('error','Forum deleted successfully');
            }


        }
        catch(\Throwable $g){

            session()->flash('error','An error occured please try again.');
            #dd($g->getMessage());
        }
    }




    #Insert Comment Session
    public function CreateComment(){

        try{
             $userId=auth()->guard('web')->user()->id;
             $insertComment=ForumComments::create([
                'forum_id'=>$this->forumId,
                'user_id'=>$userId,
                'comment'=>$this->userComment,
                'like'=>'',
                'dislike'=>'',
            ]);

            if($insertComment){
                session()->flash('comment_success','comment added');

                $this->userComment="";
                $this->render();
                $this->ShowComment($this->forumId);
                
            }

        }
        catch(\Throwable $g){

            #session()->flash('comment_error','An error occured please try again.');
            dd($g->getMessage());
        }

        
    }

    #Show Comment
    public function ShowComment($commentId){
        try{
            $getComment=ForumComments::with('student')->where([
                'forum_id'=>$commentId, 
            ])->get();

            $this->getAllComment=$getComment;
        }
        catch(\Throwable $g){
            #session()->flash('comment_error','An error occured please try again.');
            dd($g->getMessage());
        }
    }


    #Delete Discussion
    public function DeleteComment($id){
        try{
            $userId=auth()->guard('web')->user()->id;
            $DeleteReplies=ForumComments::where(['id'=>$id,'user_id'=>$userId])->delete();
            if($DeleteReplies){
                $this->render();
                session()->flash('comment_error','comment deleted successfully');
                
            }
        }
        catch(\Throwable $g){

            #session()->flash('error','An error occured please try again.');
            dd($g->getMessage());
        }
    }



    #like and dislike of comment
    public function like(){

    }



    public function render()
    {
        $userId=auth()->guard('web')->user()->id;

        #Paginate Articles
        $otherforum=Forum::where('user_id', '!=', $userId)->paginate($this->paginate);
        $myforum=Forum::where(['user_id'=>$userId])->paginate($this->paginate);

        #Paginate Comment
        $getComment=ForumComments::with('student')->where([
            'forum_id'=>$this->forumId, 
        ])->latest()->paginate($this->paginate);
    


        return view('livewire.student-forum',['otherforum'=>$otherforum,'myforum'=>$myforum,'getComment'=>$getComment]);
    }
}
