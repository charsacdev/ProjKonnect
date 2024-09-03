<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;
use Livewire\WithPagination;
use App\Models\Blog;


class BlogSinglePost extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $blogPost,$ArtileReaction;

    public $RelatedblogPost;

    public function mount(){

        $url = URL::current(); 
        $segments = explode("/",$url);
        
        #dd($segments);
        $this->lastSegment = base64_decode($segments[4]);

        $this->ArtileReaction="Was this article helpful?";
        
      
        #select blogpost
        $this->blogPost=Blog::where(['id'=>$this->lastSegment])->first();
        if(!$this->blogPost){
            
            session()->put('blogPost', $this->blogPost);
            return redirect('/blog');
        }

        if(!empty($_COOKIE['Projkonnect'])){

            #update page view cookie
            $UpdatePage=Blog::where(['id'=>$this->lastSegment])->first();
            $UpdatePage->blog_views++;
            $UpdatePage->save();
            
        }

        #Related Blog Search
        $search=json_decode($this->blogPost->blog_tags,true);
        $keywords=$search['tags'];

        $this->RelatedblogPost = Blog::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('blog_tags', 'like', "%{$keyword}%");
            }
        })->limit(3)->get();

        
    }

    #Function for Article Helpful
    public function Like($id){

        if(!empty($_COOKIE['Projkonnect'])){
            $blogUpdate=Blog::where(['id'=>$id])->first();
            $blogUpdate->positive++;
            $blogUpdate->save();
        }
         
        $this->ArtileReaction="Thanks for your response!";

    }

    #Function for Article Nothelpful
    public function Dislike($id){
       if(!empty($_COOKIE['Projkonnect'])){
            $blogUpdate=Blog::where(['id'=>$id])->first();
            $blogUpdate->negetive++;
            $blogUpdate->save();
       }
       $this->ArtileReaction="Thanks for your response!";

   }

    public function render()
    {
        return view('livewire.blog-single-post');
    }
}
