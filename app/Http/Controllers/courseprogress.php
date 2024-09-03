<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use App\Models\Interest;
use App\Models\UserInterest;
use Illuminate\Support\Facades\URL;

class courseprogress extends Controller
{
    #course progress
    public function CourseProgress($id,$id_next){
        dd($id,$id_next);
    }
}
