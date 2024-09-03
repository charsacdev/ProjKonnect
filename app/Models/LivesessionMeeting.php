<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LivesessionMeeting extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="livesession_meetings";


    public function proguide()
    {
        return $this->belongsTo(UsersTables::class, 'proguide_id');
    }

    public function attendee(){
        
            return $this->hasMany(LivesessionAttendee::class,'meeting_id');
        
    }
}
