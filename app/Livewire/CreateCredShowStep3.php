<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use App\Models\UsersTables;
use App\Models\studentCredShow;
use Livewire\WithFileUploads;

class CreateCredShowStep3 extends Component
{
    use  WithFileUploads;

    public $academicProjects = [];
    public $professionalProjects = [];
    public $personalProjects = [];

    public function mount()
    {
        $this->academicProjects = [
            ['name' => '', 'duration' => '', 'summary' => '', 'file' => null],
        ];
        $this->professionalProjects = [
            ['name' => '', 'duration' => '', 'summary' => '', 'file' => null],
        ];
        $this->personalProjects = [
            ['name' => '', 'duration' => '', 'summary' => '', 'file' => null],
        ];
    }

    public function addProject($type)
    {
        $project = ['name' => '', 'duration' => '', 'summary' => '', 'file' => null];

        switch ($type) {
            case 'academic':
                $this->academicProjects[] = $project;
                break;
            case 'professional':
                $this->professionalProjects[] = $project;
                break;
            case 'personal':
                $this->personalProjects[] = $project;
                break;
        }
    }

    public function removeProject($type, $index)
    {
        switch ($type) {
            case 'academic':
                unset($this->academicProjects[$index]);
                break;
            case 'professional':
                unset($this->professionalProjects[$index]);
                break;
            case 'personal':
                unset($this->personalProjects[$index]);
                break;
        }
    }

public function Credshow3(){

    $customMessages = [
        // Academic Projects
        'academicProjects.*.name.required' => 'The academic project name is required.',
        'academicProjects.*.duration.required' => 'The academic project duration is required.',
        'academicProjects.*.summary.required' => 'The academic project summary is required.',
        'academicProjects.*.file.mimes' => 'Each academic project file must be of type: pdf, doc, docx.',
        'academicProjects.*.file.max' => 'Each academic project file may not be greater than 10MB.',
    
        // Professional Projects
        'professionalProjects.*.name.required' => 'The professional project name is required.',
        'professionalProjects.*.duration.required' => 'The professional project duration is required.',
        'professionalProjects.*.summary.required' => 'The professional project summary is required.',
        'professionalProjects.*.file.mimes' => 'Each professional project file must be of type: pdf, doc, docx.',
        'professionalProjects.*.file.max' => 'Each professional project file may not be greater than 10MB.',
    
        // Personal Projects
        'personalProjects.*.name.required' => 'The personal project name is required.',
        'personalProjects.*.duration.required' => 'The personal project duration is required.',
        'personalProjects.*.summary.required' => 'The personal project summary is required.',
        'personalProjects.*.file.mimes' => 'Each personal project file must be of type: pdf, doc, docx.',
        'personalProjects.*.file.max' => 'Each personal project file may not be greater than 10MB.',
    ];
    
    // Validate
    $this->validate([
        'academicProjects.*.name' => 'required|string|max:255',
        'academicProjects.*.duration' => 'required|string|max:255',
        'academicProjects.*.summary' => 'required|string',
        'academicProjects.*.file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
    
        'professionalProjects.*.name' => 'required|string|max:255',
        'professionalProjects.*.duration' => 'required|string|max:255',
        'professionalProjects.*.summary' => 'required|string',
        'professionalProjects.*.file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
    
        'personalProjects.*.name' => 'required|string|max:255',
        'personalProjects.*.duration' => 'required|string|max:255',
        'personalProjects.*.summary' => 'required|string',
        'personalProjects.*.file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
    ], $customMessages);

    try{
        
        $uploadedFiles = [
            'academic' => [],
            'professional' => [],
            'personal' => [],
        ];

        #AWS FILE HANDLING
        if (!empty($this->academicProjects)) {
            foreach ($this->academicProjects as $index => $project) {
                if (isset($project['file']) && $project['file']) {
                    $storedFile = $project['file']->store('/', 'profile_photo');
                    $fileUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/" . $storedFile;
                    $this->academicProjects[$index]['file'] = $fileUrl;
                }
            }
        }
        
        if (!empty($this->professionalProjects)) {
            foreach ($this->professionalProjects as $index => $project) {
                if (isset($project['file']) && $project['file']) {
                    $storedFile = $project['file']->store('/', 'profile_photo');
                    $fileUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/" . $storedFile;
                    $this->professionalProjects[$index]['file'] = $fileUrl;
        }
            }
        }
        
        if (!empty($this->personalProjects)) {
            foreach ($this->personalProjects as $index => $project) {
                if (isset($project['file']) && $project['file']) {
                    $storedFile = $project['file']->store('/', 'profile_photo');
                    $fileUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/" . $storedFile;
                    $this->personalProjects[$index]['file'] = $fileUrl;
                }
            }
        }

          #Holding All info in URL
          $credShow3=[
               "Academic Project"=>$this->academicProjects,
               "Professional Project"=>$this->professionalProjects,
               "Personal Project"=>$this->personalProjects,
          ];

           #handle empty credshow
           $emptyData=[
                "data"=>""
            ];
            

          $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
            'user_id'=>auth()->guard('web')->user()->id,
            'credshow_step3'=>json_encode($credShow3),
            'credshow_step4'=>json_encode($emptyData),
            'credshow_link'=>'',
            'credshow_status'=>'pending',
            'credshow_lasturl'=>'create-cred-show-step3',
        ]);
        if($updateCredShow){
            return redirect('/create-cred-show-step4');
        }
        #dd($credShow1);
        #dd($this->academicProjects,$this->professionalProjects,$this->personalProjects);
    }

    catch(\Throwable $g){
        #dd($g->getMessage());
        #session()->flash('error',"Network Error please try again");
    }

}


    public function render()
    {
        return view('livewire.create-cred-show-step3');
    }
}
