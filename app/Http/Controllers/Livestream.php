<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TomatoPHP\Agora\Services\AgoraService;
use Illuminate\Support\Facades\Storage;

class Livestream extends Controller
{
    protected $agora;


    #Start Agora services
    public function __construct(AgoraService $agora){
        $this->agora = $agora;
    }

 

    #create a channel
    public function createChannel(Request $request)
    {
        $channelName = $request->input('channel_name');
        $channel = $this->agora->createChannel($channelName);
        $token = $this->agora->generateToken($channelName);

        // Generate join link
        $joinLink = url('/join-channel') . '?channel_name=' . $channelName . '&token=' . $token;

        return response()->json(['channel' => $channel,'link'=>$joinLink]);
    }


    #start recording the session
    public function startRecording(Request $request){
        $channelName = $request->input('channel_name');
        $uid = $request->input('uid');
        
        // Acquire resource ID
        $resourceResponse = $this->agora->acquire($channelName, $uid);
        $resourceId = $resourceResponse['resourceId'];
        
        // Start recording
        $recordingResponse = $this->agora->startRecording($channelName, $uid, $resourceId);
        $sid = $recordingResponse['sid'];
        
        return response()->json([
            'resourceId' => $resourceId,
            'sid' => $sid
        ]);
}

    #save recording
    public function stopRecording(Request $request){
        
            $channelName = $request->input('channel_name');
            $uid = $request->input('uid');
            $resourceId = $request->input('resource_id');
            $sid = $request->input('sid');
            
            // Stop recording
            $stopResponse = $this->agora->stopRecording($channelName, $uid, $resourceId, $sid);
            
            // Assuming stopResponse contains 'fileList' with file URLs
            $recordingFileUrl = $stopResponse['serverResponse']['fileList'][0]['filePath'];
            
            // Download and save the recording file to S3
            $contents = file_get_contents($recordingFileUrl);
            $path = 'recordings/' . basename($recordingFileUrl);
            Storage::disk('s3')->put($path, $contents);
            
            return response()->json(['path' => Storage::disk('s3')->url($path)]);
     }


    #start livestream
    public function startLivestream(Request $request)
    {
        $channelName = $request->input('channel_name');
        $livestream = $this->agora->startLivestream($channelName);
        return response()->json(['livestream' => $livestream]);
    }

    #start screen
    public function shareScreen(Request $request)
    {
        $channelName = $request->input('channel_name');
        $screenShareToken = $this->agora->generateToken($channelName, true);
        return response()->json(['screenShareToken' => $screenShareToken]);
    }
}
