<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\LivesessionMeeting;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use App\Models\StudentPointsEarnings;
use App\Models\Interest;
use App\Models\UserInterest;
use App\Models\UsersTables;
use App\Models\Allnotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardHeaderStudents extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search courses based on the query
        $courses = CourseUpload::where('course_title', 'LIKE', "%{$query}%")->limit(10)->get();

        // Prepare the output HTML
        if ($courses->isEmpty()) {
            $output = '<center><p>No courses found.</p></center>';
        } else {
            $output = '';
            foreach ($courses as $course) {
                $output .= '
                <div class="result">
                    <a href="course-preview/' . base64_encode($course->id) . '">
                        <h3 class="title">' . htmlspecialchars($course->course_title, ENT_QUOTES, 'UTF-8') . '</h3>
                    </a>
                    <p class="short-desc">' . htmlspecialchars($course->course_description, ENT_QUOTES, 'UTF-8') . '</p>
                </div>';
            }
        }

        // Return the output to be displayed in the AJAX call
        return response()->json(['html' => $output]);
    }



    #Course Points
    public function getPoints(){
        
        $userId=auth()->guard('web')->user()->id;
        $pointsTable=StudentPointsEarnings::where('user_id',$userId)->first();

        return response()->json(['html' => $pointsTable]);
    }


    #get and count notifications
    public function Notifications(){

        $userId=auth()->guard('web')->user()->id;
        $notification = Allnotification::where(['user_id'=>$userId,'is_read'=>0])->latest()->limit(2)->get();
        $output = '';
        
        foreach ($notification as $notify) {
            $output .= '
            <div class="notice-ctn">
                <div class="img">
                    <img src="' . asset('student-asset/asset/img/user-picture.png') . '" alt="">
                </div>
                <div class="notice">
                    <p>' . $notify->notification . '</p>
                    <small class="time">' . $notify->created_at->diffForHumans() . '</small>
                </div>
                <div class="resta"></div>
            </div>';
        }
        

        $notificationCount=Allnotification::where(['user_id'=>$userId,'is_read'=>0])->count();

        return response()->json(['notification' =>$output,'count'=>$notificationCount]);
    }

    #expire notifications
    public function ExpireNotification(){

        $notificationCheck = Allnotification::where([
            'created_at', '>=', Carbon::now()->subDay()
        ])
        ->update([
            'is_read'=>1
        ]);
        if($notificationCheck){
            return response()->json("Notification Expired for 24hours");
        }

    }
}
