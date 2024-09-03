<?php

namespace App\Livewire\Proguides;

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
use App\Models\Interest;
use App\Models\UserInterest;
use App\Models\StudentCourseAdding;
use App\Models\UsersTables;
use Livewire\WithFileUploads;
use App\Mail\Livelearnsameintereststudents;
use App\Mail\LivelearnSubscribedStudents;
use App\Mail\OneononeLivesession;

class Newlivelearn extends Component
{
    use  WithFileUploads;

    #public variables
    public $banner,$title,$description,$date,$time,$duration,$userInterest,$price,$course_mode,$participant,$studentemail,$learn_interest=[];

    #public variables for mounts
    public $interest,$projectName,$channel;

    public $interest_all;

    #mount function
    public function mount(){

        $this->interest=Interest::all();

        #random String
        $this->projectName='ProjKonnect'.Str::random(10);
        $this->channel='Prj'.Str::random(7);

        $this->interest_all=Interest::all();


    }

    #CreateMeeting
    public function NewMeeting(){


        #validation
        $this->validate([
            'banner'=>'required|mimes:jpg,bmp,png,jpeg',
            'title'=>'required',
            'description'=>'required',
            'date' => 'required',
            'time' => 'required',
            'duration' => 'required',
        ]);

        try{

               if($this->course_mode===null){
                   session()->flash('course_mode','Please specify if this course will be free or paid');
                }
               
                elseif($this->course_mode==="paid" && empty($this->price)){
                    session()->flash('interest','Please Enter a price for livelearn session');
                 }
                elseif($this->participant==null || $this->participant=="Select Participants"){
                    session()->flash('interest','Please select the participants for this livelearn session');
                }
                elseif($this->participant==3 && count($this->learn_interest)===0){
                    session()->flash('interest','Please select at least 1 interest of choice');
                }
                
                elseif($this->participant==1 && empty($this->studentemail)){
                    session()->flash('interest','Please enter the students email for one-to-one session');
                }
                else{

                      #change user interest
                      if($this->participant===1 || $this->participant===2){
                          $this->learn_interest=[];
                      }
                      else{
                        #do nothing
                      }

                    #Check Free Course and set price
                    if($this->course_mode==="free"){
                        $this->price=0;
                    }

                        $apiKey = env('AGORA_KEY');
                        $apiSecret = env('AGORA_SECRET');
                
                        #URL for creating a new project
                        $url = 'https://api.agora.io/dev/v1/project';
                
                        #Data for the new project
                        $data = [
                            'name' => $this->projectName,
                            'enable_sign_key' => true
                        ];

                
                        $response = Http::withBasicAuth($apiKey, $apiSecret)
                                ->withOptions([
                                    'verify' => false,
                                ])->post($url, $data);

                        #Check the response status and handle accordingly
                        if ($response->successful()===true) {
                        
                            $responseData = $response->json();
                            #token builder
                            $appID = $responseData['project']['vendor_key'];
                            $appCertificate = $responseData['project']['sign_key'];
                            #$expiresInSeconds = ($this->duration * 60 * 60);
                            $channelName = $this->channel;
                            $uid = 0;
                            $role = RtcTokenBuilder2::ROLE_PUBLISHER;

                            #Date Handling
                             #Convert the target date string to a Carbon instance
                             $targetDate = Carbon::createFromFormat('Y-m-d H:i',$this->date." ".$this->time, 'UTC');
                             $expiresInSeconds = $targetDate->timestamp;
                            
                            $token = RtcTokenBuilder2::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $expiresInSeconds);
                            
                            
                            #Banner File  
                            $bannerfile=$this->banner->store('/', 'course_video');
                            $bannerUrl="https://myprojkonnect-s3bucket.s3.amazonaws.com/course_video/".$bannerfile;
                            
                             #student and proguide details
                             $userInfo=UsersTables::where('email',$this->studentemail)->first();
                             $proguideId=auth()->guard('web')->user()->id;


                            #Participant Logic
                            switch ($this->participant) {
                                case 1:
                                    $participant_meeting = json_encode([$userInfo->id]);
                                    break;
                                case 2:
                                    $participant_meeting = json_encode([$proguideId]);
                                    break;
                                case 3:
                                    $participant_meeting = json_encode($this->learn_interest);
                                    break;
                                default:
                                    $participant_meeting = 'unknown';
                                    break;
                            }

                           #Insert Meeting
                            $createMeeting=LivesessionMeeting::create([
                            'meeting_banner'=>$bannerUrl,
                            'proguide_id'=>auth()->guard('web')->user()->id,
                            'meeting_title'=>$this->title,
                            'meeting_description'=>$this->description,
                            'meeting_price'=>$this->price,
                            'meeting_name'=>$channelName,
                            'meeting_id'=>$responseData['project']['id'],
                            'app_id'=>$appID,
                            'app_certificate'=>$appCertificate,
                            'token'=>$token,
                            'meeting_participant'=>$this->participant,
                            'meeting_interest'=>$participant_meeting,
                            'meeting_status'=>'pending',
                            'meeting_duration'=>$this->duration,
                            'meeting_date'=>$this->date." ".$this->time,
                        
                    ]);
    
                    if($createMeeting){
                        #register the proguide for the meeting
                        $proguideRegister=LivesessionAttendee::create([
                            'meeting_id'=>$createMeeting->id,
                            'meeting_attendee'=>auth()->guard('web')->user()->id,
                            'meeting_status'=>'pending',
                            'pay_status'=>'paid',
                            'pay_ref'=>'',
                        ]);
                        
                        #Send Emails to Users
                        if($proguideRegister and $this->participant==1){

                                #Send Email to single Participant
                                $userInfo=UsersTables::where('email',$this->studentemail)->first();

                                $studentEmail=$userInfo->email;
                                $username=$userInfo->full_name;
                                $title=$this->title;
                                $description=$this->description;
                                $date=$this->date." ".$this->time;
                                $price=$this->price;
                                Mail::to($studentEmail)->send(new OneononeLivesession($username,$title,$description,$date,$price));
            

                             #successfully updated 
                             session()->flash('success','Meeting created successfully');
                             return redirect('/proguide/livelearn');
                        }

                        elseif($proguideRegister and $this->participant==2){

                               #Send Email to User who have purchased a course
                               #subscribed Students
                                $enrollment=StudentCourseAdding::with(['student_single'])
                                ->where(['payment_status'=>'paid','proguide_id'=>auth()->guard('web')->user()->id])
                                ->get()
                                ->unique('student_id');

                                #$emailsEnroll = $enrollment->pluck('student_single.email')->unique();

                                #send email
                                foreach ($enrollment as $users) {
                                    
                                    $studentEmail=$users->student_single->email;
                                    $username=$users->student_single->full_name;
                                    $title=$this->title;
                                    $description=$this->description;
                                    $date=$this->date." ".$this->time;
                                    $price=$this->price;
                                    Mail::to($studentEmail)->send(new LivelearnSubscribedStudents($username,$title,$description,$date,$price));
                
                                }
                            

                             #successfully updated 
                            session()->flash('success','Meeting created successfully');
                            return redirect('/proguide/livelearn');

                        }

                        elseif($proguideRegister and $this->participant==3){

                            #Send Email to users with similar interest
                            #user interest
                            $interestIds = $this->learn_interest;
                            $usersInterest=UsersTables::whereHas('interests', function ($query) use ($interestIds) {
                                $query->whereIn('interest_id', $interestIds);
                            })->get();

                            #$emails = $users->pluck('email');
                            #dd(json_encode($this->learn_interest));

                            #send email
                            foreach ($usersInterest as $users) {
                                    
                                $studentEmail=$users->email;
                                $username=$users->full_name;
                                $title=$this->title;
                                $description=$this->description;
                                $date=$this->date." ".$this->time;
                                $price=$this->price;
                                Mail::to($studentEmail)->send(new Livelearnsameintereststudents($username,$title,$description,$date,$price));
            
                            }

                             #successfully updated 
                            session()->flash('success','Meeting created successfully');
                            return redirect('/proguide/livelearn');

                        }
        
                    }
                 }

                else {
                    #successfully updated 
                    session()->flash('error','Meeting could not be created');
                    return redirect('/proguide/livelearn');
                }
               
            }
           
    

        }
        catch(\Throwable $g){

            session()->flash('error','An error occured please try again.');
           # dd($g->getMessage());
        }

        
    }


    public function render()
    {
        return view('livewire.proguides.newlivelearn');
    }
}
