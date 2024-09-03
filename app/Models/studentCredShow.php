<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class studentCredShow extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="student_cred_shows";

    protected $casts=[
        'credshow_step1'=>'array',
        'credshow_step2'=>'array',
        'credshow_step3'=>'array',
        'credshow_step4'=>'array',
    ];
}
