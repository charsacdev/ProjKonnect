<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\ReferalTable;
use Str;
use Illuminate\Support\Facades\URL;
use App\Mail\ReferalEmail;

class Register extends Component
{
    #public variables
    public $fullname,$email,$referals;

    protected $rules = [
        'fullname' => 'required',
        'email' => 'required|email|unique:users',
    ];


    public function mount(){
        $url = URL::current(); 
        $segments = explode("/",$url);

        if(isset($segments[5])){
            $refereeCode=UsersTables::where('referal_code',$segments[5])->first();
            if($refereeCode){
                $this->referals=$segments[5];
            }else{
                return redirect('/register');
            }
            
        }
        else{

            $this->referals="0";
        }
            
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);
      
    }

    #Register form
    public function Registerations(){
   
        $this->validate();

        try{
            #insert new user
            $newuser=UsersTables::create([
                'full_name' => $this->fullname,
                'email' => $this->email,
                'country_id' => '0',
                'email_verified_at'=>Carbon::now(),
                'user_type' => '',
                'password' => '',
                'phone_number'=>'',
                'profile_image' => '',
                'referal_code' => "PROJ" .  Str::upper(Str::random(6)),
                'referal_earnings'=>'0',
                'university' => '',
                'fcm_token'=>''
            ]);
            if($newuser){

                #referal
                $refereeDetails=UsersTables::where('referal_code',$this->referals)->first();
                if($refereeDetails){
                     
                    $referalcreate=ReferalTable::create([
                        'referal_id'=>$newuser->id,
                        'referee_id'=>$refereeDetails->id
                    ]);
                    
                    #send email
                    $email=$refereeDetails->email;
                    $name=$refereeDetails->full_name;
                    $refname=$newuser->full_name;
                    Mail::to($email)->send(new ReferalEmail($name,$email,$refname));
                }
                

                return redirect('/register/2/'.base64_encode($newuser->id));
            }
           
        }
        catch(\Throwable $g){

            session()->flash('error',$g->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.register');
    }
}
