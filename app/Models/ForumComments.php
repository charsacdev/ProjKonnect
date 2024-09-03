<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumComments extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="forum_comments";

    public function student()
    {
        return $this->belongsTo(UsersTables::class, 'user_id');
    }
}
