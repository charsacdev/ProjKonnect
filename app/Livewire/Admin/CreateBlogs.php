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
use Livewire\WithFileUploads;

class CreateBlogs extends Component
{
    use  WithFileUploads;

    

    #public variables 
    public $thumbnail,$title,$content,$parent=[
        'tags' => []
    ];
    public $summernoteEditor;

  
    #mount function
    public function mount(){
 
    }

    #Method to add a tag
    public function addTag($tag)
    {
        $tag = trim($tag); // Clean up the input
        if ($tag && !in_array($tag, $this->parent['tags'])) {
            $this->parent['tags'][] = $tag;  // Add the tag to the array
        }
    }

    #Method to remove a tag by its index
    public function removeTag($index)
    {
        if (isset($this->parent['tags'][$index])) {
            unset($this->parent['tags'][$index]);  // Remove the tag by index
            $this->parent['tags'] = array_values($this->parent['tags']);  // Re-index the array
        }
    }

    #add new Author
    public function AddBlog(){
        
        try{

              #banner file
              $thumbnail=$this->thumbnail->store('/', 'blog_photo');
              $bannerUrl="https://myprojkonnect-s3bucket.s3.amazonaws.com/blog_photo/".$thumbnail;

              #insert into course table
              $blogUpload=Blog::create([
                  'author_id'=>auth()->guard('admin')->user()->id,
                  'author_name'=>auth()->guard('admin')->user()->first_name." ".auth()->guard('admin')->user()->last_name,
                  'blog_photo'=>$bannerUrl,
                  'blog_title'=>$this->title,
                  'blog_content'=>$this->content,
                  'blog_views'=>'0',
                  'blog_tags'=>json_encode($this->parent),
                  'positive'=>'0',
                  'negetive'=>'0'
              ]);
          
             if($blogUpload){
                session()->flash('success','Post Publised Successfully');
                return redirect('admin-projkonnect/blogs');
             }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured please try again');
            #return redirect('admin-projkonnect/create-blogs');
            #dd($g->getMessage());
        }
      
    }

    public function render()
    {
        return view('livewire.admin.create-blogs');
    }
}
