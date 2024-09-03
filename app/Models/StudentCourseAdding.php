<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentCourseAdding extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="student_course_addings";

    public function chapters()
    {
        return $this->hasMany(CourseChaptersUpload::class,'course_Id');
    
    }

    public function course(){
        return $this->hasMany(CourseUpload::class,'id');
    
    }

    public function course_cart() {
        return $this->belongsTo(CourseUpload::class, 'course_id');
    }

    public function proguide()
    {
        return $this->belongsTo(UsersTables::class, 'course_proguide_id');
    }

    public function proguideChat()
    {
        return $this->belongsTo(UsersTables::class, 'proguide_id');
    }

    public function student()
    {
        return $this->belongsTo(UsersTables::class, 'student_id');
    }


    #single student
    public function student_single()
    {
        return $this->hasOne(UsersTables::class, 'id','student_id');
    }

    #Chats
    public function chats()
    {
        return $this->hasMany(ChatMessage::class, 'receiver_id', 'proguide_id');
    }



    #Proguide Student
    public function proguideStudent()
    {
        return $this->belongsTo(UsersTables::class, 'proguide_id');
    }

    
}
