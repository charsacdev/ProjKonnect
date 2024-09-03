<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseChaptersUpload extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="course_chapters_uploads";


    public function course()
    {
        return $this->belongsTo(CourseUpload::class,'course_Id');
    }

    public function chapters()
    {
        return $this->hasMany(CourseChaptersUpload::class,'course_Id');
    
    }





    public function purchasedCourses()
    {
        return $this->hasMany(StudentCourseAdding::class, 'course_id','course_Id');
    }

}
