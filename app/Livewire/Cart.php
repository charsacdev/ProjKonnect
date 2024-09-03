<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use App\Models\Interest;
use App\Models\UserInterest;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class Cart extends Component
{
    public $carted,$sumCart;

    public function mount(){

        $userId=auth()->guard('web')->user()->id;
        $course_id=StudentCourseAdding::where(['student_id'=>$userId,'payment_status'=>'pending'])->get();
        if($course_id){
            foreach($course_id as $courseId){
                #dd($courseId->course_id);
                $proguide_id=CourseUpload::where(['id'=>$courseId->course_id])->first();
                $id=$proguide_id->course_proguide_id;
    
                #carted course
                $this->carted = StudentCourseAdding::with(['chapters','course_cart' => function ($query) use ($id) {
                    $query->whereHas('proguide', function ($subQuery) use ($id) {
                        $subQuery->where('id', $id);
                    });
                }, 'course_cart.chapters', 'course_cart.proguide'])
                ->where(['student_id' => $userId, 'payment_status' => 'pending'])
                ->get();
        
                
            }
        }
        #cart price and sum
        $this->sumCart=StudentCourseAdding::where(['student_id'=>$userId,'payment_status'=>'pending'])->sum('payment_amount');
    }

    #delete Cart
    public function DeleteCart($id){
         $deletCart=StudentCourseAdding::where('id',$id)->delete();
         $this->dispatch('$refresh');
     }


      #Student Course Payment
      public function EnrollCourse($id){
          #dd($id);
          try{ 

                $UserDetails=StudentCourseAdding::where(['student_id'=>auth()->guard('web')->user()->id,'payment_status'=>'pending'])->first();
                $sumTotal=StudentCourseAdding::where(['student_id'=>auth()->guard('web')->user()->id,'payment_status'=>'pending'])->sum('payment_amount');
           
                if($sumTotal>0){
                    $Urlprice=$sumTotal;
                    $key=env('CURRENCY_API');
                    $urlRedirect=env('URL_LINK');
                 
                   $url="https://api.fastforex.io/convert?from=USD&to=NGN&amount=$Urlprice&api_key=$key";
                   $response = Http::withoutVerifying()->get($url);
                   $this->data=$response->json();
                   #==PAYSTACK PAYMENT===#
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
                           
                             $updatePayRef=StudentCourseAdding::where(['student_id'=>auth()->guard('web')->user()->id,'payment_status'=>'pending'])->update([
                                 'payment_reference'=>$res['data']['reference']
                             ]);
       
                            $payURL=$res['data']['authorization_url'];
                            return redirect($payURL);
                       }
                        else {
                           throw new \Exception('Paystack API response error: ' . ($res['message'] ?? 'Unknown error'));
                       }

                }
                else{
                    session()->flash('error','Please add item to cart');
                }
                 
              }
          catch(\Throwable $g){
               #dd($g->getMessage());
               session()->flash('error','A network error occured');
          }
    }


    public function render()
    {
        return view('livewire.cart');
    }
}
