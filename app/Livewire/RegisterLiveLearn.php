<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use BoogieFromZk\AgoraToken\ChatTokenBuilder2;
use BoogieFromZk\AgoraToken\RtcTokenBuilder2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\LivesessionMeeting;
use App\Models\LivesessionAttendee;
use Illuminate\Support\Facades\URL;

class RegisterLiveLearn extends Component
{
    #public variable
    public $meeting,$segment2,$data;

    public function mount(){
        $url = URL::current(); 
      
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', $path);
        $this->segment2 = base64_decode($segments[2]);
        
        $this->meeting=LivesessionMeeting::with('proguide')->where('id',$this->segment2)->first();
        if(!isset($this->meeting)){
            return redirect('livelearn');
        }

        #dd($this->meeting);
        $meetingPrice=$this->meeting->meeting_price;

        $key=env('CURRENCY_API');

        $url="https://api.fastforex.io/convert?from=USD&to=NGN&amount=$meetingPrice&api_key=$key";
        $response = Http::withoutVerifying()->get($url);
        $this->data=$response->json();

        #dd($response->json());
       
    }


    public function MeetRegister(){
        try{

            $urlRedirect=env('URL_LINK');

            if($this->meeting->meeting_price>0){

                $attendee=LivesessionAttendee::create([
                    'meeting_id'=>$this->meeting->id,
                    'meeting_attendee'=>auth()->guard('web')->user()->id,
                    'meeting_status'=>'pending',
                    'pay_status'=>'pending',
                    'pay_ref'=>'',
                 ]);
                 if($attendee){
    
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
                    #Execute post and get payment json data
                    $result = curl_exec($ch);
                   
                    curl_close($ch);
                    $res = json_decode($result, true);

                    // Check the response
                    if (isset($res['data'])) {
                        
                          $updatePayRef=LivesessionAttendee::where(['meeting_id'=>$this->meeting->id,'meeting_attendee'=>auth()->guard('web')->user()->id])->update([
                              'pay_ref'=>$res['data']['reference']
                          ]);
    
                         $payURL=$res['data']['authorization_url'];
                         #dd($payURL);
                         return redirect($payURL);
                    }
                     else {
                        throw new \Exception('Paystack API response error: ' . ($res['message'] ?? 'Unknown error'));
                    }
                        
                }
    
                
            }
            else{
                 #purchase course without payment (Freecourse)
                 $attendeeFree=LivesessionAttendee::create([
                    'meeting_id'=>$this->meeting->id,
                    'meeting_attendee'=>auth()->guard('web')->user()->id,
                    'meeting_status'=>'pending',
                    'pay_status'=>'paid',
                    'pay_ref'=>'',
                 ]);
                 if($attendeeFree){
                      
                      session()->flash('success','Meeting Registration is successful');
                      return redirect('/livelearn');
                 }
            }
          
        }
        catch(\Throwable $g){
            session()->flash('success','Network Error occured');
            #dd($g->getMessage());
           
       }
         
    }


    public function render()
    {
        return view('livewire.register-live-learn');
    }
}
