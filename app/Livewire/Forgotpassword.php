<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\ResetPassword;


class Forgotpassword extends Component
{
     #email variables
     public $UserEmail;

     public function ResetPassword(){
        try{
            $CheckUser=UsersTables::where('email',$this->UserEmail)->first();
          if($CheckUser){
              #email parameters
              $email=$CheckUser->email;
              $auth=$CheckUser->email_verified_at;
              $username=$CheckUser->first_name;
         
              #send email
               Mail::to($email)->send(new ResetPassword($email,$auth,$username));
              #send email
              session()->flash('success','An email have been sent to you with reset link');
          }
          else{
              #error message
              session()->flash('error','Ooops no such user exsits at all...');
          }
        }
        catch(\Throwable $g){
            session()->flash('error','network error, try again'); 
            #session()->flash('error',$g->getMessage());
        }
          
     }

    public function render()
    {
        return view('livewire.forgotpassword');
    }
}
