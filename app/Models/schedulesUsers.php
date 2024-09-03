<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedulesUsers extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="schedules_users";

    public function user()
    {
        return $this->belongsTo(UsersTables::class, 'user_id');
    }
}
