<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LivesessionAttendee extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="livesession_attendees";

    public function meeting()
    {
        return $this->belongsTo(LivesessionMeeting::class);
    }

    public function student()
    {
        return $this->belongsTo(UsersTables::class, 'meeting_attendee');
    }
}
