<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseUpload extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="course-_uploads";

    protected $casts = [
        'course_interest' => 'array',
    ];

    public function chapters()
    {
        return $this->hasMany(CourseChaptersUpload::class,'course_Id');
    
    }

    public function proguide()
    {
        return $this->belongsTo(UsersTables::class, 'course_proguide_id');
    }

    public function purchasedCourses()
    {
        return $this->hasManyThrough(StudentCourseAdding::class,CourseUpload::class,'id','course_id',);
        
    }

   
}
