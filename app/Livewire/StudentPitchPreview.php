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
use App\Models\studentPitchModel;
use Livewire\WithFileUploads;

class StudentPitchPreview extends Component
{
    use  WithFileUploads;

      #Define all form fields
      public $title,$categoryTags,$description,$collaborativeInvites,$elevatorPitch,$problemStatement,$solutionOverview,$targetAudience,$keyFeatures,$benefitsImpacts,$marketResearch,$competitiveAnalysis,$implementationPlan,$partnerships,$scalabilityPlan,$reviewerHelp,$additionalComments,$pocFiles,$attachments = [''];
  
      #Files Variables
      public $pocDetailFile,$AttachmentsDetailsFile;

      #Pitch Status
      public $pitchStatus = 'pending',$pitchUrlstatus;

      #Edit Details
      public $details,$Id;

      #Preview Details
      public $profilephoto;


      #Mount
      public function mount(){


            $url = URL::current(); 
            $segments = explode("/",$url);

           
            if(isset($segments[5])){
                try {
                    $userEmail=base64_decode($segments[5]);
                    
                    $userInfo=UsersTables::where(['email'=>$userEmail])->first();
                    if($userInfo){

                       
                        $userId=$userInfo->id;
                        $this->Id=base64_decode($segments[4]);
                        $this->details=studentPitchModel::where(['id'=>$this->Id,'user_id'=>$userId])->first();
                       
                        $this->profilephoto=$userInfo->profile_image;
                        $this->pitchUrlstatus=$this->details->pitch_status;
                        
                        $data=json_decode($this->details->pitch_details,true);

                        $this->AttachmentsDetailsFile =$data['attachments'];

                        #dd($data);
                    }
                    else{
    
                        return redirect('/');
                    }
              } 
              catch (\Illuminate\Database\QueryException $e) {
                return redirect('/');
            }
                
            }
            else {
                
                $this->Id=base64_decode($segments[4]);

                $this->details=studentPitchModel::where(['id'=>$this->Id,'user_id'=>auth()->guard('web')->user()->id])->first();
          
                $this->pitchUrlstatus=$this->details->pitch_status;
                
                $data=json_decode($this->details->pitch_details,true);

                $this->AttachmentsDetailsFile =$data['attachments'];
    
            }

           

            $this->title=$data['title'];
            $this->categoryTags=$data['categoryTags'];
            $this->description=$data['description'];
            $this->collaborativeInvites=$data['collaborativeInvites'];
            $this->elevatorPitch=$data['elevatorPitch'];
            $this->problemStatement=$data['problemStatement'];
            $this->solutionOverview=$data['solutionOverview'];
            $this->targetAudience=$data['targetAudience'];
            $this->keyFeatures=$data['keyFeatures'];
            $this->benefitsImpacts=$data['benefitsImpacts'];
            $this->marketResearch=$data['marketResearch'];
            $this->competitiveAnalysis=$data['competitiveAnalysis'];
            $this->implementationPlan=$data['implementationPlan'];
            $this->partnerships=$data['partnerships'];
            $this->scalabilityPlan=$data['scalabilityPlan'];
            $this->reviewerHelp=$data['reviewerHelp'];
            $this->additionalComments=$data['additionalComments'];
            $this->pocDetailFile=$data['pocFiles'];
            

  
        }

      #Method to add a new attachment input
      public function addAttachment(){

          $this->attachments[] = null;
      }
  
      #Method to remove an attachment input
      public function removeAttachment($index)
      {
          unset($this->attachments[$index]);
          $this->attachments = array_values($this->attachments); #Reindex array
      }
  
      #Method to handle form submission
      public function CreatePitch(){

        #Validate all inputs
        $this->validate([
            'title' => 'required|string|max:255',
            'categoryTags' => 'required|string|max:255',
            'description' => 'required|string',
            'collaborativeInvites' => 'nullable|string|max:255',
            'elevatorPitch' => 'required|string',
            'problemStatement' => 'required|string',
            'solutionOverview' => 'required|string',
            'targetAudience' => 'required|string',
            'keyFeatures' => 'required|string',
            'benefitsImpacts' => 'required|string',
            'marketResearch' => 'required|string',
            'competitiveAnalysis' => 'required|string',
            'implementationPlan' => 'required|string',
            'partnerships' => 'required|string',
            'scalabilityPlan' => 'required|string',
            'reviewerHelp' => 'required|string',
            'additionalComments' => 'required|string',
            'pocFiles' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'attachments.*' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ], [
            'title.required' => 'The pitch title is required.',
            'categoryTags.required' => 'The category/industry tags are required.',
            'description.required' => 'The description is required.',
            'elevatorPitch.required' => 'A brief elevator pitch is required.',
            'problemStatement.required' => 'The problem statement is required.',
            'solutionOverview.required' => 'The solution overview is required.',
            'targetAudience.required' => 'The target audience or market segment is required.',
            'keyFeatures.required' => 'The key features are required.',
            'benefitsImpacts.required' => 'The benefits/impacts are required.',
            'marketResearch.required' => 'Market research or trends are required.',
            'competitiveAnalysis.required' => 'The competitive analysis is required.',
            'implementationPlan.required' => 'The plan for implementation is required.',
            'partnerships.required' => 'Partnerships or collaborations are required.',
            'scalabilityPlan.required' => 'The scalability plan is required.',
            'reviewerHelp.required' => 'Details on how the reviewer can help are required.',
            'additionalComments.required' => 'Additional comments or information are required.',
            'pocFiles.mimes' => 'Proof of Concept files must be in pdf, doc, or docx format.',
            'pocFiles.max' => 'Proof of Concept files may not be greater than 10MB.',
            'attachments.*.mimes' => 'Each attachment must be in pdf, doc, or docx format.',
            'attachments.*.max' => 'Each attachment may not be greater than 10MB.',
            
        ]);
        


        try{

            #Handle Proof of Concept file uploads
            if(!$this->pocFiles==null){

                $this->validate([
                    'pocFiles' => 'required|file|mimes:pdf,doc,docx|max:10240',
                ],[
                    'pocFiles.required' => 'Proof of Concept files are required.',
                    'pocFiles.mimes' => 'Proof of Concept files must be in pdf, doc, or docx format.',
                    'pocFiles.max' => 'Proof of Concept files may not be greater than 10MB.',
                ]);

                $pocFileUrls;
                $storedFile = $this->pocFiles->store('/', 'profile_photo');
                $pocFileUrls= "https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/" . $storedFile;
            
            }
            else{
                $pocFileUrls=$this->pocDetailFile;
            }
            
           
            #Handle attachment file uploads
            $attachmentUrls = [];
            foreach ($this->attachments as $file) {
                if ($file and !empty($file)) {

                    $this->validate([
                        'attachments.*' => 'required|file|mimes:pdf,doc,docx|max:10240',
                    ], [
                        'attachments.*.mimes' => 'Each attachment must be in pdf, doc, or docx format.',
                        'attachments.*.max' => 'Each attachment may not be greater than 10MB.',
                    ]);

                    $storedFile = $file->store('/', 'profile_photo');
                    $attachmentUrls= "https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/" . $storedFile;
                }
                else{
                    $attachmentUrls = $this->AttachmentsDetailsFile;
                }
            }
    
            #Prepare pitch details
            $pitchDetails = [
                'title' => $this->title,
                'categoryTags' => $this->categoryTags,
                'description' => $this->description,
                'collaborativeInvites' => $this->collaborativeInvites,
                'elevatorPitch' => $this->elevatorPitch,
                'problemStatement' => $this->problemStatement,
                'solutionOverview' => $this->solutionOverview,
                'targetAudience' => $this->targetAudience,
                'keyFeatures' => $this->keyFeatures,
                'benefitsImpacts' => $this->benefitsImpacts,
                'marketResearch' => $this->marketResearch,
                'competitiveAnalysis' => $this->competitiveAnalysis,
                'implementationPlan' => $this->implementationPlan,
                'partnerships' => $this->partnerships,
                'scalabilityPlan' => $this->scalabilityPlan,
                'reviewerHelp' => $this->reviewerHelp,
                'additionalComments' => $this->additionalComments,
                'pocFiles' => $pocFileUrls,
                'attachments' => $attachmentUrls,
            ];

                #Save pitch to the database
                $pitch=studentPitchModel::where(['id'=>$this->Id,'user_id'=>auth()->guard('web')->user()->id])->update([
                    'user_id' => auth()->guard('web')->user()->id,
                    'pitch_details' => json_encode($pitchDetails),
                    'pitch_status' => $this->pitchStatus,
                ]);

                if($pitch){
                    if($this->pitchStatus==='live'){
                        session()->flash('success','Pitch updated successfully');
                        return redirect('/student-pitch');
                    } 
                    else{
                        session()->flash('success','Pitch saved as draft successfully');
                        return redirect('/student-pitch');
                    }
                    
                    
                }
            }
            catch(\Throwable $g){
                #dd($g->getMessage());
                #session()->flash('error',"Network Error please try again");
            }
        }

        #Publish Pitch
        public function publishPitch(){
            $this->pitchStatus = 'live';
            $this->CreatePitch();
        }
        
        #Save as Draft
        public function saveAsDraft(){
            $this->pitchStatus = 'pending';
            $this->CreatePitch();
        }


    public function render()
    {
        return view('livewire.student-pitch-preview');
    }
}
