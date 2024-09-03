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
use App\Models\Interest;

class Livelearn extends Component
{
    #livelearn session
    public $sessions,$upcoming,$participants,$hours,$allsessions;

    #mount function
    public function mount(){

        $this->sessions=LivesessionMeeting::where(['proguide_id'=>auth()->guard('web')->user()->id,'meeting_status'=>'ended'])->count();
        $this->upcoming=LivesessionMeeting::where(['proguide_id'=>auth()->guard('web')->user()->id,'meeting_status'=>'pending'])->count();
        $this->hours=LivesessionMeeting::where(['proguide_id'=>auth()->guard('web')->user()->id,'meeting_status'=>'ended'])->sum('meeting_duration');

        $this->allsessions=LivesessionMeeting::where(['proguide_id'=>auth()->guard('web')->user()->id])->get();
    }

    #Edit Blog
    public function EditBlog($id){
        dd($id);
    }

    public function render()
    {
        return view('livewire.proguides.livelearn');
    }
}
