<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReviews extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="course_reviews";

    public function students(){
        
        return $this->belongsTo(UsersTables::class,'user_id');
    
    }
}
