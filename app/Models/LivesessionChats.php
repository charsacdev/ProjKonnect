<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivesessionChats extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="livesession_chats";

    public function user()
    {
        return $this->belongsTo(UsersTables::class, 'user_id');
    }
}
