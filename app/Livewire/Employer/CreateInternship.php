<?php

namespace App\Livewire\Employer;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\InternTable;
use App\Models\Intern_Application;
use App\Models\Intern_Contract;
use App\Models\Intern_task_result;
use App\Models\Intern_task;
use Livewire\WithFileUploads;

class CreateInternship extends Component
{
    #public variables 
    public $role,$description,$earning,$duration,$applicant,$parent=[
        'tags' => []
    ];

    protected $rules = [
        'role' => 'required',
        'description' =>'required',
        'earning' =>'required|numeric',
        'duration' =>'required|numeric',
        'applicant' =>'required|numeric',
    ];

    public function updated($propertyName){

        $this->validateOnly($propertyName);
      
    }

     #Method to add a tag
     public function addTag($tag)
     {
         $tag = trim($tag);
         if ($tag && !in_array($tag, $this->parent['tags'])) {
             $this->parent['tags'][] = $tag;
         }
     }
 
     #Method to remove a tag by its index
     public function removeTag($index)
     {
         if (isset($this->parent['tags'][$index])) {
             unset($this->parent['tags'][$index]);
             $this->parent['tags'] = array_values($this->parent['tags']);
         }
     }

    public function CreateInternShip(){
        
        $this->validate();
        
        try{
              #insert into intern table
              $internTable=InternTable::create([
                  'employer_id'=>auth()->guard('web')->user()->id,
                  'role' => $this->role,
                  'description' =>$this->description,
                  'payment' => $this->earning,
                  'duration' => $this->duration,
                  'number_applicant' => $this->applicant,
                  'skills'=>json_encode($this->parent),
              ]);
          
             if($internTable){
                session()->flash('success','A new Internship role added');
                return redirect('employer/internship-connect');
             }
        }
        catch(\Throwable $g){
            #session()->flash('error','An error occured please try again');
            dd($g->getMessage());
        }
      
    }


    public function render()
    {
        return view('livewire.employer.create-internship');
    }
}
