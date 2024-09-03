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
use App\Models\WithdrawalWalletWeb;

class Register2 extends Component
{
    #public variables
    public $type,$password,$password_confirmation;

    #last URL 
    public $lastSegment,$userInfo;

    protected $rules = [
        'type' => 'required',
        'password' => 'required|min:8|confirmed',
    ];

    public function updated($propertyName){

        $this->validateOnly($propertyName);
      
    }

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        #get user info
        $this->userInfo=UsersTables::find($this->lastSegment);

    }
    


    #Registration Step2
    public function Register2(){
        #dd($this->type);
        $this->validate();

        try{
             

            #insert new user
            $newuser2=UsersTables::where(['id'=>$this->lastSegment])->update([
                'user_type' => $this->type,
                'password' => Hash::make($this->password) ?? null,
            ]);
            if($newuser2){

                #Update Wallet Details
                $WalletBalance=WithdrawalWalletWeb::create([
                     'proguide_id'=>$this->lastSegment,
                     'wallet_balance'=>'0',
                     'pending_balance'=>'0',
                     'status'=>'active'
                ]);

                #send mail here for new users
                $email=$this->userInfo->email;
                $name=$this->userInfo->full_name;

                Mail::to($email)->send(new NewRegistration($name,$email));

                return redirect('/verify-email'."/".base64_encode($this->userInfo->email));
            }

        }
        catch(\Throwable $g){

            session()->flash('error','An error occured please try again.');
            #dd($g->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.register2');
    }
}
