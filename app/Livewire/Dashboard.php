<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\LivesessionMeeting;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use App\Models\Interest;
use App\Models\UserInterest;
use App\Models\UsersTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Component
{
    #public variable dashboard content
    public $upcomingsession,$jobs,$pitches,$interview,$enrolled,$completed;

    #featured course
    public $featuredCourse;

    #Porguides
    public $proguides;

    public function mount(){

        $user=auth()->guard('web')->user();

        #count upcoming session
        $this->upcomingsession=LivesessionMeeting::with(['proguide','attendee'=>function ($query) use ($user) {
            $query->where('meeting_attendee',$user->id);
        }])->count();

        #count enrolled course
        $this->enrolled=StudentCourseAdding::where(['student_id'=>$user->id,'payment_status'=>'paid'])->count();

        #count completed course
        $userId=auth()->guard('web')->user()->id;
        $this->completed = CourseUpload::whereHas('purchasedCourses', function ($query) use ($userId) {
            $query->where('student_id', $userId)
                  ->whereColumn('current_chapters', 'course_chapters');
        })->with([
            'chapters',
            'proguide',
            'purchasedCourses' => function ($query) use ($userId) {
                $query->where('student_id', $userId);
            }
        ])->withCount('chapters')->count();


        #Fetch user's interests and featured course
        $userId=auth()->guard('web')->user()->id;
        $userInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();
        
        #Fetch all courses
        $allCourses = CourseUpload::with(['chapters', 'proguide', 'purchasedCourses' => function ($query) use ($userId) {
            $query->where(['student_id'=>$userId,'payment_status'=>'paid']);
        }])->withCount('chapters')->latest()->limit(5)->get();

        #Filter courses based on user's interests
        $this->featuredCourse = $allCourses->filter(function ($course) use ($userInterests) {
            $courseInterests = json_decode($course->course_interest, true);
            return !empty(array_intersect($courseInterests, $userInterests));
        });

        #dd($this->featuredCourse);


        #Proguides
        $this->proguides=StudentCourseAdding::with('proguideStudent')->where(['student_id'=>$user->id,'payment_status'=>'paid'])
        ->limit(5)
        ->get()
        ->unique('proguide_id');
        
        #dd($this->proguides);

    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
