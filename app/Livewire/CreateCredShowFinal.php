<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use BoogieFromZk\AgoraToken\ChatTokenBuilder2;
use BoogieFromZk\AgoraToken\RtcTokenBuilder2;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\UsersTables;
use App\Models\studentCredShow;

class CreateCredShowFinal extends Component
{
    #=====================CRED SHOW 1 PUBLIC==============#
    #Personal Information
    public $profilephoto,$fullname,$phone,$email,$address,$socials = [
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


    #=================CRED SHOW 2 PUBLIC================#
    public $skills = [];

    #==========CRED SHOW 3 PUBLIC===========#
    public $projects=[];

    #=========CRED SHOW 4 PUBLIC and CRED SHOW LINK=========#
    public $pitchvideo, $credshowLink;




    public function mount(){

        $url = URL::current(); 
        $segments = explode("/",$url);

        #dd($segments['4']);
        if(isset($segments[4])){
            try {
                $userEmail=base64_decode($segments[4]);
                
                $userInfo=UsersTables::where(['email'=>$userEmail])->first();
                if($userInfo){
                    
                    $userId=$userInfo->id;
                }
                else{

                    return redirect('/');
                }
          } 
          catch (\Illuminate\Database\QueryException $e) {
            return redirect('/');
        }
            
        }

        else{
            $userId=auth()->guard('web')->user()->id;
        }
        

         #check if there is any credshow yet first
        $CredshowStep=studentCredShow::where(['user_id'=>$userId,'credshow_status'=>'active'])->first();
        if($CredshowStep){
                    
            $JsonData =  json_decode($CredshowStep,true);
        }
        else{

            return redirect('/');
        }
         

        

        #==================CRED SHOW STEP1============#
        #Personal information
        $this->profilephoto=UsersTables::where('id',$userId)->first()->profile_image;
        $this->fullname=$JsonData['credshow_step1']['Personal Information']["fullname"];
        $this->phone=$JsonData['credshow_step1']['Personal Information']["phone"];
        $this->email=$JsonData['credshow_step1']['Personal Information']["email"];
        $this->address=$JsonData['credshow_step1']['Personal Information']["address"];
        $this->socials = [
            'instagram' => $JsonData['credshow_step1']['Personal Information']['social']["instagram"],
            'behance' => $JsonData['credshow_step1']['Personal Information']['social']["behance"],
            'twitter' => $JsonData['credshow_step1']['Personal Information']['social']["twitter"],
            'github' => $JsonData['credshow_step1']['Personal Information']['social']["github"],
        ];
    
        #Background Education
        $this->schoolAttended=$JsonData['credshow_step1']['Educational Background']['school attended'];
        $this->degree=$JsonData['credshow_step1']['Educational Background']['degree'];
        $this->cgpa=$JsonData['credshow_step1']['Educational Background']['cgpa'];
        $this->coursework=$JsonData['credshow_step1']['Educational Background']['course work'];
        $this->academicproject=$JsonData['credshow_step1']['Educational Background']['academic project'];

       
    
        #work Experience
        $this->institution=$JsonData['credshow_step1']['Work Experience']['institution'];
        $this->position=$JsonData['credshow_step1']['Work Experience']['position'];
        $this->startdate=$JsonData['credshow_step1']['Work Experience']['start date'];
        $this->enddate=$JsonData['credshow_step1']['Work Experience']['end date'];
        $this->reponsiblity=$JsonData['credshow_step1']['Work Experience']['reponsibility'];
        $this->achievement=$JsonData['credshow_step1']['Work Experience']['achievement'];
        
    
        #certification
        $this->certification=[
              'one'=>$JsonData['credshow_step1']['Certification']['certification']['one'],
              'two'=>$JsonData['credshow_step1']['Certification']['certification']['two'],
        ];
        $this->certOrganization=[
            'one'=>$JsonData['credshow_step1']['Certification']['organization']['one'],
            'two'=>$JsonData['credshow_step1']['Certification']['organization']['two'],
        ];
        $this->yearOrganization=[
            'one'=>$JsonData['credshow_step1']['Certification']['year']['one'],
            'two'=>$JsonData['credshow_step1']['Certification']['year']['two'],
        ];

        #Honor and award 
        $this->honorTitle=[
            'one'=>$JsonData['credshow_step1']['Honor']['titles']['one'],
            'two'=>$JsonData['credshow_step1']['Honor']['titles']['two'],
            'three'=>$JsonData['credshow_step1']['Honor']['titles']['three']
        ];
    
        $this->honorFile=[
            'one'=>$JsonData['credshow_step1']['Honor']['honorFile']['one'],
            'two'=>$JsonData['credshow_step1']['Honor']['honorFile']['one'],
            'three'=>$JsonData['credshow_step1']['Honor']['honorFile']['one']
        ];

        #Activities
        $this->studentOrganization=$JsonData['credshow_step1']['Activities']['Oranganization'];
        $this->sportTeam=$JsonData['credshow_step1']['Activities']['Sport Team'];
        $this->conference=$JsonData['credshow_step1']['Activities']['Conference'];
        $this->studentClub=$JsonData['credshow_step1']['Activities']['Club'];

         
        #Volunteering
        $this->Volunteerorganization=$JsonData['credshow_step1']['Volunteer']['Volunteerorganization'];
        $this->VolunteerDuration=$JsonData['credshow_step1']['Volunteer']['VolunteerDuration'];
        $this->VolunteerCourseSupported=$JsonData['credshow_step1']['Volunteer']['VolunteerCourseSupported'];
        $this->VolunteerAccomplishment=$JsonData['credshow_step1']['Volunteer']['VolunteerAccomplishment'];
    
        #Additional
        $this->publications=$JsonData['credshow_step1']['Additional']['publications'];
        $this->leadership=$JsonData['credshow_step1']['Additional']['leadership'];
        $this->interest=$JsonData['credshow_step1']['Additional']['interest'];
        $this->Hobbies=$JsonData['credshow_step1']['Additional']['Hobbies'];


        #======================SKILLS CRED SHOW 2,3,4==========#
        $this->skills=$JsonData['credshow_step2'];

        $this->projects=$JsonData['credshow_step3'];

        $this->pitchvideo=$JsonData['credshow_step4'];

        $this->credshowLink=$JsonData['credshow_link'];

        #dd($this->pitchvideo['videolink']);
        

    }

    public function render()
    {
        return view('livewire.create-cred-show-final');
    }
}
