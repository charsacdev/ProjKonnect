<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\PaymentsPlans;
use App\Models\UsersTables;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use  App\Mail\PlanSubscription;

class StudentPlans extends Component
{
    public $duration,$activePlan;

    public function mount(){
        $userId=auth()->guard('web')->user()->id;
        $currentPlan=PaymentsPlans::where(['user_id'=>$userId,'plan_status'=>'active'])->first();
        if($currentPlan){
            $this->activePlan=$currentPlan->plan_name;
        }
        
    }

    public function Subscriptions($amount,$plan){
        try{

            $plans = [
                'Free' => [
                    'price' => 0,
                ],
                'Premium' => [
                    'price' => 22,
                ],
                'Premium Plus' => [
                    'price' => 60,
                ],
            ];
            // Validate the incoming plan
            if (!array_key_exists($plan, $plans) || $plans[$plan]['price'] != $amount) {
                
                session()->flash('error','The plan you selected is invalid please refresh and try again.');
               
            }
           
            $userId=auth()->guard('web')->user()->id;
            $paymentAmount;
            $durationCheck;
    
            if($this->duration==TRUE){
               $paymentAmount=($plans[$plan]['price']*12);
               $durationCheck="365";
            }
            else{
                $paymentAmount=$plans[$plan]['price'];
                $durationCheck="30";
            }

           
           #==========HANLDE PAYMENT OF PLANS================#
            $Urlprice=$paymentAmount;
            $key=env('CURRENCY_API');
            $urlRedirect=env('URL_LINK');
    
            $url="https://api.fastforex.io/convert?from=USD&to=NGN&amount=$Urlprice&api_key=$key";
            $response = Http::withoutVerifying()->get($url);
            $this->data=$response->json();
    
            $CheckActivePlans=PaymentsPlans::where(['user_id'=>$userId])->first();
            if($CheckActivePlans){
                
                 #Update Plans
                 $updatePlans=PaymentsPlans::where(['user_id'=>$userId])->update([
                    "user_id"=>$userId,
                    "plan_name"=>$plan,
                    "plan_id"=>'0',
                    "plan_price"=>$plans[$plan]['price'],
                    "plan_status"=>'pending',
                    "plan_duration"=>$durationCheck
                ]);
    
                #Route Payment
                if($updatePlans and $paymentAmount>0){
    
                    $url = "https://api.paystack.co/transaction/initialize";
                            $fields = [
                               'email' => auth()->guard('web')->user()->email,
                               'amount' => (int) (($this->data['result']['NGN'])*100),
                               'callback_url' => $urlRedirect.'/paymentcheck',
                                #'metadata' => ["cancel_action" => env('CANCEL_URL')]
                          
                            ];
                          
                            $key=env('PAYSTACK_PAYMENT');
                            $fields_string = http_build_query($fields);
                            $ch = curl_init();
                            curl_setopt($ch,CURLOPT_URL, $url);
                            curl_setopt($ch,CURLOPT_POST, true);
                            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                              "Authorization: Bearer $key",
                              "Cache-Control: no-cache",
                             ));
                          
                            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
                            #turn off in production ssl verification
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                            
                            $result = curl_exec($ch);
                           
            
                            curl_close($ch);
                            $res = json_decode($result, true);
            
                            #Check the response
                            if (isset($res['data'])) {
                                
                                  $updatePayRef=PaymentsPlans::where('user_id',$userId)->update([
                                      'plan_id'=>$res['data']['reference']
                                  ]);
            
                                 $payURL=$res['data']['authorization_url'];
                                 return redirect($payURL);
                            }
                            else {
                            throw new \Exception('Paystack API response error: ' . ($res['message'] ?? 'Unknown error'));
                        }
                }
                else{
                    #Update Plans
                    $updatePlansFree=PaymentsPlans::where(['user_id'=>$userId])->update([
                        "plan_status"=>'active',
                    ]);
                    #send email here
                    $userInfo=UsersTables::where(['id'=>$userId])->first();
                    $paymentInfo=PaymentsPlans::where(['user_id'=>$userId])->first();
                 
                    $studentEmail=$userInfo->email;
                    $username=$userInfo->full_name;
                    $planprice=$paymentInfo->plan_price;
                    $plantype=$paymentInfo->plan_name;
                    $planduration=$paymentInfo->plan_duration;
                    Mail::to($studentEmail)->send(new PlanSubscription($username,$planprice,$plantype,$planduration));
               
                    session()->flash('success','Subscription for plan was successfull');
                    return redirect('/plans-and-pricing');
    
                }
                
            }
            else{
                #Create New Plan
                $newPlans=PaymentsPlans::create([
                    "user_id"=>$userId,
                    "plan_name"=>$plan,
                    "plan_id"=>'0',
                    "plan_price"=>$plans[$plan]['price'],
                    "plan_status"=>'pending',
                    "plan_duration"=>$durationCheck
                ]);
    
                 #Route Payment
                 if($newPlans and $paymentAmount>0){
    
                    $url = "https://api.paystack.co/transaction/initialize";
                            $fields = [
                               'email' => auth()->guard('web')->user()->email,
                               'amount' => (int) (($this->data['result']['NGN'])*100),
                               'callback_url' => $urlRedirect.'/paymentcheck',
                                #'metadata' => ["cancel_action" => env('CANCEL_URL')]
                          
                            ];
                          
                            $key=env('PAYSTACK_PAYMENT');
                            $fields_string = http_build_query($fields);
                            $ch = curl_init();
                            curl_setopt($ch,CURLOPT_URL, $url);
                            curl_setopt($ch,CURLOPT_POST, true);
                            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                              "Authorization: Bearer $key",
                              "Cache-Control: no-cache",
                             ));
                          
                            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
                            #turn off in production ssl verification
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                            
                            $result = curl_exec($ch);
                           
            
                            curl_close($ch);
                            $res = json_decode($result, true);
            
                            #Check the response
                            if (isset($res['data'])) {
                                
                                  $updatePayRef=PaymentsPlans::where('id',$newPlans->id)->update([
                                      'plan_id'=>$res['data']['reference']
                                  ]);
            
                                 $payURL=$res['data']['authorization_url'];
                                 return redirect($payURL);
                            }
                            else {
                            throw new \Exception('Paystack API response error: ' . ($res['message'] ?? 'Unknown error'));
                        }
                }
                else{

                    #dd($durationCheck);
                    #Update Plans
                    $updatePlansFree=PaymentsPlans::where(['user_id'=>$userId])->update([
                        "plan_status"=>'active',
                    ]);

                     #send email here
                     $userInfo=UsersTables::where(['id'=>$userId])->first();
                     $paymentInfo=PaymentsPlans::where(['user_id'=>$userId])->first();
                  
                     $studentEmail=$userInfo->email;
                     $username=$userInfo->full_name;
                     $planprice=$paymentInfo->plan_price;
                     $plantype=$paymentInfo->plan_name;
                     $planduration=$paymentInfo->plan_duration;
                     Mail::to($studentEmail)->send(new PlanSubscription($username,$planprice,$plantype,$planduration));

                    session()->flash('success','Subscription for plan was successfull');
                    return redirect('/plans-and-pricing');
    
                }
            }
             

        }
        catch(\Throwable $g){
            dd($g->getMessage());
       }
         
       
    }

    public function render()
    {
        return view('livewire.student-plans');
    }
}
