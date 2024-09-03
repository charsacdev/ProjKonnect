<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPointsEarnings extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="student_points_earnings";
}
