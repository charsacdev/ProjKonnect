<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\FaqContent;
use Illuminate\Support\Facades\URL;

class EditFaq extends Component
{
    #pubic variables
    public $lastSegment,$getFaqContent,$title,$content;

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        $getFaqContent=FaqContent::where(['id'=>$this->lastSegment])->first();

        $this->title=$getFaqContent->title;
        $this->content=$getFaqContent->content;
      

    }


    #update faq
    public function UpdateFaq(){
        try{
            $newFaq=FaqContent::where(['id'=>$this->lastSegment])->update([
                'title'=>$this->title,
                'content'=>$this->content,
               
           ]); 
           if($newFaq){
                session()->flash('success','Faq Updated successfully');
                return redirect('admin-projkonnect/content-management');
           }
        }
        catch(\Throwable $g){
            #session()->flash('error','An error occured please try again');
            #return redirect('admin-projkonnect/edit-faq/'.base64_encode($this->lastSegment));
            dd($g->getMessage());
        }
        
    }

    public function render()
    {
        return view('livewire.admin.edit-faq');
    }
}
