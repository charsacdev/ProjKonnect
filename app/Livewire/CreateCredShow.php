<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use App\Models\UsersTables;
use App\Models\studentCredShow;

class CreateCredShow extends Component
{
    public $lastUrl;

    public function mount(){
        $CredshowStep=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->first();
        if($CredshowStep){
                    
            $JsonData =  json_decode($CredshowStep,true);

            $this->lastUrl=$JsonData['credshow_lasturl'];

            return redirect($this->lastUrl);
        }
        
    }

    public function render()
    {
        return view('livewire.create-cred-show');
    }
}
