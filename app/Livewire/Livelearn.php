<?php

namespace App\Livewire;

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
use App\Models\Interest;
use App\Models\UserInterest;
use App\Models\StudentCourseAdding;

class Livelearn extends Component
{
    #public variables
    public $livesession;

    public function mount(){

        #Fetch user's interests
        $user=auth()->guard('web')->user();
        $userInterests = UserInterest::where('user_id', $user->id)->pluck('interest_id')->toArray();
        $userCourses=StudentCourseAdding::where(['student_id'=>$user->id,'payment_status'=>'paid'])->pluck('proguide_id')->toArray();
        
        
       #dd($userCourses);

        $allinterests=LivesessionMeeting::with(['proguide','attendee'=>function ($query) use ($user) {
            $query->where('meeting_attendee',$user->id);
        }])->get();

       
        $this->livesession = $allinterests->filter(function ($sessionInterest) use ($user, $userInterests, $userCourses) {
            $meetingParticipant = $sessionInterest->meeting_participant;
            $meetingInterests = json_decode($sessionInterest->meeting_interest, true);

            #One-to-one session: check if the user ID matches the session's interest array
            if ($meetingParticipant == 1) {
                return in_array($user->id, $meetingInterests);
            }
        
            #Subscribed student session: check if the user has purchased the relevant course
            if ($meetingParticipant == 2) {
                return !empty(array_intersect($meetingInterests, $userCourses));
            }
        
            #All interest session: check if the user's interests match the session's interests
            if ($meetingParticipant == 3) {
                return !empty(array_intersect($meetingInterests, $userInterests));
            }
        
            #Default to false for any other cases
            return false;
        });


        
    }

      #Filter courses based on user's interests
        //  $this->livesession = $allinterests->filter(function ($sesion_interest) use ($userInterests) {
        //     $MeetingInterests = json_decode($sesion_interest->meeting_interest, true);

        //     dd($sesion_interest->meeting_participant);
        //     #return !empty(array_intersect($MeetingInterests, $userInterests));
        // });


    public function render()
    {
        return view('livewire.livelearn');
    }
}
