<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQualifications extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="user_qualifications";
}
