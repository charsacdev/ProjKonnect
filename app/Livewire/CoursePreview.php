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
use App\Models\CourseReviews;
use App\Models\StudentPointsEarnings;
use App\Models\UserInterest;
use App\Models\AdminRevenueSettings;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class CoursePreview extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    #course selecting
    public $paginate,$paginateReviews;

    #public variables
    public $Allcourse,$lastSegment,$currentChapter,$CourseInfo,$CourseChapters,$chaptersInfo,$courseReviews;

    #Points Earnings
    public $points,$dollar;
    

    public function mount(){

        $this->paginate="4";
        $this->paginateReviews="10";

        $url = URL::current(); 
        $segments = explode("/",$url);


        #Points Earning on Viewing Course
        $settingDetails=AdminRevenueSettings::where('id',1)->first();
        $this->points=$settingDetails->point_setting['points'];


        #URL for playing video
        if(isset($segments[5])){

            $this->lastSegment = base64_decode($segments[4]);
            
            $this->currentChapter = base64_decode($segments[5]);
           
            $userId=auth()->guard('web')->user()->id;

            #Getting Information of Chapters Per Course
             $this->chaptersInfo=CourseChaptersUpload::where(['course_Id'=>$this->lastSegment,'id'=>$this->currentChapter])->get();
             $this->CourseInfo=CourseChaptersUpload::with(['course','purchasedCourses' => function ($query) use ($userId) {
                $query->where(['student_id'=>$userId,'course_id'=>$this->lastSegment,'payment_status'=>
                'paid']);
            }])->where(['course_Id'=>$this->lastSegment,'id'=>$this->currentChapter])->get();

            
             #getting course chapters
             $this->CourseChapters=CourseChaptersUpload::with(['purchasedCourses' => function ($query) use ($userId) {
                $query->where(['student_id'=>$userId,'course_id'=>$this->lastSegment,'payment_status'=>
                'paid']);
            }])->where(['course_Id'=>$this->lastSegment])->get();

          
            $userInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();
            
            #Fetch all courses
            $allCourses = CourseUpload::where(['course_status'=>'approved'])->with(['chapters', 'proguide', 'purchasedCourses' => function ($query) use ($userId) {
                $query->where(['student_id'=>$userId,'payment_status'=>'paid']);
            }])->withCount('chapters')->latest()->limit(2)->get();

            #Filter courses based on user's interests
            $this->Allcourse = $allCourses->filter(function ($course) use ($userInterests) {
                $courseInterests = json_decode($course->course_interest, true);
                return !empty(array_intersect($courseInterests, $userInterests));
            });
    

        }

        #==========WHEN COURSE IS NOT PURCHASED========#
        else{

        
            $this->lastSegment = base64_decode(basename($url));
            $userId=auth()->guard('web')->user()->id;

             #selecting all course
             $this->CourseInfo=CourseUpload::with(['chapters','purchasedCourses' => function ($query) use ($userId) {
                    $query->where(['student_id'=>$userId,'course_id'=>$this->lastSegment,'payment_status'=>
                    'paid']);
              }])->where(['id'=>$this->lastSegment,'course_status'=>'approved'])->withCount('chapters')->get();
            
             #Course Chapters 
             $this->CourseChapters=CourseChaptersUpload::with(['purchasedCourses' => function ($query) use ($userId) {
                $query->where(['student_id'=>$userId,'course_id'=>$this->lastSegment,'payment_status'=>
                'paid']);
            }])->where(['course_Id'=>$this->lastSegment])->get();
    
            #course basic informations
            $this->chaptersInfo=CourseChaptersUpload::where(['course_Id'=>$this->lastSegment])->get();
    
            #selecting all course
            $this->Allcourse=CourseUpload::where(['course_status'=>'approved'])->with(['chapters','proguide','purchasedCourses' => function ($query) use ($userId) {
                $query->where(['student_id'=>$userId,'payment_status'=>
                'paid']);
            }])->withCount('chapters')->latest()->limit(2)->get();
    
        }
        
        
    }



    #Add Points on Next
    public function NextCourse($courseId,$next){

        $userId=auth()->guard('web')->user()->id;
       
         #update Course Progress
         $coursePurchaseChapter=StudentCourseAdding::where(['course_id'=>$this->lastSegment,'student_id'=>$userId,'payment_status'=>'paid'])->first();
            
         if($coursePurchaseChapter->current_chapters < $coursePurchaseChapter->course_chapters){
             $UpdateProgress=StudentCourseAdding::where(['course_id'=>$this->lastSegment,'student_id'=>$userId,'payment_status'=>'paid'])
             ->update([
                 'current_chapters'=>$this->currentChapter,
                 'points_earned'=>($coursePurchaseChapter->points_earned+$this->points)
             ]);

             
             #Update Points Table
             $pointsTable=StudentPointsEarnings::where('user_id',$userId)->first();
             $pointsTable->points+=$this->points;
             $pointsTable->save();

             
         }

         return redirect()->to("/course-learn/" . base64_encode($courseId) . "/" . base64_encode($next + 1));


       
    }



    #Student Course Payment
    public function EnrollCourse($courseDetails){
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
               dd($g->getMessage());
          }
    }


    #Add to cart
    public function AddtoCart($courseDetails){
        #dd($courseDetails);
          try{ 
               
               $checkCourseAdding=StudentCourseAdding::where(['student_id'=>auth()->guard('web')->user()->id,'course_id'=>$courseDetails['id']])->count();
            
               if($checkCourseAdding===0){
                    $purchaseCourse = StudentCourseAdding::create([
                        'student_id'=>auth()->guard('web')->user()->id,
                        'proguide_id'=>$courseDetails['course_proguide_id'],
                        'course_id'=>$courseDetails['id'],
                        'payment_reference'=>'',
                        'payment_status'=>'pending',
                        'payment_amount'=>$courseDetails['course_price'],
                        'course_chapters'=>$courseDetails['chapters_count'],
                        'current_chapters'=>'0',
                        'points_earned'=>'',
                        'badged_earned'=>'',
            
                    ]);   
               }
           
          }
          catch(\Throwable $g){
               #dd($g->getMessage());
          }
    }



public function render(){
        $userId=auth()->guard('web')->user()->id;

        #Fetch user's interests
        $userInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();

        $allCourses = CourseUpload::with(['chapters', 'proguide', 'purchasedCourses' => function ($query) use ($userId) {
            $query->where('student_id', $userId);
        }])->withCount('chapters')->paginate($this->paginate);



        #fetch reviews
        $reviews=CourseReviews::with('students')->where(['course_id'=>$this->lastSegment])->latest()->paginate($this->paginateReviews);

        return view('livewire.course-preview',['allCourses'=>$allCourses,'reviews'=>$reviews]);
    }
}
