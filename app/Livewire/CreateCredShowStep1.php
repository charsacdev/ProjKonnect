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

class CreateCredShowStep1 extends Component
{
    use  WithFileUploads;

    #Personal Information
    public $fullname,$phone,$email,$address,$socials = [
        'instagram' => '',
        'behance' => '',
        'twitter' => '',
        'github' => '',
    ];

    #Background Education
    public $schoolAttended,$degree,$cgpa,$coursework,$academicproject;

    #work Experience
    public $institution,$position,$startdate,$enddate,$reponsiblity,$achievement;

    #certification
    public $certification=[
          'one'=>'',
          'two'=>'',
    ],
    $certOrganization=[
        'one'=>'',
        'two'=>'',
    ],
    $yearOrganization=[
        'one'=>'',
        'two'=>'',
    ];

    #Honor and award
    public $honorTitle=[
        'one'=>'',
        'two'=>'',
        'three'=>''
    ];

    public $honorFile=[
        'one'=>'',
        'two'=>'',
        'three'=>''
    ];

    #Activities
    public $studentOrganization,$sportTeam,$conference,$studentClub;

    #Volunteering
    public $Volunteerorganization,$VolunteerDuration,$VolunteerCourseSupported,$VolunteerAccomplishment;

    #Additional
    public $publications,$leadership,$interest,$Hobbies;

    public function mount(){

         #Mount the basic information
         $this->fullname=auth()->guard('web')->user()->full_name;
         $this->phone=auth()->guard('web')->user()->phone_number;
         $this->email=auth()->guard('web')->user()->email;

       
         #check if there is anycred show yet first
         $CredshowStep1=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id])->first();
        
         
         $JsonData;

         if($CredshowStep1){
            
            #Handling Array
            if (is_array($CredshowStep1->credshow_step1)) {

                $JsonData =  $CredshowStep1->credshow_step1;
         
            }
            else {
                #Ensure CredshowStep1 is a JSON string
                $CheckData = json_decode($CredshowStep1->credshow_step1,true);
                $JsonData=$CheckData;
              
            }

            #Personal information
            $this->address=$JsonData['Personal Information']["address"];
            $this->socials = [
                'instagram' => $JsonData['Personal Information']['social']["instagram"],
                'behance' => $JsonData['Personal Information']['social']["behance"],
                'twitter' => $JsonData['Personal Information']['social']["twitter"],
                'github' => $JsonData['Personal Information']['social']["github"],
            ];
        
            #Background Education
            $this->schoolAttended=$JsonData['Educational Background']['school attended'];
            $this->degree=$JsonData['Educational Background']['degree'];
            $this->cgpa=$JsonData['Educational Background']['cgpa'];
            $this->coursework=$JsonData['Educational Background']['course work'];
            $this->academicproject=$JsonData['Educational Background']['academic project'];

           
        
            #work Experience
            $this->institution=$JsonData['Work Experience']['institution'];
            $this->position=$JsonData['Work Experience']['position'];
            $this->startdate=$JsonData['Work Experience']['start date'];
            $this->enddate=$JsonData['Work Experience']['end date'];
            $this->reponsiblity=$JsonData['Work Experience']['reponsibility'];
            $this->achievement=$JsonData['Work Experience']['achievement'];
            
        
            #certification
            $this->certification=[
                  'one'=>$JsonData['Certification']['certification']['one'],
                  'two'=>$JsonData['Certification']['certification']['two'],
            ];
            $this->certOrganization=[
                'one'=>$JsonData['Certification']['organization']['one'],
                'two'=>$JsonData['Certification']['organization']['two'],
            ];
            $this->yearOrganization=[
                'one'=>$JsonData['Certification']['year']['one'],
                'two'=>$JsonData['Certification']['year']['two'],
            ];

            
          
            #Honor and award 
            $this->honorTitle=[
                'one'=>$JsonData['Honor']['titles']['one'],
                'two'=>$JsonData['Honor']['titles']['two'],
                'three'=>$JsonData['Honor']['titles']['three']
            ];
        
            $this->honorFile=[
                'one'=>'',
                'two'=>'',
                'three'=>''
            ];
        
            #Activities
            $this->studentOrganization=$JsonData['Activities']['Oranganization'];
            $this->sportTeam=$JsonData['Activities']['Sport Team'];
            $this->conference=$JsonData['Activities']['Conference'];
            $this->studentClub=$JsonData['Activities']['Club'];

             
            #Volunteering
            $this->Volunteerorganization=$JsonData['Volunteer']['Volunteerorganization'];
            $this->VolunteerDuration=$JsonData['Volunteer']['VolunteerDuration'];
            $this->VolunteerCourseSupported=$JsonData['Volunteer']['VolunteerCourseSupported'];
            $this->VolunteerAccomplishment=$JsonData['Volunteer']['VolunteerAccomplishment'];
        
            #Additional
            $this->publications=$JsonData['Additional']['publications'];
            $this->leadership=$JsonData['Additional']['leadership'];
            $this->interest=$JsonData['Additional']['interest'];
            $this->Hobbies=$JsonData['Additional']['Hobbies'];

           
        
         }
        
         
    }


    #Credshow Step1
    public function Credshow1(){

        try{

                $personInfo=[
                    "fullname"=>$this->fullname,
                    "phone"=>$this->phone,
                    "email"=>$this->email,
                    "address"=>$this->address,
                    "social"=>$this->socials
                ];

                $background=[
                    "school attended"=>$this->schoolAttended,
                    "degree"=>$this->degree,
                    "cgpa"=>$this->cgpa,
                    "course work"=>$this->coursework,
                    "academic project"=>$this->academicproject
                ];

                $workExperience=[
                    "institution"=>$this->institution,
                    "position"=>$this->position,
                    "start date"=>$this->startdate,
                    "end date"=>$this->enddate,
                    "reponsibility"=>$this->reponsiblity,
                    "achievement"=>$this->achievement
                ];
            

                $certification=[
                    "certification"=>$this->certification,
                    "organization"=>$this->certOrganization,
                    "year"=>$this->yearOrganization
                ];

                
            $Activities=[
                "Oranganization"=>$this->studentOrganization,
                "Sport Team"=>$this->sportTeam,
                "Conference"=>$this->conference,
                "Club"=>$this->studentClub
            ];


            $Volunteer=[
                    "Volunteerorganization"=>$this->Volunteerorganization,
                    "VolunteerDuration"=>$this->VolunteerDuration,
                    "VolunteerCourseSupported"=>$this->VolunteerCourseSupported,
                    "VolunteerAccomplishment"=>$this->VolunteerAccomplishment
            ];

            $Additional=[
                "publications"=>$this->publications,
                "leadership"=>$this->leadership,
                "interest"=>$this->interest,
                "Hobbies"=>$this->Hobbies,
            ];

            #Handling file
            $fileUrls = [];

            $customMessages = [];

            foreach ($this->honorFile as $key => $files) {
                if (empty($files)) {
                    $fileUrls[$key] = "";
                    continue;
                }
            
                foreach ($files as $file) {
                    if ($file && $file->isValid()) {
                       
                        $mimeType = $file->getMimeType();
                        $fileExtension = $file->getClientOriginalExtension();
            
                        $fieldKey = 'honorFile.' . $key.'.*';
    
                        $customMessages[$fieldKey . '.mimes'] = "Honor file $key must be of file type: jpg, jpeg, png, pdf.";
                        $customMessages[$fieldKey . '.file'] = "Honor file $key must be a valid file.";

                        $this->validate([
                            $fieldKey => 'file|mimes:jpg,webp,jpeg,png,pdf|max:2048'
                        ], $customMessages);

                        $storedFile = $file->store('/', 'profile_photo');
                        $fileUrl = "https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/" . $storedFile;
            
                        $fileUrls[$key][] = $fileUrl;
                        
                    } else {
                        $this->addError('honorFile.' . $key, 'The file is not valid or not supported.');
                    }
                }
            }
            
                        
            $honor=[
                "titles"=>$this->honorTitle,
                'honorFile'=>$fileUrls,

            ];


        

                $credShow1=[
                    "Personal Information"=>$personInfo,
                    "Educational Background"=>$background,
                    "Work Experience"=>$workExperience,
                    "Certification"=>$certification,
                    "Activities"=>$Activities,
                    "Volunteer"=>$Volunteer,
                    "Additional"=>$Additional,
                    "Honor"=>$honor
                ];

                #handle empty credshow
                $emptyData=[
                    "data"=>""
                ];

                #Check if User information have being inserted previously
                $checkCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->first();

                if($checkCredShow){

                    $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
                        'user_id'=>auth()->guard('web')->user()->id,
                        'credshow_step1'=>json_encode($credShow1),
                        'credshow_step2'=>json_encode($emptyData),
                        'credshow_step3'=>json_encode($emptyData),
                        'credshow_step4'=>json_encode($emptyData),
                        'credshow_link'=>'',
                        'credshow_status'=>'pending',
                        'credshow_lasturl'=>'create-cred-show-step1',
                    ]);
                    if($updateCredShow){

                        return redirect('/create-cred-show-step2');
                    }

                }
                else{


                    #dd(json_encode($credShow1,true));

                    #Insert new credshow
                    $createCredShow=studentCredShow::create([
                        'user_id'=>auth()->guard('web')->user()->id,
                        'credshow_step1'=>json_encode($credShow1),
                        'credshow_step2'=>json_encode($emptyData),
                        'credshow_step3'=>json_encode($emptyData),
                        'credshow_step4'=>json_encode($emptyData),
                        'credshow_link'=>'',
                        'credshow_status'=>'pending',
                        'credshow_lasturl'=>'create-cred-show-step1',
                    ]);
                    if($createCredShow){

                        return redirect('/create-cred-show-step2'); 
                    }
                }
            }
            catch(\Throwable $g){
                #dd($g->getMessage());
                session()->flash('error',$g->getMessage());
            }

    }


    public function render()
    {
        return view('livewire.create-cred-show-step1');
    }
}
