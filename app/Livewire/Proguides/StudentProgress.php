<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use App\Models\CourseUpload;
use App\Models\UsersTables;
use App\Models\StudentCourseAdding;

class StudentProgress extends Component
{
    protected $listeners = ['ProgressMessage'];

    #studentpop up details
    public $studentProfile,$studentName,$studentType,$studentId;
    
     public $enrollment,$average,$aboveAvg,$belowAvg,$totalstudent,$totalearnings;
 
     public function mount(){

         $userId=auth()->guard('web')->user()->id;
         $this->enrollment=StudentCourseAdding::with(['student','course'])->where(['proguide_id'=>$userId,'payment_status'=>'paid'])->get();
          
        
        $this->totalstudent = StudentCourseAdding::where(['proguide_id'=>$userId,'payment_status'=>'paid'])->count();
        $this->totalearnings = StudentCourseAdding::where(['proguide_id'=>$userId,'payment_status'=>'paid'])->sum('payment_amount');

         $results = [];

        foreach ($this->enrollment as $item) {
            foreach ($item->course as $course) {
                #Calculate the average
                $average = round(($item->current_chapters / $item->course_chapters) * 100);

                #Store the result
                $results[] = [
                            'student' => $item->student->name, #assuming there is a 'name' field
                            'course' => $course->title, #assuming there is a 'title' field
                            'average' => $average,
                        ];
                    }
                }

                #Process the results Mor than 50
                $countGreaterThan50 = 0;
                foreach ($results as $result) {
                    if ($result['average'] > 50) {
                        $countGreaterThan50++;
                    }
                }

                #Process the result More Less than 50
                $countLessThan50 = 0;
                foreach ($results as $result) {
                    if ($result['average'] < 50) {
                        $countLessThan50++;
                    }
                }

                $this->aboveAvg=$countGreaterThan50;
                $this->belowAvg=$countLessThan50;

                #dd($this->enrollment);
            }

            #Student Progress Popup
            public function ProgressMessage($value){
                try{
            
                    
                    $studenPopUp=UsersTables::where(['id'=>$value])->first();
                    #dd($studenPopUp);
                    
                    $this->studentProfile=$studenPopUp->profile_image;
                    $this->studentName=$studenPopUp->full_name;
                    $this->studentType=$studenPopUp->user_type;
                    $this->studentId=$value;
                    
                }
                catch(\Throwable $g){
                    
                    #dd('error');
                }
                
            }

    public function render()
    {
        return view('livewire.proguides.student-progress');
    }
}
