<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\CourseUpload;
use App\Models\UsersTables;
use App\Models\ChatMessage;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use App\Models\LivesessionAttendee;
use App\Models\LivesessionMeeting;
use App\Models\PaymentsPlans;
use App\Mail\LivelearnsessionEmail;
use App\Mail\CoursePurchaseEmail;
use App\Mail\CoursePurchaseEmailProguide;
use  App\Mail\PlanSubscription;

class PaymentCheck extends Controller
{
    #payment check
    public function CheckPayment(Request $request){
        
        #dd("yes");
        try{ 

                #Extract query parameters
                $trxref = $request->query('trxref');
                $reference = $request->query('reference');
                $key=env('PAYSTACK_PAYMENT');
                $userId=auth()->guard('web')->user()->id;

                $checkCourseReference=StudentCourseAdding::where('payment_reference',$trxref)->first();
                
                #dd($checkCourseReference);
                
                #handle for course payment
                if($checkCourseReference==TRUE){

                    #dd($reference);
                    $curl = curl_init();
                    curl_setopt_array($curl, array(

                        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => false,
                        CURLOPT_HTTPHEADER => array(

                        "Authorization: Bearer $key",
                        "Cache-Control: no-cache",
                        ),

                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $res = json_decode($response, true);


                  if($res['data']['status'] == 'success') {
                     
                        $sumPaid=StudentCourseAdding::where('payment_reference',$trxref)->sum('payment_amount');
                        
                        #update student +1
                        #dd($checkCourseReference->course_id);
                        $updataStudent=CourseUpload::find($checkCourseReference->course_id)->first();
                        $updataStudent->course_students++;
                        $updataStudent->course_revenue+$sumPaid;
                        $updataStudent->save();
                        
                        
                        $AddingCourse=StudentCourseAdding::where('payment_reference',$trxref)->update([
                            'payment_status'=>'paid'
                        ]);
                        if($AddingCourse){

                            #proguide info
                            $proguideInfo=UsersTables::where(['id'=>$updataStudent->course_proguide_id])->first();


                            #send message
                            if (auth()->guard('web')->user()->id > $proguideInfo->id) {
                                $code = auth()->guard('web')->user()->id . "" . $proguideInfo->id;
                            } 
                            else {
                                $code = $proguideInfo->id . "" . auth()->guard('web')->user()->id;
            
                            }

                            ChatMessage::create([
                                'sender_id' => $proguideInfo->id,
                                'receiver_id' => auth()->guard('web')->user()->id,
                                'message' => "Hello thanks for making a purchase of my course,if you have any question please do reach out to me thanks.",
                                'files' =>  null,
                                'chat_code' => $code,
                                'file_type' => null,
                                'file_size'=> null,
                            ]);


                            #send email
                            $userInfo=UsersTables::where(['id'=>$userId])->first();

                            #student info
                            $studentEmail=$userInfo->email;
                            $username=$userInfo->full_name;
                            $title=$updataStudent->course_title;
                            $description=$updataStudent->course_description;
                            $date=Carbon::parse($updataStudent->created_at)->format('d F Y');;
                            $price=$updataStudent->course_price;
                            Mail::to($studentEmail)->send(new CoursePurchaseEmail($username,$title,$description,$date,$price));
                        
                            #proguide info
                            $proguideEmail=$proguideInfo->email;
                            $proguideUsername=$proguideInfo->full_name;
                            $studentName=$userInfo->full_name;
                        
                            Mail::to($proguideEmail)->send(new CoursePurchaseEmailProguide($proguideUsername,$title,$studentName,$date,$price));
                
                            return redirect('/student-courses');
                      }
                  }
                }


                #=========================Check Live session Payment Reference=======================#

                $liveSessionReference=LivesessionAttendee::where(['meeting_attendee'=>$userId,'pay_ref'=>$trxref])->first();
                if($liveSessionReference==TRUE){

                    #dd($reference);
                    $curl = curl_init();
                    curl_setopt_array($curl, array(

                        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => false,
                        CURLOPT_HTTPHEADER => array(

                        "Authorization: Bearer $key",
                        "Cache-Control: no-cache",
                        ),

                    ));

                    $response = curl_exec($curl);
                    curl_close($curl);
                    $res = json_decode($response, true);


                    #dd($res['data']['status']);

                    if ($res['data']['status'] == 'success') {
                        
                        #handle for live session payment
                        $attendee=LivesessionAttendee::where(['meeting_attendee'=>$userId,'pay_ref'=>$trxref])->first();
                        if($attendee==TRUE){
                                $attendeePaid=LivesessionAttendee::where(['meeting_attendee'=>$userId,'pay_ref'=>$trxref])->update([
                                    'pay_status'=>'paid',
                                ]);
                                if($attendeePaid){
                                    #send email here
                                    $userInfo=UsersTables::where(['id'=>$userId])->first();
                                    $meetingAttendInfo=LivesessionAttendee::where(['meeting_attendee'=>$userId,'pay_ref'=>$trxref])->first();
                                    
                                    $meetingInfo=LivesessionMeeting::where('id',$meetingAttendInfo->meeting_id)->first();

                                    $studentEmail=$userInfo->email;
                                    $username=$userInfo->full_name;
                                    $title=$meetingInfo->meeting_title;
                                    $description=$meetingInfo->meeting_description;
                                    $date=$meetingInfo->meeting_date;
                                    $price=$meetingInfo->meeting_price;
                                    Mail::to($studentEmail)->send(new LivelearnsessionEmail($username,$title,$description,$date,$price));
                
                                    return redirect('/livelearn');
                                }
                            }
                    
                    }
                    
               }


               #================CHECK PLANS PAYMENT REFERENCE================#
               $checkPlansPayment=PaymentsPlans::where(['user_id'=>$userId,'plan_id'=>$trxref])->first();
               if($checkPlansPayment){
                   
                   #dd($reference);
                   $curl = curl_init();
                   curl_setopt_array($curl, array(

                       CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "GET",
                       CURLOPT_SSL_VERIFYPEER => false,
                       CURLOPT_SSL_VERIFYHOST => false,
                       CURLOPT_HTTPHEADER => array(

                       "Authorization: Bearer $key",
                       "Cache-Control: no-cache",
                       ),

                   ));

                   $response = curl_exec($curl);
                   curl_close($curl);
                   $res = json_decode($response, true);


                   #dd($res['data']['status']);

                   if ($res['data']['status'] == 'success') {
                       
                       #handle for plans subscriptions
                       $subscribedPlan=PaymentsPlans::where(['user_id'=>$userId,'plan_id'=>$trxref]);
                       if($subscribedPlan==TRUE){
                               $planPaid=PaymentsPlans::where(['user_id'=>$userId,'plan_id'=>$trxref])->update([
                                   'plan_status'=>'active',
                               ]);
                               if($planPaid){
                                   #send email here
                                   $userInfo=UsersTables::where(['id'=>$userId])->first();
                                   $paymentInfo=PaymentsPlans::where(['user_id'=>$userId,'plan_id'=>$trxref])->first();
                                
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
                   
               }

            }
            catch(\Throwable $g){
                dd($g->getMessage());
            }

        

        #dd($checkReference);
         
    }
}
