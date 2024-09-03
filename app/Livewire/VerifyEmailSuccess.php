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
use App\Mail\EmailVerificationSuccess;

class VerifyEmailSuccess extends Component
{
    public $lastSegment,$userInfo;

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        #get user info
        $userDetail=UsersTables::where('email',$this->lastSegment)->update([
            'email_verified_at'=>Carbon::now()
        ]);

        #send email
        $this->userInfo=UsersTables::where('email',$this->lastSegment)->first();
        $email=$this->userInfo->email;
        $name=$this->userInfo->full_name;
        Mail::to($email)->send(new EmailVerificationSuccess($name,$email));

    }

    public function render()
    {
        return view('livewire.verify-email-success');
    }
}
