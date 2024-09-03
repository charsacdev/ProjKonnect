<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use Illuminate\Support\Facades\URL;
use Str;
use App\Mail\NewRegistration;

class Emailverification extends Component
{
    public $lastSegment;

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        #get user info
        $this->userInfo=UsersTables::find($this->lastSegment);

    }

    public function render()
    {
        return view('livewire.emailverification');
    }
}
