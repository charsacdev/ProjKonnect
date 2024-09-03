<div>
  <div class="page-wrapper">
      <div class="container-fluid">
          <div class="row">
             
              <div class="col-lg-12 main">
                  
                  <div class="container-fluid px-4"> 
                      <div class="main-header">
                          <div class="d-flex align-items-start gap-3">
                              <h1 class="heading">LiveLearn Session</h1>
                          </div>
                         
                      </div>
                      <!--dashboard yield-->
                      <div class="">
                          <div class="main-content">
                              <div class="row" style="position: relative;">
                                <div class="col-12 d-xl-none text-end mb-3">
                                    <div id="lsc-menu-icon">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </div>
                                </div>
                                   <div wire:ignore class="col-xl-9 mb-4" style="overflow: auto">
                                       <div class="row" id="session-video-container" style="position:relative;object-fit:contain">
                                             <div class="col-sm-12" >
                                                  <div  class="proguide" id="full-screen-video" style="position:relative;object-fit:contain">
                                                       <img src="{{$meetingDetails->meeting_banner}}" alt="user image">
                                                       <span class="session-participant float-end">{{auth()->guard('web')->user()->full_name}} ({{auth()->guard('web')->user()->user_type}})</span>
                                                  </div>
                                             </div>
                                             <!--show small icon of the proguide-->
                                             <div id="local-video-container" style="position: absolute;bottom:0;right:0;border:0px solid green">
                                              <div id="local-video" style="height:100px;width:100px;border:0px solid green;float:right"></div>
                                            </div>
                                       </div>
                                       <div id="inter-controls" class="session-controls mt-4" style="visibility:hidden">
                                            <button id="video-duration">
                                                <img src="{{asset('student-asset/asset/img/recording-img.png')}}" alt="icon">
                                                <span id="timer">00:00</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-between center-control">
                                                <button class="interv-btn bg-orangered" id="mic-toggle">
                                                  <i class="bi bi-mic-fill btn-mic text-light"></i>
                                                </button>
                                                <button class="interv-btn bg-orangered" id="video-toggle">
                                                  <i class="bi bi-camera-video btn-vid text-light"></i>
                                                </button>
                                                <button class="interv-btn" id="screen-share">
                                                    <img src="{{asset('student-asset/asset/img/export-icon.png')}}" alt="icon">
                                                </button>
                                            </div>
                                            <button wire:click="LeaveMeeting()" class="interv-btn-end" id="leave-channel">End</button>
                                        </div>
                                        <h2 class="g-sm-heading mt-4 mb-3 mt-5">{{$meeting_title}}</h2>
                                        <div class="chapter border p-3 rounded mb-2 op-6">
                                            <h2 class="g-sm-heading">{{$meeting_title}}</h2>
                                            <p class="mb-0 pb-0">
                                               {{$meeting_description}}
                                            </p>
                                        </div>
                                       
                                   </div>
                      
                                   <!--participants meeting-->
                                   <div class="col-xl-3 mb-4" id="lsc-sidebar-ctn">
                                      <div class="d-xl-none" id="close-lsc">
                                          <i class="fa fa-times-circle"></i>
                                      </div>
                                      <div class="lsc-sidebar">
                                          <div class="lsc-header">
                                              <div class="d-flex align-items-center justify-content-between">
                                                  <h5 class="g-sm-heading">Participants ({{count($participant)}})</h5>
                                                  <h5 class="g-sm-heading d-none">View participants <i class="fa fa-chevron-right"></i></h5>
                                              </div>
                                              @foreach($participant as $students)
                                              <div class="lsc-participant">
                                                  <div class="d-flex align-items-center justify-content-between">
                                                      <div class="d-flex align-items-center justify-content-start gap-2">
                                                          <div class="pt-img">
                                                              @if(empty($students->student->profile_image))
                                                              <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="Image">
                                                              @else
                                                              <img src="{{$students->student->profile_image}}" alt="Image">
                                                              @endif
                                                          </div>
                                                          <h6>{{$students->student->full_name}} <span class="op-6"></span></h6>
                                                      </div>
                                                      <div class="d-flex align-items-center justify-content-between gap-2">
                                                          @if($students->meeting_status=="active")
                                                          <img src="{{asset('student-asset/asset/img/microphone-2-colored.png')}}" class="cursor-p" id="unslash-mic" alt="icon">
                                                          @else
                                                          <img src="{{asset('student-asset/asset/img/microphone-slash.png')}}" id="slash-mic" class="cursor-p" alt="icon">
                                                          @endif
                                                          <img src="{{asset('student-asset/asset/img/camera-icon-colored.png')}}" alt="icon">
                                                      </div>
                                                  </div>
                                          </div>
                                     @endforeach
                                </div>

                                <!--Live Session Meetings--->
                                <div class="lsc-body">
                                  <div class="lsc-body-header">
                                      <h5 class="g-sm-heading mb-0">Chats</h5>
                                  </div>
                                  <div id="session-chat-ctn">
                                    @foreach($ChatsMessage as $chats)
                                    
                                      <div class="lsc-chat w-100 mb-0">
                                          <div class="d-flex align-items-start justify-content-start gap-3">
                                              <div class="img">
                                                 @if(empty($chats->user->profile_image))
                                                   <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="Image">
                                                 @else
                                                   <img src="{{$chats->user->profile_image}}" alt="Image">
                                                 @endif
                                                </div>
                                              <div class="chat-message">
                                                  <span class="user op-6">{{$chats->user->full_name}}</span>
                                                  @if(isset($chats->files))
                                                    <div class="{{ $chats->sender_id == auth()->guard('web')->user()->id ? 'sent-ctn' : 'received-ctn' }}" >
                                                        <div class="{{ $chats->sender_id == auth()->guard('web')->user()->id ? 'sent' : 'received' }}">
                                                              <!--hanlde the file--> 
                                                              @if(in_array($chats->file_type, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                                                <img src="{{$chats->files}}" alt="icon" class="img-fluid" style="width:100%;height:150px">
                                                              @else
                                                              <a href="{{$chats->files}}" download target="_blank">
                                                                  <p>
                                                                    <i class="fa fa-file"></i>&nbsp;Document.{{$chats->file_type}}
                                                                    <br>
                                                                    {{round($chats->file_size/(1024 * 1024), 2)}}MB <i class="fa fa-download"></i>
                            
                                                                  </p>
                                                              </a>
                                                              @endif
                                                              <div class="d-flex align-items-center justify-content-end gap-1">
                                                                  <small>{{$chats->created_at->diffForHumans()}}</small>
                                                                  <img src="{{asset('proguide-asset/asset/img/message-seen-icon.png')}}" alt="icon">
                                                              </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                     <h6>{{$chats->message}}</h6>
                                                  @endif
                                              </div>
                                          </div>
                                        </div>
                                        <div class="float-end mb-2">
                                           <span class="time text-muted">{{$chats->created_at->diffForHumans()}}</span>
                                        </div>
                                      @endforeach
                                     
                                  </div>
                              </div>
                              <div class="lsc-footer">
                                  <form id="lsc-form" wire:submit.prevent="sendMessage">
                                      <textarea wire:model="message"  placeholder="Type something..." id="" cols="16" style="resize:none;outline:0px;text-indent:5px;border-radius:9px;border:1px solid gray"></textarea>
                                    </form>
                                        <div class="d-flex align-items-center justify-content-between gap-0">
                                            <label class="img mx-1">
                                                <input type="file" id="attachment" class="d-none" wire:model="file">
                                                <img src="{{asset('student-asset/asset/img/link-icon.png')}}" alt="icon"> 
                                            </label>
                                            <label  class="img " id="lsc-form-btn" for="sendChatBtn">
                                              <img src="{{asset('student-asset/asset/img/paper-plane.png')}}" alt="icon">
                                              <button style="margin-left:-3px" id="sendChatBtn" wire:loading.attr='disabled' wire:click="sendMessage">
                                                
                                              </button>
                                            </label>
                                        </div>
                                  </div>
                                  <div wire:loading wire:target="sendMessage" class="loading-indicator mx-2">
                                    
                                      <p class="text-muted"><i class="fa fa-spin fa-spinner"></i>&nbsp;Sending Mesage Please wait...</p>
                               </div>
                              </div>
                          </div>
                                  
                          </div>
                       </div>
                      </div>
                  </div>
              </div>
                      
                       
                <script>  
                      const videoProfiles = {
                        low: '480p_2',  // 640 × 480 - 30fps @ 1000 Kps
                        med: '720p_2',  // 1280 × 720 - 30fps @ 2000 Kps
                        hi: '1080p_2'   // 1920 × 1080 - 30fps @ 3000 Kps
                      }
                      
                      
                      const cameraVideoPreset = videoProfiles.hi
                      const audioConfigPreset = 'music_standard'  // 48kHz mono @ 40 Kbps
                      const screenShareVideoPreset = '1080_3'     // 1920 x 1080 - 30fps @ 3150 Kps
                      
                      // Create the Agora Client
                      const client = AgoraRTC.createClient({ 
                        codec: 'vp9',
                        mode: 'live',
                        role: 'host'
                      })
                      
                      const localTracks = {
                        camera: {
                          audio: null,
                          video: null
                        },
                        screen: {
                          audio: null,
                          video: null   
                        }
                      }
                      
                      const localTrackActive = {
                        audio: false,
                        video: false,
                        screen: false
                      }
                      
                      let remoteUsers = {}                // Container for the remote streams
                      let mainStreamUid = null            // Reference for video in the full screen view
                      
                      const Loglevel = {
                        DEBUG: 0,
                        INFO: 1,
                        WARNING: 2,
                        ERROR: 3,
                        NONE: 4
                      }
                      
                      AgoraRTC.enableLogUpload()                       // Auto upload logs to Agora
                      AgoraRTC.setLogLevel(Loglevel.ERROR)             // Set Loglevel
                      
                      // helper function to quickly get dom elements
                      function getById(divID) {
                        return document.getElementById(divID)
                      }
                      
                      // Listen for page loaded event
                      document.addEventListener('DOMContentLoaded', async () => {
                        console.log('page-loaded');
                        addAgoraEventListeners(); // Add the Agora Event Listeners
                        addLocalMediaControlListeners(); // Add listeners to local media buttons
                      
                        await handleJoin(); // Automatically call handleJoin on page load
                      
                      });
                      
                      const VideoDivInnerHTML=getById('full-screen-video').innerHTML;
                      
                      
                      // User Form Submit Event
                      const handleJoin = async () => {
                                                          // Hide overlay form
                        await initDevices()                                       // Initialize the devices and create Tracks
                      
                      // Join the channel and publish out streams
                      const appid = "{{$appID}}"
                      const channelName = "{{$channelName}}"
                      const token = "{{$token}}"
                       
                        const uid = null                                          // Pass null to have Agora set UID dynamically
                        await client.join(appid, channelName, token, uid)
                        await client.publish([localTracks.camera.audio, localTracks.camera.video])
                        // track audio state locally
                        localTrackActive.audio = true
                        localTrackActive.video = true
                        getById('inter-controls').style.visibility = 'visible'   // show media controls (mic, video. screen-share, etc)
                      }
                      
                      async function initDevices() {
                        if (!localTracks.camera.audio || !localTracks.camera.video) {
                          [ localTracks.camera.audio, localTracks.camera.video ] = await AgoraRTC.createMicrophoneAndCameraTracks({ audioConfig: audioConfigPreset, videoConfig: cameraVideoPreset })
                        }
                        localTracks.camera.video.play('local-video')    // Play the local video track in the local-video div
                      }
                      
                      // Add client Event Listeners -- on page load
                      const addAgoraEventListeners = () => {
                        // Add listeners for Agora Client Events
                        client.on('user-joined', handleRemotUserJoined)
                        client.on('user-left', handleRemotUserLeft)
                        client.on('user-published', handleRemotUserPublished)
                        client.on('user-unpublished', handleRemotUserUnpublished)
                      }
                      
                      // New remote users joins the channel
                      const handleRemotUserJoined = async (user) => {
                        
                        const uid = user.uid
                        remoteUsers[uid] = user         // add the user to the remote users
                        console.log(`User ${uid} joined the channel`)
                        //getById('full-screen-video').innerHTML;
                      }
                      
                      // Remote user leaves the channel
                      const handleRemotUserLeft = async (user, reason) => {
                        const uid = user.uid
                        delete remoteUsers[uid]
                        console.log(`User ${uid} left the channel with reason:${reason}`)
                      }
                      
                      // Remote user publishes a track (audio or video)
                      const handleRemotUserPublished = async (user, mediaType) => {
                       
                        const uid = user.uid
                        await client.subscribe(user, mediaType)
                        remoteUsers[uid] = user                                
                        if (mediaType === 'video') { 
                          // Check if the full screen view is empty
                          if (mainIsEmpty()) {
                            mainStreamUid = uid
                            user.videoTrack.play('full-screen-video')  
                            //Adjust the Width of the Screen on Mobile 
                            updateObjectFitBasedOnScreenWidth();
                          } else {
                              await createRemoteUserDiv(uid)                      
                             user.videoTrack.play(`remote-user-${uid}-video`)
                             //Adjust the width of the screen on Mobile  
                             updateObjectFitBasedOnScreenWidth(); 
                          }           
                        } else if (mediaType === 'audio') {
                          user.audioTrack.play()
                        }
                      }
                      
                      // Remote user unpublishes a track (audio or video)
                      const handleRemotUserUnpublished = async (user, mediaType) => {
                        const uid = user.uid
                        console.log(`User ${uid} unpublished their ${mediaType}`)
                        if (mediaType === 'video') {
                          // Check if its the full screen user
                          if (uid === mainStreamUid) {
                            console.log(`User ${uid} is the main uid`)
                            const newMainUid = getNewUidForMainUser()
                            await setNewMainVideo(newMainUid) 
                          } else {
                            await removeRemoteUserDiv(uid)
                          }
                        }
                      }
                      
                      // Add button listeners
                      const addLocalMediaControlListeners = () => {
                        const micToggleBtn = getById('mic-toggle')
                        const videoToggleBtn = getById('video-toggle')
                        const screenShareBtn = getById('screen-share')
                        const leaveChannelBtn = getById('leave-channel')
                      
                        micToggleBtn.addEventListener('click', handleMicToggle)
                        videoToggleBtn.addEventListener('click', handleVideoToggle)
                        screenShareBtn.addEventListener('click', handleScreenShare)
                        leaveChannelBtn.addEventListener('click', handleLeaveChannel)
                      }
                      
                      const handleMicToggle = async (event) => {
                        const isTrackActive = localTrackActive.audio                               // Get current audio state
                        await muteTrack(localTracks.camera.audio, isTrackActive, event.target)    // Mute/Unmute
                        localTrackActive.audio = !isTrackActive                                    // Invert the audio state
                      }
                      
                      const handleVideoToggle = async (event) => {
                        const isTrackActive = localTrackActive.video                               // Get current video state
                        await muteTrack(localTracks.camera.video, isTrackActive, event.target)    // Mute/Unmute
                        localTrackActive.video = !isTrackActive                                    // Invert the video state
                         
                        // Get the collection of elements with the class name 'btn-mic'
                        let vidIcon = document.getElementsByClassName('btn-vid')[0]; // Access the first element in the collection

                        // Toggle classes if the element exists
                        if (vidIcon) {
                            vidIcon.classList.toggle('bi-camera-video-off'); // Add/Remove 'bi-mic-fill' class
                            vidIcon.classList.toggle('bi-camera-video'); // Add/Remove 'bi-mic-mute' class
                        }
                    }
                      
                      // Single function to mute audio/video tracks, using their common API
                      const muteTrack = async (track, mute, btn) => {
                        if (!track) return                      
                        await track.setMuted(mute)              // Mute the Track (Audio or Video)

                        
                        // Get the collection of elements with the class name 'btn-mic'
                        let micIcon = document.getElementsByClassName('btn-mic')[0]; // Access the first element in the collection

                        // Toggle classes if the element exists
                        if (micIcon) {
                            micIcon.classList.toggle('bi-mic-fill'); // Add/Remove 'bi-mic-fill' class
                            micIcon.classList.toggle('bi-mic-mute'); // Add/Remove 'bi-mic-mute' class
                        }
                                                  
                    }
                      

                    //Handle Screen Shares
                      const handleScreenShare = () => {
                       
                        if (localTrackActive.screen) {
                          stopScreenShare()
                        } 
                        else {
                          startScreenShare()
                        }
                      }


                      const startScreenShare = async () => {
                          // Create the screen video and audio (if available)
                          const screenTrack = await AgoraRTC.createScreenVideoTrack(
                            { encoderConfig: screenShareVideoPreset },
                            "auto"
                          );

                          // Check if there's an audio track available or just video
                          if (screenTrack instanceof Array) {
                            localTracks.screen.video = screenTrack[0];
                            localTracks.screen.audio = screenTrack[1];
                          } else {
                            localTracks.screen.video = screenTrack;
                          }

                          // Move the main user from the full-screen div
                          if (!mainIsEmpty) {
                            await createRemoteUserDiv(mainStreamUid);
                            remoteUsers[mainStreamUid].videoTrack.play(
                              `remote-user-${mainStreamUid}-video`
                            );
                          }

                          // Publish the tracks
                          let tracks = [localTracks.screen.video];
                          if (localTracks.screen.audio) {
                            tracks.push(localTracks.screen.audio);
                          }

                          // Unpublish the camera track and mute it
                          await client.unpublish(localTracks.camera.video);
                          const videoToggleBtn = getById("video-toggle");
                          videoToggleBtn.disabled = true;
                          await muteTrack(localTracks.camera.video, true, videoToggleBtn);
                          localTrackActive.video = false;

                          // Publish the new screen tracks
                          await client.publish(tracks);

                          // Set screen-share flag and play on full-screen
                          localTrackActive.screen = true;

                          // Clear existing content and play the screen share video
                          const fullScreenVideoContainer = getById("full-screen-video");
                          fullScreenVideoContainer.innerHTML = ""; // Clear existing content
                          localTracks.screen.video.play("full-screen-video");

                           updateObjectFitBasedOnScreenWidth();
                          //alert("Hello boss screen is active")

                          // Apply object-fit: contain once the video element is added
                          const applyObjectFit = () => {
                            const screenVideoElement = document.querySelector(
                              "#full-screen-video video"
                            );
                            if (screenVideoElement) {
                              screenVideoElement.style.objectFit = "contain";
                            }
                          };

                          // Apply styles immediately if video element is added
                          applyObjectFit();

                          // Alternatively, use MutationObserver to apply styles once the video element is added
                          const observer = new MutationObserver((mutationsList, observer) => {
                            for (let mutation of mutationsList) {
                              if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
                                applyObjectFit();
                                observer.disconnect(); // Stop observing after applying styles
                              }
                            }
                          });

                          observer.observe(fullScreenVideoContainer, { childList: true });

                          // Listen for screen share ended event (from browser UI button)
                          localTracks.screen.video.on("track-ended", () => {
                            stopScreenShare();
                          });
                        };



                        //Function to Handle Creating of Account
                        function updateObjectFitBasedOnScreenWidth() {
                            // Get the screen width
                            const screenWidth = window.innerWidth;

                            // Get all video elements with the class 'agora_video_player'
                            let videos = document.getElementsByClassName('agora_video_player');

                            // Loop through each video element
                            for (let i = 0; i < videos.length; i++) {
                                let video = videos[i];

                                // Check the current object-fit value
                                if (screenWidth < 600 && video.style.objectFit === 'cover') {
                                    // Change object-fit to 'contain' if screen width is below 600px
                                    video.style.objectFit = 'contain';
                                } else if (screenWidth >= 600 && video.style.objectFit === 'contain') {
                                    // Optional: Change back to 'cover' if the screen width is 600px or more
                                    video.style.objectFit = 'cover';
                                }
                            }
                        }
                      
                      

                      const stopScreenShare = async () => {
                        //alert('Screen Stoped');
                        let tracks = [localTracks.screen.video]
                        if (localTracks.screen.audio) {
                          tracks = [localTracks.screen.video, localTracks.screen.audio]
                        }
                        await client.unpublish(tracks)
                        // close the tracks
                        localTracks.screen.video && localTracks.screen.video.close();
                        localTracks.screen.audio && localTracks.screen.audio.close();
                        // publish the local video
                        const videoToggleBtn = getById('video-toggle')
                        await muteTrack(localTracks.camera.video, false, videoToggleBtn)
                        localTrackActive.video = true
                        await client.publish(localTracks.camera.video);
                        videoToggleBtn.disabled = false
                        localTrackActive.screen = false
                        // ui clean-up
                        // getById('full-screen-video').innerHTML.reload
                        getById('full-screen-video').innerHTML=VideoDivInnerHTML    // Remove all children of the main div
                        if(mainStreamUid) {
                          await setNewMainVideo(mainStreamUid)
                        } else if (Object.keys(remoteUsers) > 0) {
                          const newMainUid = getNewUidForMainUser()
                          await setNewMainVideo(newMainUid) 
                        }
                      }
                      
                      const handleLeaveChannel = async () => {
                        // loop through and stop the local tracks
                        for (let trackName in localTracks.camera) {
                          const track = localTracks.camera[trackName]
                          if (track) {
                            track.stop()
                            track.close()
                            localTracks.camera[trackName] = undefined
                          }
                        }
                        // stop the screenshare
                        if (localTrackActive.screen) {
                          let tracks = [localTracks.screen.video]
                          if (localTracks.screen.audio) {
                            tracks = [localTracks.screen.video, localTracks.screen.audio]
                          }
                          await client.unpublish(tracks)
                        }
                        // Leave the channel
                        await client.leave()
                        console.log("Client Left meeting successfully")
                        // Reset remote users 
                        remoteUsers = {} 
                        // reset the active flagss
                        for (const flag in localTrackActive){
                          localTrackActive[flag] = false
                        }
                        // Reset the UI
                        const mediaButtons = [getById('mic-toggle'), getById('video-toggle')]
                        mediaButtons.forEach(btn => {
                          btn.classList.add('media-active')   
                          btn.classList.remove('muted')    
                        });
                        getById('remote-video-container').replaceChildren() 
                        getById('full-screen-video').replaceChildren()
                        getById('local-media-controls').style.display = 'none'

                        
       
                      }
                      
                      // create the remote user container and video player div
                      const createRemoteUserDiv = async (uid) => {
                          const containerDivId = getById(`remote-user-${uid}-container`);
                          if (containerDivId) return;
                          console.log(`add remote user div for uid: ${uid}`);
                      
                          // create a container for the remote video stream
                          const containerDiv = document.createElement('div');
                          containerDiv.id = `remote-user-${uid}-container`;
                      
                          // create a div to display the video track
                          const remoteUserDiv = document.createElement('div');
                          remoteUserDiv.id = `remote-user-${uid}-video`;
                          remoteUserDiv.classList.add('remote-video');
                          containerDiv.appendChild(remoteUserDiv);
                      
                          // Clear the full-screen video container and add the new remote user container
                          const fullScreenVideoContainer = getById('full-screen-video');
                          fullScreenVideoContainer.replaceChildren(containerDiv); // Replace existing content with the new container
                      
                          // Listen for double click to swap container with main div
                          containerDiv.addEventListener('dblclick', async (e) => {
                              await swapMainVideo(uid);
                          });
                      };
                      
                      // Remove the div when users leave the channel
                      const removeRemoteUserDiv = async (uid) => {
                        const containerDiv = getById(`remote-user-${uid}-container`)
                        if (containerDiv) {
                          containerDiv.parentNode.removeChild(containerDiv)
                        } 
                      }
                      
                      // check if the main-screen is empty
                      const mainIsEmpty = () => {
                        return getById('full-screen-video').childNodes.length === 0
                      }
                      
                      const setNewMainVideo = async (newMainUid) => {
                        if (!newMainUid) return                                        // Exit early if newMainUid is undefined
                        await removeRemoteUserDiv(newMainUid)                          // remove the div from the remote user's container
                        remoteUsers[newMainUid].videoTrack.play('full-screen-video')   // play the remote video in the full screen div
                        mainStreamUid = newMainUid                                     // Set the new uid as the mainUid
                        console.log(`newMainUid: ${newMainUid}`)
                      }
                      
                      const swapMainVideo = async (newMainUid) => {
                        const mainStreamUser = remoteUsers[mainStreamUid]
                        if(mainStreamUser) {
                          await createRemoteUserDiv(mainStreamUid)
                          const videoTrack = remoteUsers[mainStreamUid].videoTrack
                          // check if the video track is active
                          if(videoTrack) {
                            videoTrack.play(`remote-user-${mainStreamUid}-video`)
                          }
                        }
                        await setNewMainVideo(newMainUid)
                      }
                      
                      const getNewUidForMainUser = () => {
                        const allUids = Object.keys(remoteUsers)
                        if (allUids.length === 0) return undefined   // handle error-case
                        // return a random uid
                        const getRandomUid = () => {
                          const randUid = allUids[Math.floor(Math.random() * allUids.length)]
                          console.log(`randomUid: ${randUid}`)
                          return randUid
                        }
                        // make sure the random Uid is not the main uid
                        let newUid = getRandomUid()
                        while (allUids.length > 1 && newUid == mainStreamUid) {
                          newUid = getRandomUid()
                        }
                      
                        return newUid
                      }

                      //Meeting Timer
                      function formatTime(milliseconds) {
                          const totalSeconds = Math.floor(milliseconds / 1000);
                          const minutes = Math.floor(totalSeconds / 60);
                          const seconds = totalSeconds % 60;
                          return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                      }

                      function startTimer() {
                            startTime = Date.now();
                            timerInterval = setInterval(() => {
                                let elapsedTime = Date.now() - startTime;
                                document.getElementById('timer').textContent = `${formatTime(elapsedTime)}`;
                            }, 1000);
                        }
                        startTimer();

                        function stopTimer() {
                            clearInterval(timerInterval);
                            document.getElementById('timer').textContent = "00:00";
                        }
                  </script>
                      
                  </div>
                      

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

