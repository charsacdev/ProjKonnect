<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
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

class StudentCourses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    #course selecting
    public $Allcourse,$paginate;

    public function mount(){

           $this->paginate=12;

           #Fetch user's interests
            $userId=auth()->guard('web')->user()->id;
            $userInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();
            
        #Fetch all courses
        $allCourses = CourseUpload::with(['chapters', 'proguide', 'purchasedCourses' => function ($query) use ($userId) {
            $query->where(['student_id'=>$userId,'payment_status'=>'paid']);
        }])->where('course_status','approved')->withCount('chapters')->paginate($this->paginate);

        #Filter courses based on user's interests
        $this->Allcourse = $allCourses->filter(function ($course) use ($userInterests) {
            $courseInterests = json_decode($course->course_interest, true);
            return !empty(array_intersect($courseInterests, $userInterests));
        });

        #dd($this->Allcourse);
   
    }
  


    #Student Course Payment
    public function EnrollCourse($courseDetails){
        #dd($courseDetails['id']);
          try{ 
                 $Urlprice=$courseDetails['course_price'];
                 
                 #for free course
                 if($Urlprice==="0"){
                        $purchaseCourse = StudentCourseAdding::create([
                            'student_id'=>auth()->guard('web')->user()->id,
                            'proguide_id'=>$courseDetails['course_proguide_id'],
                            'course_id'=>$courseDetails['id'],
                            'payment_reference'=>'',
                            'payment_status'=>'paid',
                            'payment_amount'=>$courseDetails['course_price'],
                            'course_chapters'=>$courseDetails['chapters_count'],
                            'current_chapters'=>'0',
                            'points_earned'=>'0',
                            'badged_earned'=>'',
                
                        ]);  
                        if($purchaseCourse){

                            return redirect('/student-courses');
                        } 
                 }

             else{
                    $key=env('CURRENCY_API');
                    $urlRedirect=env('URL_LINK');

                    $url="https://api.fastforex.io/convert?from=USD&to=NGN&amount=$Urlprice&api_key=$key";
                    $response = Http::withoutVerifying()->get($url);
                    $this->data=$response->json();
    
                    $purchaseCourse = StudentCourseAdding::create([
                        'student_id'=>auth()->guard('web')->user()->id,
                        'proguide_id'=>$courseDetails['course_proguide_id'],
                        'course_id'=>$courseDetails['id'],
                        'payment_reference'=>'',
                        'payment_status'=>'pending',
                        'payment_amount'=>$courseDetails['course_price'],
                        'course_chapters'=>$courseDetails['chapters_count'],
                        'current_chapters'=>'0',
                        'points_earned'=>'0',
                        'badged_earned'=>'',
            
                    ]);   
    
                  if($purchaseCourse){
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
                            
                              $updatePayRef=StudentCourseAdding::where('id',$purchaseCourse->id)->update([
                                  'payment_reference'=>$res['data']['reference']
                              ]);
        
                             $payURL=$res['data']['authorization_url'];
                             return redirect($payURL);
                        }
                         else {
                            throw new \Exception('Paystack API response error: ' . ($res['message'] ?? 'Unknown error'));
                        }
                  }
                
                }
              
               
          }
          catch(\Throwable $g){
               #dd($g->getMessage());
          }
    }

    public function render()
    {
        $userId=auth()->guard('web')->user()->id;

        #Fetch user's interests
        $userInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();

        $allCourses = CourseUpload::where(['course_status'=>'approved'])->with(['chapters', 'proguide', 'purchasedCourses' => function ($query) use ($userId) {
            $query->where('student_id', $userId);
        }])->withCount('chapters')->paginate($this->paginate);

        return view('livewire.student-courses',['allCourses'=>$allCourses]);
    }

    
}
