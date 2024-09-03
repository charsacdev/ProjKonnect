<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\UsersTables;
use App\Models\CourseUpload;
use App\Models\Interest;
use App\Models\UserInterest;
use App\Models\Allnotification;
use App\Models\AdminWebTable;
use App\Models\CourseChaptersUpload;
use Livewire\WithFileUploads;
use App\Mail\AdminCourseEmailNotify;
use App\Mail\ProguideCourseEmail;
use App\Mail\NewcourseNotificationStudent;

class Createcourse extends Component
{
    use  WithFileUploads;

    #course uploads details
    public $banner,$title,$description,$price,$course_mode,$interest=[];

    public $chapters = [],$interest_all;

    #aws file upload
    public $videos,$assignment;

    #course recently uploaded
    public $recentlyUploaded;

    public function mount(){
         
        $userId=auth()->guard('web')->user()->id;
        $this->recentlyUploaded = CourseChaptersUpload::whereHas('course', function ($query) use ($userId) {
            $query->where('course_proguide_id', $userId);
        })->latest()->limit(10)->get();
 

        $this->interest_all=Interest::all();
    }

    public function addChapter()
    {
        $this->chapters[] = [
            'chapter_title' => '',
            'description' => '',
            'course_video' =>'',
            'assignment_files' => '',
            'course_resources'=>'',
        ];

    }

    public function removeChapter($index)
    {
        unset($this->chapters[$index]);
        $this->chapters = array_values($this->chapters);
    }


#adding course
public function AddCourse(){
        $data=[
            'interest'=>$this->interest
        ];

        #validation
        $this->validate([
            'banner' => 'required|mimes:jpg,bmp,png,jpeg',
            'title' => 'required',
            'description' => 'required',
            'chapters.*.chapter_title' => 'required|string',
            'chapters.*.description' => 'required|string',
            'chapters.*.description' => 'required|string',
            'chapters.*.course_video' => 'required|file|mimes:mp4,mov,ogg,qt,mkv|max:10240',
            'chapters.*.assignment_files' => 'required|file|mimes:pdf,msword,txt|max:10240', 
            'chapters.*.course_resources' => 'required',
        ], [
            'banner.required' => 'Please upload a banner image.',
            'banner.mimes' => 'The banner must be a file of type: jpg, bmp, png, jpeg.',
            
            'title.required' => 'The course title is required.',
            
            'description.required' => 'The course description is required.',
            
            'chapters.*.chapter_title.required' => 'Each chapter must have a title.',
            'chapters.*.chapter_title.string' => 'The chapter title must be a string.',
            
            'chapters.*.description.required' => 'Each chapter must have a description.',
            'chapters.*.description.string' => 'The chapter description must be a string.',

            'chapters.*.course_video.required' => 'Each chapter must have a course video.',
            'chapters.*.course_video.mimes' => 'Course video must be an mp4,mov,ogg,qt or mkv files only',

            'chapters.*.assignment_files.required' => 'Each chapter must have a assignment files.',
            'chapters.*.assignment_files.mimes' => 'Assignment file must be a pdf,msword or txt files only',
            
            'chapters.*.course_resources.required' => 'Please provide course resources for each chapter.',
        ]);
        

        try{

              if(count($this->chapters)<=7){
                
                  session()->flash('chapters','Please add at least 7 chapters');
              }
              
            elseif($this->course_mode==="paid" && $this->price===null){
                
                session()->flash('prices','Please enter a price for course');
             }

            elseif(count($this->interest)===0){

                 session()->flash('interest','Please select at least 1 interest of choice');
                }

                else{
                       
                        #banner file
                        $bannerfile=$this->banner->store('/', 'course_video');
                        $bannerUrl="https://myprojkonnect-s3bucket.s3.amazonaws.com/course_video/".$bannerfile;

                        #insert into course table
                        $courseUpload=CourseUpload::create([
                            'course_banner'=>$bannerUrl,//aws
                            'course_title'=>$this->title,
                            'course_description'=>$this->description,
                            'course_price'=>$this->price ?? '0',
                            'course_proguide_id'=>auth()->guard('web')->user()->id,
                            'course_students'=>'0',
                            'course_revenue'=>'0',
                            'course_interest'=>json_encode($this->interest),
                            'course_status'=>'pending',
                        ]);
                    

                        #Process the validated data
                        foreach ($this->chapters as $index => $chapter) {

                            $videoUrl=$chapter['course_video']->store('/', 'course_video');
                            $this->videos="https://myprojkonnect-s3bucket.s3.amazonaws.com/course_video/".$videoUrl;
                            
                       
                            $assignmentUrl=$chapter['assignment_files']->store('/', 'course_video');
                            $this->assignment="https://myprojkonnect-s3bucket.s3.amazonaws.com/course_video/".$assignmentUrl;

                        
                        #save each chapter to the database
                        $inserCourseChapters=CourseChaptersUpload::create([
                                'course_Id'=>$courseUpload->id,
                                'course_chapter' => $chapter['chapter_title'],
                                'description' => $chapter['description'],
                                'course_video' => $this->videos,//aws
                                'course_assignment' => $this->assignment,//aws
                                'course_resources' => $chapter['course_resources'],
                            ]);
                        }

                        #send mail to proguide
                        $username=auth()->guard('web')->user()->full_name;
                        $useremail=auth()->guard('web')->user()->email;
                        $coursename=$this->title;

                        Mail::to($useremail)->send(new ProguideCourseEmail($username,$useremail,$coursename));

                        #Notify All the Admin (Administrative)
                            $bulkMessage=AdminWebTable::where(['role'=>'manager'])->get();
                            if($bulkMessage){

                                foreach ($bulkMessage as $users) {
                                
                                    $managerEmails=$users->email;
                                    $username=auth()->guard('web')->user()->full_name;
                                    $useremail=auth()->guard('web')->user()->email;
                                    $coursename=$this->title;
                                    #dd($username);
                                    Mail::to($managerEmails)->send(new AdminCourseEmailNotify($username,$useremail,$coursename));
                
                                }

                                #Send Email and insert into notifications student
                                $courseInterests=$this->interest;

                                #Get all students of interest
                                $usersInfo = UsersTables::whereHas('interests', function ($query) use ($courseInterests) {
                                    $query->where(function ($subQuery) use ($courseInterests) {
                                        foreach ($courseInterests as $interestId) {
                                            $subQuery->orWhere('interest_id', $interestId);
                                        }
                                    });
                                })->select('id', 'email','full_name')->get();
                    
                                #Notification Students of Interest
                                foreach ($usersInfo as $user) {
                                    $newNotification=Allnotification::create([
                                        'user_id' => $user->id,
                                        'notification' => auth()->guard('web')->user()->full_name." ".'Added a new course of interest,check it out',
                                        'is_read' => false,
                                    ]);
                                    if($newNotification){
                                        #send email
                                        $proguideName=auth()->guard('web')->user()->full_name;
                                        $username=$user->full_name;
                                        $useremail=$user->email;
                                        $coursename=$this->title;
                                        Mail::to($useremail)->send(new NewcourseNotificationStudent($username,$proguideName,$coursename));
                                    }
                                }
                               
                                    
                                session()->flash('success','Course Created Successfully');
                                return redirect('/proguide/create-course');
                       
                           }

                    
                       

                }

              
            }
            catch(\Throwable $g){
               session()->flash('error',"Sorry a network error occured try again,");
               #dd($g->getMessage());
           }

    }

    

    public function render()
    {
        return view('livewire.proguides.createcourse');
    }
}
