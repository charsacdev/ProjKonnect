<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact_Us;

class ContactUs extends Component
{
    protected $listeners = ['MessagePopUp'];

    #public variables
    public $allcontactMessage,$MessegeTitle;

    public function mount(){
        
          $this->allcontactMessage=Contact_Us::where(['status'=>'0'])->get();
    }


    public function MessagePopUp($value){
         
        $this->MessegeTitle=Contact_Us::where(['id'=>$value])->first();

    }

    public function render()
    {
        return view('livewire.admin.contact-us');
    }
}
