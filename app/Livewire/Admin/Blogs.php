<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\AdminWebTable;
use App\Models\Blog;

class Blogs extends Component
{
    public $AllPosts,$PostId,$title;

    #protected $listeners = ['EditBlog'];

    protected $listeners = ['EditBlog'];

    #mount function
    public function mount(){
      
        $this->AllPosts=Blog::where(['author_id'=>auth()->guard('admin')->user()->id])->latest()->get();
        #dd($this->AllPosts);
        

 
    }

    #Edit Blog
    public function EditBlog($value){
        #dd($value);
        try{
        
           #getBlog Title
            $BlogTitle=Blog::where(['id'=>$value])->first();

            $this->title=$BlogTitle->blog_title;

            $this->PostId=$value;
            
        }
        catch(\Throwable $g){
            //do nothing
            #dd('error');
        }
        
    }

    public function render()
    {
        return view('livewire.admin.blogs');
    }
}
