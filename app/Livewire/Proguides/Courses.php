<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use App\Models\Interest;
use App\Models\UserInterest;

class Courses extends Component
{
    protected $listeners = ['EditCourse'];

    #course pages variables
    public $courses,$averagerating,$totalviews,$totalpurchase,$countPurchase,$totalEarnings,$courseTable;

    #course popup details
    public $coursetitle,$coursebanner,$courseId;

    public function mount(){

         #course list in table
         $userId=auth()->guard('web')->user()->id;


        $this->courses=CourseUpload::where(['course_proguide_id'=>$userId])->count();
        $this->totalpurchase = StudentCourseAdding::with(['student','course'])->where(['proguide_id'=>$userId,'payment_status'=>'paid'])->count();
        $this->totalEarnings = StudentCourseAdding::where(['proguide_id'=>$userId,'payment_status'=>'paid'])->sum('payment_amount');
       
        // $this->totalpurchase=CourseUpload::with(['purchasedCourses' => function ($query) use ($userId) {
        //     $query->where(['payment_status'=>'paid'])->count();
        // }])->where(['course_proguide_id'=>$userId])->get();
        // foreach($this->totalpurchase as $purchased){

        //     $this->countPurchase=count($purchased->purchasedCourses);
        // }

         $this->courseTable=CourseUpload::with(['chapters','purchasedCourses'])->where(['course_proguide_id'=>$userId])->get();
          
         #dd($this->courseTable);
        
    }


    #Course Popup
    public function EditCourse($value){
        try{
    
            
            $coursePopup=CourseUpload::where(['id'=>$value])->first();
            #dd($coursePopup);
            
            $this->coursetitle=$coursePopup->course_title;
            $this->coursebanner=$coursePopup->course_banner;
            $this->courseId=$value;
            
        }
        catch(\Throwable $g){
            
            #dd('error');
        }
        
    }


    #Delete Course
    public function DeleteCourse($value){
       try{
           
            $courseDelete=CourseUpload::where(['id'=>$value])->delete();
            if($courseDelete){
                #delete Chapters
                $deletChapters=CourseChaptersUpload::where(['course_Id'=>$value])->delete();

                session()->flash('success','Course Deleted Successfully');
                return redirect('/proguide/course');
            }

         }
       catch(\Throwable $g){
            session()->flash('error','A network error occured');
            return redirect('/proguide/course');
        }
        
    }


    public function render()
    {
        return view('livewire.proguides.courses');
    }
}
