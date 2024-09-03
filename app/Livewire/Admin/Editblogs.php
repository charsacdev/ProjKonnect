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
use Illuminate\Support\Facades\URL;
use Livewire\WithFileUploads;


class Editblogs extends Component
{
    use  WithFileUploads;

    #public variable blogs
    public $BlogDetails,$lastSegment;

    #Blogs Post Details
    public $thumbnail_photo,$blog_id,$title,$description,$parent=[
        'tags' => []
    ];

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        $this->BlogDetails=Blog::where(['id'=>$this->lastSegment])->first();

        $this->blog_id=$this->BlogDetails->id;
        $this->title=$this->BlogDetails->blog_title;
        $this->description=$this->BlogDetails->blog_content;

        #dd($this->BlogDetails);
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


    public function EditBlog(){
        try{

                #banner file
                $thumbnail=$this->thumbnail_photo->store('/', 'blog_photo');
                $bannerUrl="https://myprojkonnect-s3bucket.s3.amazonaws.com/blog_photo/".$thumbnail;

                #insert into course table
                $blogUpdate=Blog::where(['id'=>$this->blog_id])->update([
                    'author_id'=>'1',
                    'author_name'=>'ogbonna michael',
                    'blog_photo'=>$bannerUrl,
                    'blog_title'=>$this->title,
                    'blog_content'=>$this->description,
                    'blog_tags'=>json_encode($this->parent),
                ]);
            
            if($blogUpdate){
                session()->flash('success','Post Updated Successfully');
                return redirect('admin-projkonnect/blogs');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured please try again');
            return redirect('admin-projkonnect/edit-blogs/'.base64_encode($this->blog_id));
            #dd($g->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.editblogs');
    }
}
