<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\StudentCourseAdding;
use App\Models\BankDetailsWeb;
use App\Models\UsersTables;
use App\Models\WithdrawalWalletWeb;
use App\Models\WithdrawalWeb;
use App\Mail\WithdrawalEmail;


class PaymentSchedule extends Component
{
    #Card Details
    public $totalEarnings,$walletBalance,$totalWithdrawal,$totalPurchase;

    #Select Bank Details
    public $bankDetails,$paymentHistory;

    #Withdrawal Details
    public $bankinfo,$amount;

    public function mount(){

        $userId=auth()->guard('web')->user()->id;

        #Card Select details
        $this->totalEarnings = StudentCourseAdding::where(['proguide_id'=>$userId,'payment_status'=>'paid'])->sum('payment_amount');
        $this->walletBalance = WithdrawalWalletWeb::where(['proguide_id'=>$userId])->first();
        $this->totalWithdrawal = WithdrawalWeb::where(['proguide_id'=>$userId,'status'=>'completed'])->sum('amount');
        $this->totalPurchase = StudentCourseAdding::with(['student','course'])->where(['proguide_id'=>$userId,'payment_status'=>'paid'])->count();
        
        #payment modal and table data
        $this->bankDetails=BankDetailsWeb::where(['proguide_id'=>$userId])->first();
        $this->paymentHistory=WithdrawalWeb::with(['bankdetails'])->where(['proguide_id'=>$userId])->get();

        #dd($this->paymentHistory);
    }


    #Make New Withdrawals
    public function Withdrawal(){
        try{
             
             #Proguide Wallet Details
             $userId=auth()->guard('web')->user()->id;
             $BalanceCheck=WithdrawalWalletWeb::where(['proguide_id'=>$userId])->first();
           
             if(empty($this->bankinfo)){
                session()->flash('error-details','Please select your bank details');
             }
             elseif($this->amount > $BalanceCheck->wallet_balance){
                session()->flash('error-details','You requested withdrawal amount is higher than your wallet balance');
             }
             else{
                 $withdrawalRequest=WithdrawalWeb::create([
                    'proguide_id'=>$userId,
                    'amount'=>$this->amount,
                    'bank_id'=>$this->bankinfo,
                    'status'=>'pending',
                 ]);
                 if($withdrawalRequest){

                        #deduct balance
                        $deductBalance=WithdrawalWalletWeb::where(['proguide_id'=>$userId])->update([
                            'wallet_balance'=>($BalanceCheck->wallet_balance-$this->amount)
                        ]);
                        
                        #send email
                        $name=auth()->guard('web')->user()->full_name;
                        $email=auth()->guard('web')->user()->email;
                        $amount=$this->amount;
                        $balance=($BalanceCheck->wallet_balance-$this->amount);

                        #Bank Details
                        $bank=BankDetailsWeb::where('id',$this->bankinfo)->first();
                        $bankdetails=$bank->account_name." ".$bank->account_number." ".$bank->bank_name;
                        
                        #sending emails
                        Mail::to($email)->send(new WithdrawalEmail($name,$email,$amount,$balance,$bankdetails));
                        
                        
                        #successfully added 
                        session()->flash('success','Withdrawal Request Submited Successfully');
                        return redirect('/proguide/payments');
                    
                 }
                  
             }
             
        }catch(\Throwable $g){
             dd($g->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.proguides.payment-schedule');
    }
}
