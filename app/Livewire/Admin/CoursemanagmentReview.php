<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use Illuminate\Support\Facades\URL;
use App\Mail\CourseApproval;
use App\Mail\CourseDeclined;

class CoursemanagmentReview extends Component
{
    #All course
    public $allcoursereview;

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        $this->allcoursereview=CourseUpload::where(['id'=>$this->lastSegment])->with(['chapters', 'proguide', 'purchasedCourses'])->first();

    }

    #confirm course 
    public function ConfirmCourse($id){
        try{
            $courseApprove=CourseUpload::where(['id'=>$id])->update([
                'course_status'=>'approved'
             ]);
             if($courseApprove){
                  #send email here
                  $courseDetails=CourseUpload::with(['proguide'])->where(['id'=>$id])->first();
                  $coursename=$courseDetails->course_title;
                  $email=$courseDetails->proguide->email;
                  $name=$courseDetails->proguide->full_name;
                  Mail::to($email)->send(new CourseApproval($coursename,$email,$name));

                  session()->flash('success','Course Approved successfully and is now live!');
                  return redirect('admin-projkonnect/course-management');

             }
        }
        catch(\Throwable $g){
            
            session()->flash('success','A network error occured try again please');
            return redirect('admin-projkonnect/course-management');
            #dd($g->getMessage());
        }
         
    }


    #decline course 
    public function DeclineCourse($id){
        
        try{
            $courseApprove=CourseUpload::where(['id'=>$id])->update([
                'course_status'=>'declined'
             ]);
             if($courseApprove){
                  #send email here
                  $courseDetails=CourseUpload::with(['proguide'])->where(['id'=>$id])->first();
                  $coursename=$courseDetails->course_title;
                  $email=$courseDetails->proguide->email;
                  $name=$courseDetails->proguide->full_name;
                  Mail::to($email)->send(new CourseDeclined($coursename,$email,$name));

                  session()->flash('success','Course Declined successfully and Proguide is being notified!');
                  return redirect('admin-projkonnect/course-management');

             }
        }
        catch(\Throwable $g){
            
            session()->flash('success','A network error occured try again please');
            return redirect('admin-projkonnect/course-management');
            #dd($g->getMessage());
        }
         
    }


    public function render()
    {
        return view('livewire.admin.coursemanagment-review');
    }
}
