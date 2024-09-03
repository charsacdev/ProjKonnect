<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\AdminWebTable;

use Livewire\Component;

class Login extends Component
{
    #public variable
    public $email,$password;

     protected $rules=[
        'email'=>'required|email',
        'password'=>'required'
       ];

   #handling updated values
   public function updated($propertyName){
       $this->validateOnly($propertyName);
   }

   #login function
   public function login(){

       $this->validate();
       
        try{
             $user=AdminWebTable::where(['email'=>$this->email])->first();
      
           
            if($user and $user->status=='blocked'){

                session()->flash('error','Your account has been temporarily blocked by the admin. Contact support for help');
            }

            elseif($user and $user->status=='active' and  Hash::check($this->password, $user->password)){
               
                Auth::guard('admin')->loginUsingId($user->id);

                #checking auth user
                $auth_user=auth()->guard('admin')->user()->user_type;
                
                 return redirect('/admin-projkonnect/dashboard');
            }
    
            else{
                session()->flash('error','Invalid email or passsword');
            }
        }
        catch(\Throwable $g){
             session()->flash('error',$g->getMessage());
             #'A network error occured'
        }
           
   }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
