<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\LivesessionMeeting;
use App\Models\LivesessionAttendee;
use App\Models\CourseUpload;
use App\Models\UsersTables;
use App\Models\StudentCourseAdding;

class Dashboard extends Component
{
    #dashboard details
    public $upcomingsession,$totalstudent,$totalearnings,$totalcourse;

    public $enrollment;

    public function mount(){
        
        $this->upcomingsession=LivesessionMeeting::where(['proguide_id'=>auth()->guard('web')->user()->id,'meeting_status'=>'pending'])->count();
        
        $userId=auth()->guard('web')->user()->id;
        $this->totalstudent = StudentCourseAdding::where(['proguide_id'=>$userId,'payment_status'=>'paid'])->count();

        $this->totalearnings = StudentCourseAdding::where(['proguide_id'=>$userId,'payment_status'=>'paid'])->sum('payment_amount');

        $this->totalcourse=CourseUpload::where(['course_proguide_id'=>$userId])->count();

        #dd($this->totalcourse);

        $this->enrollment=StudentCourseAdding::with(['course'])->where(['proguide_id'=>$userId,'payment_status'=>'paid'])->get();

        #dd($this->enrollment);
    }


    public function render()
    {
        return view('livewire.proguides.dashboard');
    }
}
