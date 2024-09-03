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
use App\Models\Allnotification;
use App\Models\UserInterest;

class Course extends Component
{
    #course selecting
    public $Allcourse,$enrolledCourses,$coursechapters,$currentchapters,$completed,$uncompleted;

    #Notification
    public $Notification;

    public function mount(){

           $userId=auth()->guard('web')->user()->id;

           #Fetch user's interests
           $userInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();

            $this->Allcourse = CourseUpload::where(['course_status'=>'approved'])->whereHas('purchasedCourses', function ($query) use ($userId) {
                $query->where(['payment_status'=>'paid','student_id'=>$userId]);
            })->with(['chapters', 'proguide', 'purchasedCourses' => function ($query) use ($userId) {
                $query->where(['payment_status'=>'paid','student_id'=>$userId]);
            }])->withCount('chapters')->get();

        #course progress
        $this->coursechapters=StudentCourseAdding::where(['student_id'=>$userId,'payment_status'=>'paid'])->sum('course_chapters');
        $this->currentchapters=StudentCourseAdding::where(['student_id'=>$userId,'payment_status'=>'paid'])->sum('current_chapters');

        if($this->coursechapters){
            $this->completed=round((($this->currentchapters/$this->coursechapters)*100),2);
            $this->uncompleted=round((100-$this->completed),2);
        }
        else{

            $this->completed="0";
            $this->uncompleted="0";
        }


        #Notification Course
        $this->Notification=Allnotification::where(['user_id'=>auth()->guard('web')->user()->id])->latest()->limit(2)->get();
        #dd($this->Notification);
        

        #dd($this->completed,$this->uncompleted);
    }

    public function render()
    {
        return view('livewire.course');
    }
}
