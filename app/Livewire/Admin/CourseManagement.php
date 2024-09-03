<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\CourseUpload;
use App\Models\CourseChaptersUpload;
use App\Models\StudentCourseAdding;
use Illuminate\Support\Facades\URL;

class CourseManagement extends Component
{
    protected $listeners = ['CoursePreview'];

    #public variables
    public $courses;

    #course review details
    public $coursesreviewCheck,$courseBanner,$courseTitle,$courseUrl,$proguideInfo;

    public function mount(){

        $this->courses=CourseUpload::with(['chapters', 'proguide', 'purchasedCourses'])->latest()->get();

        #dd($this->courses);
    }

    public function CoursePreview($value){
        
        #course predetails
        $courseReview=CourseUpload::where(['id'=>$value])->with(['chapters', 'proguide', 'purchasedCourses'])->first();

        $this->coursesreviewCheck=$courseReview->id;
        $this->courseBanner=$courseReview->course_banner;
        $this->courseTitle=$courseReview->course_title;
        $this->courseId=$courseReview->id;
        $this->proguideInfo=$courseReview->proguide->full_name;

        #dd($this->courseBanner);
    }


    public function render()
    {
        return view('livewire.admin.course-management');
    }
}
