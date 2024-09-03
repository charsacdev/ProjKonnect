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
use App\Models\studentCredShow;
use Livewire\WithFileUploads;

class CreateCredShowStep4 extends Component
{
    use  WithFileUploads;

    #File Upload
    public $videoFile;

     #public variables for mounts
     public $AgoraSdk,$projectName,$channel;

    #initiate argora 
    public function mount(){

        try{
            #Rerouting
            $CredshowRoute=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id])->first();
            $Routing=$CredshowRoute->credshow_lasturl;
            if($CredshowRoute->credshow_status==="pending"){
                return redirect("/".$Routing);
            }

            $this->projectName='ProjKonnect'.Str::random(10);
            $this->channel='Prj'.Str::random(7);
            
            $apiKey = env('AGORA_KEY');
            $apiSecret = env('AGORA_SECRET');

            #URL for creating a new project
            $url = 'https://api.agora.io/dev/v1/project';

            #Data for the new project
            $data = [
                'name' => $this->projectName,
                'enable_sign_key' => true
            ];


            $response = Http::withBasicAuth($apiKey, $apiSecret)
                    ->withOptions([
                        'verify' => false,
                    ])->post($url, $data);

            #Check the response status and handle accordingly
            if ($response->successful()===true) {
            
                $responseData = $response->json();
                #token builder
                $appID = $responseData['project']['vendor_key'];
                $appCertificate = $responseData['project']['sign_key'];
                $expiresInSeconds = (2 * 60 * 60);
                $channelName = $this->channel;
                $uid = 0;
                $role = RtcTokenBuilder2::ROLE_PUBLISHER;

                $token = RtcTokenBuilder2::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $expiresInSeconds);
            
                $ArgoraDetails=[
                    'project name'=>$this->projectName,
                    'meeting name'=>$channelName,
                    'meeting id'=>$responseData['project']['id'],
                    'app id'=>$appID,
                    'app certificate'=>$appCertificate,
                    'token'=>$token,
                ];

                #dd(json_encode($credShow4));

                $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
                    'user_id'=>auth()->guard('web')->user()->id,
                    'credshow_step4'=>json_encode($ArgoraDetails),
                    'credshow_link'=>env('URL_LINK')."/"."credshow"."/".base64_encode(auth()->guard('web')->user()->email),
                    'credshow_status'=>'active',
                    'credshow_lasturl'=>'create-cred-show-step4',
                ]);
                
            }

        }
        catch(\Throwable $g){
            #dd($g->getMessage());
            session()->flash('error',"Network Error please try again");
        }

        #Select the Agora details
        $CredshowStep1=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id])->first();
        $this->AgoraSdk=$CredshowStep1->credshow_step4;
        #dd($AgoroSdk);
            
    }


    #Save the File Name
    public function Credshow4(Request $request){
        try{
                $fileName = $request->input('fileName');

                #Get Json Data
                $credshowJsonData=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->first();
                $data = $credshowJsonData->credshow_step4;

                $data['videolink']="https://myprojkonnect-s3bucket.s3.amazonaws.com/agora_records/".$fileName;


                $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
                    'user_id'=>auth()->guard('web')->user()->id,
                    'credshow_step4'=>json_encode($data),
                    'credshow_link'=>env('URL_LINK')."/"."credshow"."/".base64_encode(auth()->guard('web')->user()->email),
                    'credshow_status'=>'active',
                    'credshow_lasturl'=>'create-cred-show-step4',
                ]);
                if($updateCredShow){
                    #return redirect('/create-cred-show-final');
                    return response()->json(['message' => 'File name saved successfully'.$fileName]);
                }

        }
        catch(\Throwable $g){
            dd($g->getMessage());
            #session()->flash('error',"Network Error please try again");
        }

        
    }



    #CredShow Via FileUpload
    public function Credshow4UploadFile(){
        try{
             if(!$this->videoFile==null){
          
                $this->validate([
                    'videoFile' => 'file|mimes:mp4,webm,mp3,mkv|max:10240'
                ]);

                $fileurl=$this->videoFile->store('/','agora_records');
                $awsurl="https://myprojkonnect-s3bucket.s3.amazonaws.com/agora_records/".$fileurl;

                #Get Json Data
                $credshowJsonData=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->first();
                $data = $credshowJsonData->credshow_step4;

                $data['videolink']=$awsurl;

                $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
                    'user_id'=>auth()->guard('web')->user()->id,
                    'credshow_step4'=>json_encode($data),
                    'credshow_link'=>env('URL_LINK')."/"."credshow"."/".base64_encode(auth()->guard('web')->user()->email),
                    'credshow_status'=>'active',
                    'credshow_lasturl'=>'create-cred-show-step4',
                ]);
                if($updateCredShow){

                    return redirect('/create-cred-show-final');
                }  
            }
            else{
                 
                 #Get Json Data
                 $credshowJsonData=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->first();
                 #dd($credshowJsonData);
                 $data = $credshowJsonData->credshow_step4;
 
                 $data['videolink'];
 
                 $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
                     'user_id'=>auth()->guard('web')->user()->id,
                     'credshow_step4'=>json_encode($data),
                     'credshow_link'=>env('URL_LINK')."/"."credshow"."/".base64_encode(auth()->guard('web')->user()->email),
                     'credshow_status'=>'active',
                     'credshow_lasturl'=>'create-cred-show-step4',
                 ]);
                  #No file Uploaded 
                  return redirect('/create-cred-show-final');
            }
        }
        catch(\Throwable $g){
            dd($g->getMessage());
            #session()->flash('error',"Network Error please try again");
        }
        
    }


    public function render()
    {
        return view('livewire.create-cred-show-step4');
    }
}
