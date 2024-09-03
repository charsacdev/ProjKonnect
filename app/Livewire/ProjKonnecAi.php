<?php

namespace App\Livewire;

use Livewire\Component;
use Google\Auth\CredentialsLoader;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use App\Models\ProjkonnectAiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProjKonnecAi extends Component
{
    public $generatedContent;

    public $textReqeust,$chats,$url,$chatChains;

    public function mount(){

        $url = URL::current(); 
        $segments = explode("/",$url);

        $userId = auth()->guard('web')->user()->id;

        // Fetch all records and group them by `chat_url`
        $this->chatChains = ProjkonnectAiModel::where(['user_id'=>$userId,'chat_user'=>'user'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('chat_url');

     
        if(isset($segments[4])){

            $this->url=$segments[4];
            
             #Load Message
             $this->ShowMessage();
        }
    }


    #Show Message
    public function ShowMessage(){
          #Select Chat History
          $urlChat=$this->url;
          $this->chats=ProjkonnectAiModel::where(['chat_url'=>$urlChat])->get();

    }


    #New Chat
    public function NewChat(){
        $randomString = Str::random(30);
        
        $newChat=ProjkonnectAiModel::create([
            'user_id'=>auth()->guard('web')->user()->id,
            'chat_url'=>$randomString,
            'chat_user'=>"ai",
            'message'=>"Hello! 👋 What can I do for you today? 😊"
        ]);
        if($newChat){
            return redirect("/student-ai/".$newChat->chat_url);
        }
    }
    

    public function generateContent(){
        
        try {

            #New Direct Message
            if($this->url===null){
                $randomString = Str::random(30);
        
                $newChat=ProjkonnectAiModel::create([
                    'user_id'=>auth()->guard('web')->user()->id,
                    'chat_url'=>$randomString,
                    'chat_user'=>"user",
                    'message'=>$this->textReqeust
                ]);
                if($newChat){
                    return redirect("/student-ai/".$newChat->chat_url);
                }
            }

            #Inser User Message
            $newChat=ProjkonnectAiModel::insert([
                'user_id'=>auth()->guard('web')->user()->id,
                'chat_url'=>$this->url,
                'chat_user'=>"user",
                'message'=>$this->textReqeust
            ]);
           

            #Continue with Request
            $requestBody = [
                "contents" => [
                    [
                        "role" => "user",
                        "parts" => [
                            [
                                "text" => $this->textReqeust,
                            ]
                        ]
                    ]
                ],
                "systemInstruction" => [
                    "parts" => [
                        [
                            "text" => "Your instructional text here."
                        ],
                    ]
                ],
                "generationConfig" => [
                    "maxOutputTokens" => 8192,
                    "temperature" => 1,
                    "topP" => 0.95,
                ],
                "safetySettings" => [
                    [
                        "category" => "HARM_CATEGORY_HATE_SPEECH",
                        "threshold" => "BLOCK_MEDIUM_AND_ABOVE"
                    ],
                ],
            ];

             #Load the Google Cloud credentials and get the access token
             $credentials = CredentialsLoader::makeCredentials(
                ['https://www.googleapis.com/auth/cloud-platform'],
                json_decode(file_get_contents(base_path('storage/app/keys/service-account-key.json')), true)
            );
           
            $token = $credentials->fetchAuthToken()['access_token'];


            $PROJECT_ID="noted-acronym-433111-i2";
            $LOCATION_ID="us-central1";
            $API_ENDPOINT="us-central1-aiplatform.googleapis.com";
            $MODEL_ID="gemini-1.5-flash-001";
    
            // Google Cloud API Endpoint and Authentication
            $endpoint = "https://$API_ENDPOINT/v1/projects/$PROJECT_ID/locations/$LOCATION_ID/publishers/google/models/$MODEL_ID:streamGenerateContent";
           

            // Send the POST request to the API
            $response = Http::withToken(trim($token))
                ->withOptions(['verify' => false])
                ->post($endpoint, $requestBody);
                
            if ($response->successful()) {
                $this->generatedContent = $response->json();

               $messageReply=[];
                #Inser Ai Message
                foreach($this->generatedContent as $candidate){
                    foreach($candidate['candidates'] as $content){
                        foreach($content['content']['parts'] as $part){
                    
                            $messageReply[]=$part['text'];
                        }
                       
                    }
                    
                }

                #Combine all array elements into a single string
                $combinedText = implode("", $messageReply);

                #Replace Character with bold
                $combinedText = str_replace('**', '', $combinedText);

                #Replace all newline characters with <br> tags
                $formattedText = nl2br($combinedText);

                #Trim leading and trailing spaces
                $formattedText = trim($formattedText);

                                  
                $newChatAi=ProjkonnectAiModel::insert([
                    'user_id'=>auth()->guard('web')->user()->id,
                    'chat_url'=>$this->url,
                    'chat_user'=>"ai",
                    'message'=>$formattedText
                ]);

                $this->ShowMessage();
                $this->textReqeust="";
               
            } 
            else {
                $this->generatedContent = 'Failed to generate content.';
            }
        }
        catch (\Exception $e) {
            #$this->generatedContent = 'Error occurred: ' . $e->getMessage();
            dd($e->getMessage());
            
        }
        
    }
    
    public function render()
    {
        return view('livewire.proj-konnec-ai');
    }
}
