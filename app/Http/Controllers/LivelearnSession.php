<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\URL;

class LivelearnSession extends Controller{

    #variables for getting the user details
    public $appID,$channelName,$token,$meeting_title,$meeting_description;

    #Meeting Participant
    public $participant;

    public function loadsesion(){

        #$meetingDetails
        $url = URL::current(); 
        $segments = explode("/",$url);

        if(isset($segments[4])){
           
            $meetingID=$segments[4];
            $userId=auth()->guard('web')->user()->id;
            $meetingCheck=LivesessionMeeting::where(['meeting_name'=>$meetingID])->first();

            #update Meeting
            $meetingCheck->meeting_status="live";
            $meetingCheck->save();

            if($meetingCheck==TRUE){
                 #check if user registered for the meeting
                $attendee=LivesessionAttendee::where(['meeting_id'=>$meetingCheck->id,'meeting_attendee'=>$userId])->first();
                if($attendee==TRUE and $attendee->pay_status==="paid"){
                    $this->appID=$meetingCheck->app_id;
                    $this->channelName=$meetingCheck->meeting_name;
                    $this->token=$meetingCheck->token;
                    $this->meeting_title=$meetingCheck->meeting_title;
                    $this->meeting_description=$meetingCheck->meeting_description;

                    #get all meeting attendee
                    $this->participant=LivesessionAttendee::with('student')->where(['meeting_id'=>$meetingCheck->id,'pay_status'=>"paid"])->get();
                    
                    return view('homepages.livelearn-session')->with([
                        "appID"=>$this->appID,
                        "channelName"=>$this->channelName,
                        "token"=>$this->token,
                        'meeting_title' => $this->meeting_title,
                        'meeting_description'=>$this->meeting_description,
                        'participant'=>$this->participant
                    ]);
                }
                // else{
                //     session()->flash('error','You have not registered for this meeting yet');
                //     return redirect('/proguide/livelearn');
                // }

               
            }
            else{
                // session()->flash('error','Meeting Link does not exisit');
                // return redirect('/proguide/livelearn');
                #dd("No meeting found");
            }
           
        }
        
        
    }
}
