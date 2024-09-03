<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsAssignments extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="students_assignments";
}
