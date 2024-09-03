<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\FaqContent;
use Illuminate\Support\Facades\URL;

class CreateFaq extends Component
{
    #public variables
    public $question,$answer;

    #create new faq
    public function createFaq(){
        try{
            $newFaq=FaqContent::create([
                'title'=>$this->question,
                'content'=>$this->answer,
                'status'=>'active'
           ]); 
           if($newFaq){
                session()->flash('success','Faq added successfully');
                return redirect('admin-projkonnect/content-management');
           }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured please try again');
            return redirect('admin-projkonnect/create-faq');
            #dd($g->getMessage());
        }
        
    }

    public function render()
    {
        return view('livewire.admin.create-faq');
    }
}
