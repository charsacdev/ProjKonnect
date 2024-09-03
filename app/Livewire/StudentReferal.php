<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\ReferalTable;

class StudentReferal extends Component
{
    public $referals;

    public function mount(){

        #get referals
        $this->referals=ReferalTable::with('referee')->where('referee_id',auth()->guard('web')->user()->id)->get();
        #dd($this->referals);
    }

    public function render()
    {
        return view('livewire.student-referal');
    }
}
