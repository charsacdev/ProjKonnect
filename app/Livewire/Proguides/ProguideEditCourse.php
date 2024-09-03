<?php

namespace App\Livewire\Proguides;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\CourseUpload;
use App\Models\Interest;
use App\Models\AdminWebTable;
use App\Models\CourseChaptersUpload;
use Livewire\WithFileUploads;
use App\Mail\AdminCourseEmailNotify;
use App\Mail\ProguideCourseEmail;

class ProguideEditCourse extends Component
{
    use  WithFileUploads;

    #course uploads details
    public $banner,$title,$description,$price,$course_mode,$interest=[];

    public $chapters = [],$interest_all;

    #aws file upload
    #public $videos=[],$assignment=[];

    #fetching course chapters
    public $Course_Chapters,$lastSegment,$totalStudent,$totalPurchase;

    public function mount(){

        #url
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));
         
        $userId=auth()->guard('web')->user()->id;
        $allCourses = CourseUpload::with(['chapters','purchasedCourses'])->where(['id'=>$this->lastSegment])->first();

       
        #Course Details
        $this->banner=$allCourses->course_banner;
        $this->title=$allCourses->course_title;
        $this->description=$allCourses->course_description;
        $this->price=$allCourses->course_price;

        $this->chapters=$allCourses->chapters;

        $this->totalStudent=$allCourses->course_students;
        $this->totalPurchase=count($allCourses->purchasedCourses);


            #Chapters Details
            $this->chapters = CourseChaptersUpload::where('course_Id',$this->lastSegment)->get()->map(function($chapter) {
                return [
                    'id' => $chapter->id,
                    'chapter_title' => $chapter->course_chapter,
                    'description' => $chapter->description,
                    'course_video' => $chapter->course_video,
                    'assignment_files' => $chapter->course_assignment,
                    'course_resources' => $chapter->course_resources,
                ];
            })->toArray();

    }

        
    #Updating Course
    public function UpdateCourse(){

        

        #validation
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'chapters.*.chapter_title' => 'required|string',
            'chapters.*.description' => 'required|string',
            'chapters.*.course_resources' => 'required',
        ], [
            'title.required' => 'The course title is required.',
            
            'description.required' => 'The course description is required.',
            
            'chapters.*.chapter_title.required' => 'Each chapter must have a title.',
            'chapters.*.chapter_title.string' => 'The chapter title must be a string.',
            
            'chapters.*.description.required' => 'Each chapter must have a description.',
            'chapters.*.description.string' => 'The chapter description must be a string.',
            
            'chapters.*.course_resources.required' => 'Please provide course resources for each chapter.',
        ]);

        

        try{
            if($this->course_mode===null){
                session()->flash('prices','Please Update Course Mode');
            }
            elseif(empty($this->price) && $this->course_mode==="paid"){
                session()->flash('prices','Please Enter a price for course');
            }

            else{

                #update course mode
                if($this->course_mode==="free"){
                    $this->price=0;
                    #dd($this->price);
                  }
                       
                       #update course table
                        $courseUpload=CourseUpload::where(['id'=>$this->lastSegment])->update([
                            
                            'course_title'=>$this->title,
                            'course_description'=>$this->description,
                            'course_price'=>$this->price,
                            'course_proguide_id'=>auth()->guard('web')->user()->id,
                        ]);
                    
                       
                        #Process the validated data
                        foreach ($this->chapters as $index => $chapter) {

                            $videoUrl = $chapter['course_video']; 
                            $AssigmentUrl=$chapter['assignment_files'];
                        
                            if (isset($chapter['course_video']) && is_file($chapter['course_video'])) {
                                $this->validate(
                                    ['chapters.' . $index . '.course_video' => 'file|mimes:mp4,mov,ogg,qt,mkv|max:10240'],
                                    ['chapters.' . $index . '.course_video' => 'The course video must be a mp4,mov,ogg,qt or mkv file.']
                                );
                        
                                # Store video file and get URL
                                $storedVideoPath = $chapter['course_video']->store('/', 'course_video');
                                $videoUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/course_video/" . $storedVideoPath;
                            }

                            if (isset($chapter['assignment_files']) && is_file($chapter['assignment_files'])) {
                                $this->validate(
                                    ['chapters.' . $index . '.assignment_files' => 'file|mimes:pdf,msword,txt,docx|max:10240'],
                                    ['chapters.' . $index . '.assignment_files' => 'The assigment  must be a pdf,msword,txt or docx file.']
                                );
                        
                                # Store assignment file and get URL
                                $storedVideoPath = $chapter['assignment_files']->store('/', 'course_video');
                                $AssigmentUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/course_video/" . $storedVideoPath;
                            }
                        
                        
                            # Update the current chapter with its unique video URL
                            CourseChaptersUpload::where([
                                'course_Id' => $this->lastSegment,
                                'id' => $chapter['id'],
                            ])->update([
                                'course_chapter' => $chapter['chapter_title'],
                                'description' => $chapter['description'],
                                'course_video' => $videoUrl, 
                                'course_assignment' => $AssigmentUrl,
                                'course_resources' => $chapter['course_resources'],
                            ]);
                        }
                        
                        
                        session()->flash('success','Course Updated Successfully');
                        return redirect('/proguide/course');
                       
                  }

            }
            catch(\Throwable $g){
               session()->flash('prices',"Please check file types for Assignment and Video content");
               #dd($g->getMessage());
           }

    }
       
    

    
    public function render()
    {
        return view('livewire.proguides.proguide-edit-course');
    }
}
