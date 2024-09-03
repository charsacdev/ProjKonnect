<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\AdminWebTable;

class Authors extends Component
{
    #mount function
    public $allAdmins;

    public function mount(){
        
       $this->allAdmins=AdminWebTable::with(['blogers'])->where(['role'=>'author'])->get();

       #dd($this->allAdmins);
    }

  
    public function render()
    {
        return view('livewire.admin.authors');
    }
}
