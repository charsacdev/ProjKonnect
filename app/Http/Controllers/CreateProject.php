<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use BoogieFromZk\AgoraToken\ChatTokenBuilder2;
use BoogieFromZk\AgoraToken\RtcTokenBuilder2;

class CreateProject extends Controller
{

    #create project
    public function createProject(){

        $apiKey = env('AGORA_KEY');
        $apiSecret = env('AGORA_SECRET');

        #URL for creating a new project
        $url = 'https://api.agora.io/dev/v1/project';

        #Data for the new project
        $data = [
            'name' => 'Projecter',
            'enable_sign_key' => true
        ];

        $response = Http::withBasicAuth($apiKey, $apiSecret)
                ->withOptions([
                    'verify' => false,
                ])->post($url, $data);

                return response()->json(['success'=>$response->successful()]);

        #Check the response status and handle accordingly
        if ($response->successful()) {
            $responseData = $response->json();

            #token builder
            $appID = $responseData['project']['vendor_key'];
            $appCertificate = $responseData['project']['sign_key'];
            $expiresInSeconds = 3600;
            $channelName = "Testing";
            $uid = 0;
            $role = RtcTokenBuilder2::ROLE_PUBLISHER;
            
            $token = RtcTokenBuilder2::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $expiresInSeconds);
            
            
            return response()->json(['success' => true, 'project' => $responseData,'token'=>$token]);

        } 
        else {
            return response()->json(['success' => false, 'error' => $response->json()], $response->status());
        }
    }
}
