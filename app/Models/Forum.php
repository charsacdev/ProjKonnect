<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="forums";

    public function student()
    {
        return $this->belongsTo(UsersTables::class, 'user_id');
    }
}
