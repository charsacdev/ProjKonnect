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
use App\Models\LivesessionAttendee;
use App\Models\LivesessionChats;
use App\Models\Interest;
use App\Models\UserInterest;
use Illuminate\Support\Facades\URL;
use Livewire\WithFileUploads;

class LivesSessionMeetingGeneral extends Component
{
    use  WithFileUploads;

    #variables for getting the user details
    public $appID,$channelName,$token,$meeting_title,$meeting_description;

    #Meeting Participant
    public $participant,$meetingDetails,$meetingUrl;

    #send Message details
    public $message,$sender_id,$file,$sessionID,$ChatsMessage;

    public function mount(){

        #$meetingDetails
        $url = URL::current(); 
        $segments = explode("/",$url);

        #Used in Ending Meeting
        $this->meetingUrl=$segments[4];

        if(isset($segments[4])){
           
            $meetingID=$segments[4];
            $accountType=auth()->guard('web')->user()->user_type;
            $userId=auth()->guard('web')->user()->id;

            $meetingCheck=LivesessionMeeting::where(['meeting_name'=>$meetingID])->first();

            #Pass SessionID to Send Message
            $this->sessionID=$meetingCheck->id;

            #Show Message
            $this->showMessage();

            $MeetingAttendee=LivesessionAttendee::where(['meeting_attendee'=>$userId,'meeting_id'=>$meetingCheck->id,'pay_status'=>"paid"])->first();
           
            #update Meeting
            if($MeetingAttendee){
                if($accountType==="proguide" && $meetingCheck->meeting_status=="pending"){
                    #Proguide Update Meeting Live
                    $meetingCheck->meeting_status="live";
                    $meetingCheck->save();
  
                    #Proguide Update Attendance
                    $MeetingAttendee->meeting_status="active";
                    $MeetingAttendee->save();
              }
              else{
  
                  #Student Update Attendance
                  $MeetingAttendee->meeting_status="active";
                  $MeetingAttendee->save();
              }
  
            }
           
            #Meeting and Authenticated user details
            $this->meetingDetails=$meetingCheck;

            #Check if Meeting is Started or Ended and Meeting Links
            if($meetingCheck==TRUE){

                #check if meeting is live
                if($meetingCheck->meeting_status=="live"){
                        #check if user registered for the meeting
                        $attendee=LivesessionAttendee::where(['meeting_id'=>$meetingCheck->id,'meeting_attendee'=>$userId])->first();
                        if($attendee==TRUE and $attendee->pay_status==="paid"){
                            $this->appID=$meetingCheck->app_id;
                            $this->channelName=$meetingCheck->meeting_name;
                            $this->token=$meetingCheck->token;
                            $this->meeting_title=$meetingCheck->meeting_title;
                            $this->meeting_description=$meetingCheck->meeting_description;

                            #get all meeting attendee
                            $this->participant=LivesessionAttendee::with('student')->where(['meeting_id'=>$meetingCheck->id,'pay_status'=>"paid",'meeting_status'=>'active'])->get();
                            
                            #dd($this->meetingDetails);
                            return view('homepages.livelearn-session')->with([
                                "appID"=>$this->appID,
                                "channelName"=>$this->channelName,
                                "token"=>$this->token,
                                'meeting_title' => $this->meeting_title,
                                'meeting_description'=>$this->meeting_description,
                                'participant'=>$this->participant,
                                'meeting'=>$this->meetingDetails,
                                
                            ]);
                        }
                        else{
                            if($accountType=="proguide"){
                                session()->flash('error','You have not registered for this meeting yet');
                                return redirect('/proguide/livelearn');
                            }
                            else{
                                session()->flash('error','You have not registered for this meeting yet');
                                return redirect('/livelearn');
                            }
                        }

                }
                elseif($meetingCheck->meeting_status=="ended"){
                    if($accountType=="proguide"){
                        session()->flash('error','Meeting has ended.');
                        return redirect('/proguide/livelearn');
                        #dd("No meeting found");
                    }
                    else{
                        session()->flash('error','Meeting has ended.');
                        return redirect('/livelearn');
    
                    }

                }
                else{

                    if($accountType=="proguide"){
                        session()->flash('error','Meeting has not started yet.');
                        return redirect('/proguide/livelearn');
                        #dd("No meeting found");
                    }
                    else{
                        session()->flash('error','Meeting has not started yet.');
                        return redirect('/livelearn');
    
                    }
                }
                   
            }
            else{
                if($accountType=="proguide"){
                    session()->flash('error','Meeting Link does not exisit');
                    return redirect('/proguide/livelearn');
                    #dd("No meeting found");
                }
                else{
                    session()->flash('error','Meeting Link does not exisit');
                    return redirect('/livelearn');

                }
                
            }
           
        }
        
        
    }


    #Leave Meeting
    public function LeaveMeeting(){

            #$meetingDetails
            $meetingID=$this->meetingUrl;
            $accountType=auth()->guard('web')->user()->user_type;
            $userId=auth()->guard('web')->user()->id;

            #dd($meetingID,$accountType,$userId);

            $meetingCheck=LivesessionMeeting::where(['meeting_name'=>$meetingID])->first();
            $MeetingAttendee=LivesessionAttendee::where(['meeting_attendee'=>$userId,'meeting_id'=>$meetingCheck->id,'pay_status'=>"paid"])->first();
           
            #update Meeting
            if($accountType==="proguide"){
                  #Proguide Update Meeting Live
                  $meetingCheck->meeting_status="ended";
                  $meetingCheck->save();

                  #Proguide Update Attendance
                  $MeetingAttendee->meeting_status="pending";
                  $MeetingAttendee->save();

                  session()->flash('error','Meeting has ended');
                  return redirect('/proguide/livelearn');
            }
            else{

                #Student Update Attendance
                $MeetingAttendee->meeting_status="pending";
                $MeetingAttendee->save();

                session()->flash('error','Meeting has ended');
                return redirect('/proguide/livelearn');
            }

    }


    #Send Message
    public function sendMessage(){
        try{
            
                #$files
                if(is_file($this->file)){

                    $this->validate([
                        'file'=>'mimes:jpg,bmp,png,jpeg,mp4,mov,ogg,qt,mkv,pdf,msword,txt',
                    ]);
                    $ext = $this->file->extension();
                    $sizeFile = $this->file->getSize();

                    #upload file AWS
                    $files=$this->file->store('/', 'chat_files');
                
                    #file URL
                    $fileUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/chat_files/".$files;
                    
                }

                
                #Chat Message
                LivesessionChats::create([
                    'session_id' => $this->sessionID,
                    'user_id' => auth()->guard('web')->user()->id,
                    'message' => $this->message,
                    'files' => $fileUrl ?? null,
                    'file_type' => $ext ?? null,
                    'file_size'=> $sizeFile ?? null,
                ]);

                
                #show all messages
                $this->message = '';
                $this->file="";
                $this->showMessage();
                #dd("Message Sent");

        }
        catch(\Throwable $g){

            #session()->flash('error','An error occured please try again.');
            dd($g->getMessage());
        }

        
    }



    #Show Message
    public function showMessage(){
        
        #Fetch the chat messages for the livelearn session
        $chats = LivesessionChats::with('user')->where(['session_id'=>$this->sessionID])
        ->get();

        $this->ChatsMessage=$chats;
  
    }

    public function render()
    {
        return view('livewire.lives-session-meeting-general');
    }
}
