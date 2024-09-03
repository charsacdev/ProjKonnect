<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\WithdrawalWalletWeb;
use App\Models\StudentPointsEarnings;
use App\Models\PaymentsPlans;

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
             $user=UsersTables::where(['email'=>$this->email])->first();
      
            if($user and $user->status=='active' and  Hash::check($this->password, $user->password)){
               
                   Auth::guard('web')->loginUsingId($user->id);

                   #checking auth user
                   $auth_user=auth()->guard('web')->user()->user_type;
                   if($auth_user==='student'){
                       
                      #creating Points Earnings
                      $pointsTable=StudentPointsEarnings::where('user_id',auth()->guard('web')->user()->id)->first();
                        if(!$pointsTable){
                                $pointEarnings=StudentPointsEarnings::create([
                                    'user_id'=>auth()->guard('web')->user()->id,
                                    'points'=>'0',
                                    'points_used'=>'0',
                                ]);
                        }

                        #Plans and Subscriptions for new users
                        $userId=auth()->guard('web')->user()->id;
                        $CheckActivePlans=PaymentsPlans::where(['user_id'=>$userId])->first();
                        if(!$CheckActivePlans){
                                #Create New Plan
                                $newPlans=PaymentsPlans::create([
                                    "user_id"=>$userId,
                                    "plan_name"=>"Free",
                                    "plan_id"=>'0',
                                    "plan_price"=>'0',
                                    "plan_status"=>'active',
                                    "plan_duration"=>'0'
                               ]);
                        }

                        return redirect('/dashboard');
                   }
                   elseif($auth_user==='proguide'){
                        
                       #Check if wallet exists
                       $checkWallet=WithdrawalWalletWeb::where(['proguide_id'=>auth()->guard('web')->user()->id])->first();
                       if(!$checkWallet){
                            #Update Wallet Details
                            $WalletBalance=WithdrawalWalletWeb::create([
                                    'proguide_id'=>$this->lastSegment,
                                    'wallet_balance'=>'0',
                                    'pending_balance'=>'0',
                                    'status'=>'active'
                            ]);
                       }
                       return redirect('/proguide/dashboard');
                   }
                  
                   else{
                         
                        #Check if user is an employer
                        return redirect('/employer/dashboard');
                   }
                   
              
            }
            elseif($user and $user->status=='blocked'){
                session()->flash('error','Your account has been temporarily blocked by the admin. Contact support for help');
            }
    
            else{
                session()->flash('error','Invalid email or passsword');
            }
        }
        catch(\Throwable $g){
             session()->flash('error','A network error occured');
        }
           
   }

    public function render()
    {
        return view('livewire.login');
    }
}
