<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AdminWebTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\AdminForgotPassword;

class Forgetpassword extends Component
{
    #email variables
    public $email;

    public function ResetPassword(){
       try{
           $CheckUser=AdminWebTable::where('email',$this->email)->first();
         if($CheckUser){
             #email parameters
             $email=$CheckUser->email;
             $auth=$CheckUser->updated_at;
             $username=$CheckUser->first_name." ".$CheckUser->last_name;

             #update
             $CheckUser->updated_at=Carbon::now();
             $CheckUser->save();
        
             #send email
              Mail::to($email)->send(new AdminForgotPassword($email,$auth,$username));
             #send email
             session()->flash('success','An email have been sent to you with reset link');
         }
         else{
             #error message
             session()->flash('error','Ooops no such user exsits at all...');
         }
       }
       catch(\Throwable $g){
           #session()->flash('error','network error, try again'); 
           session()->flash('error',$g->getMessage());
       }
         
    }


    public function render()
    {
        return view('livewire.admin.forgetpassword');
    }
}
