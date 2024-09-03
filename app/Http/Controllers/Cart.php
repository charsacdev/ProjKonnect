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

class Cart extends Controller
{
    
    #count the cart added
    public function CountCart(){

        $userId=auth()->guard('web')->user()->id;
        $cartCount=StudentCourseAdding::where(['payment_status'=>'pending','student_id'=>$userId])->count();

       echo $cartCount;
       #dd($cartCount);
       #return view('students.dashboard-header')->with('cartCount',$cartCount);
       
    }


    public function CartTotal(){

        $userId=auth()->guard('web')->user()->id;
        $totalCount=StudentCourseAdding::where(['payment_status'=>'pending','student_id'=>$userId])->sum('payment_amount');;

       echo $totalCount;
       #dd($cartCount);
       #return view('students.dashboard-header')->with('cartCount',$cartCount);
       
    }
    
    
}
