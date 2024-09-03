<div>
    
     <div wire:ignore class="main-content">
          <div class="row">
               <div class="col-12">
                    <form id="create-credshow-form" wire:submit.prevent="Credshow4UploadFile">
                         <div id="cred-tabs">
                    
                              <!---CRED SHOW STEP4-->
                              <div class="cred-tab">
                                   <div class="header-lg-ctn mb-5">
                                        <h2>Record Video Pitch</h2>
                                        <div class="cred-progress-ctn">
                                         <div class="cred-bar"></div>
                                        </div>
                                    </div>
                                   <div class="row mt-5">
                                        <div class="col-md-1 col-lg-2"></div>
                                        <div class="col-md-10 col-lg-8">
                                             <div id="video-live-ctn">
                                                  <div id="live-record-ctn">
                                                       <video id="localVideo" autoplay muted style="display:none;width:100%;height:100%"></video>
                                                       <img id="videoImg" src="{{asset('student-asset/asset/img/user-picture.png')}}" class="img-fluid h-50" alt="" style="object-fit:contain !important">
                                                  </div>
                                                  <div class="d-flex align-items-center justify-content-between">
                                                       <div id="video-duration">
                                                            <img src="{{asset('student-asset/asset/img/recording-img.png')}}" alt="icon">
                                                            <span id="timer">00:00</span>
                                                       </div>
                                                       <div class="d-flex align-items-center justify-content-center gap-4 vid-control-ctn">
                                                           <!--Stop Recording-->
                                                            <div id="video-pause-play">
                                                                 <button class="record-btn" type="button" id="stopVideoRecordButton">
                                                                  <img src="{{asset('student-asset/asset/img/pause-icon.png')}}" alt="icon">
                                                                 </button>
                                                            </div>

                                                            <!--Download Button-->
                                                            <div id="video-microphone" style="display:none">
                                                                 <center>
                                                                 <a id="downloadLink" style="display: none;">
                                                                      <i class="fa fa-download text-center text-light mt-2 fw-6" aria-hidden="true"></i>
                                                                 </a>
                                                                 </center>
                                                            </div>

                                                            <!--Record Video-->
                                                            <div id="video-camera">
                                                                 <button class="record-btn" type="button" id="recordVideoButton">
                                                                  <img src="{{asset('student-asset/asset/img/recording-img.png')}}" alt="icon">
                                                                 </button>
                                                            </div>
                                                       </div>
                                                       <div id="video-start-stop">
                                                            <button class="record-btn" type="button" id="startButton">Start Video</button>
                                                       </div>
                                                  </div>
                                                  <!--Progress Bar-->
                                                  <div class="progress mt-5" id="progress">
                                                       <div class="bar text-center text-light" id="bar"></div>
                                                   </div>
                                             </div>
                                        </div>
                                        <div class="col-md-1 col-lg-2"></div>
                                        <!--Handle All button and Record Video-->
                                        <style>
                                             .record-btn{
                                                  background: inherit; 
                                                  color: inherit;
                                                  border: none;
                                                  border-radius: 4px;
                                                  cursor: pointer;
                                                  font-size:14px
                                             }
                                        </style>
                                  </div>
                                <div class="row mt-5">
                                   <div class="col-md-3 col-lg-4"></div>
                                   <div class="col-md-6 col-lg-4">
                                        <div class="hr-line-ctn">
                                             <h5 class="word">OR</h5>
                                             <div class="hr-line"></div>
                                        </div>
          
                                        <label class="header-md-ctn d-block" for="video-file" style="cursor: pointer;">
                                             <img src="{{asset('student-asset/asset/img/upload-icon.png')}}" alt=""> &nbsp; Upload File
                                             <input type="file" wire:model="videoFile" id="video-file" accept="video/*" class="d-none">
                                                  
                                        </label>
                                        @error('videoFile')
                                          <p class="text-danger">{{$message}}</p>
                                        @enderror
                                   </div>
                                   <div class="col-md-3 col-lg-4"></div>
                                </div>
                              </div> 
                         </div>
                          <!--Next and Previous Button-->
                          <div class="d-flex align-items-center justify-content-center gap-5 mt-5 mb-5">
                              <a href="/create-cred-show-step3">
                                 <button type="button" class="cred-btn" id="prev-cred-btn"><i class="fa fa-arrow-left"></i></button>
                              </a>
                                <button type="submit" class="cred-btn" id="next-cred-btn">
                                      <span wire:loading.remove><i class="fa fa-arrow-right"></i>
                                      <span wire:loading wire:target="Credshow4UploadFile" style="cursor: not-allowed">
                                          <i class="fa fa-spin fa-spinner"></i>&nbsp;...
                                      </span>
                                 </button>
                         </div>
                    </form>
               </div>
          </div>
       </div>

</div>

<script>
     const APP_ID = "{{$AgoraSdk['app id']}}";
     const CHANNEL = "{{$AgoraSdk['meeting name']}}";
     const TOKEN = "{{$AgoraSdk['token']}}";
     const UID = null;

     //alert(APP_ID);

     const BUCKET_NAME = 'myprojkonnect-s3bucket/agora_records';
        const REGION = 'us-east-1';
        let isConfigUpdate = false;

        let localAudioTrack, localVideoTrack;
        let mediaRecorder;
        let recordedChunks = [];
         let timerInterval;
        let startTime;

        const client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

        //Initiate Agora
        async function start() {

           document.getElementById('videoImg').style.display="none";
          
            await client.join(APP_ID, CHANNEL, TOKEN, UID);
            localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
            localVideoTrack = await AgoraRTC.createCameraVideoTrack();

            console.log("Local video track created:", localVideoTrack);

            localVideoTrack.play('localVideo');

            await client.publish([localAudioTrack, localVideoTrack]);

             
            console.log("Microphone and camera tracks published successfully!");
      }

        async function stop() {
            if (localVideoTrack) localVideoTrack.stop();
            if (localVideoTrack) localVideoTrack.close();
           
            await client.leave();

            console.log("Left the channel successfully!");
        }

        //Start Recording
        async function startRecording() {
               
                let stream;
                
                    stream = new MediaStream([localVideoTrack.getMediaStreamTrack(), localAudioTrack.getMediaStreamTrack()]);
                    let localVideoElement = document.getElementById('localVideo');
                    localVideoElement.style.display="block";
                    localVideoElement.srcObject = stream;
                
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.ondataavailable = (event) => {
                    if (event.data.size > 0) {
                       
                            recordedChunks.push(event.data);
                    }
                };

                mediaRecorder.onstop = async () => {

                    const chunks = recordedChunks;
                    const blob = new Blob(chunks, { type: 'video/webm' });

                         // Generate a random string for the file name
                         function generateRandomString(length) {
                         const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                         let result = '';
                         const charactersLength = characters.length;
                         for (let i = 0; i < length; i++) {
                              result += characters.charAt(Math.floor(Math.random() * charactersLength));
                         }
                         return result;
                         }

                         const randomString = generateRandomString(30); // Generate a random string of 16 characters
                         const fileName = `recording-${randomString}.webm`;
                         const url = URL.createObjectURL(blob);
                         const downloadLink = document.getElementById('downloadLink');
                         downloadLink.href = url;
                         downloadLink.download = fileName;
                         downloadLink.style.display = 'block';
                         document.getElementById('video-microphone').style.display = "block";

                    
                         // Get the CSRF token from the meta tag
                         const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                         // Send the file name to the server via an AJAX request
                         try {
                              const response = await fetch('/save-file-name', {
                                   method: 'POST',
                                   headers: {
                                        'Content-Type': 'application/json',
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'X-CSRF-TOKEN': csrfToken
                                   },
                                   body: JSON.stringify({ fileName: fileName })
                              });

                              const result = await response.json();
                              if (response.ok) {
                                  
                                   //Upload file after saving it
                                    await uploadToS3(blob, fileName);

                                   console.log('File name saved successfully:', result);
                              } 
                              else {
                                   console.error('Error saving file name:', result);
                              }
                         } catch (error) {
                              console.error('Error with AJAX request:', error);
                         }
                    };


                mediaRecorder.start();
                startTimer();
                console.log("Recording started");
            }


        //Stop Video Recording
        async function stopRecording() {
            
                mediaRecorder.stop();
                stopTimer();
                stop(); 
                console.log("Recording stopped");
            
        }

   
        function startTimer() {
            startTime = Date.now();
            timerInterval = setInterval(() => {
                const elapsedTime = Date.now() - startTime;
                document.getElementById('timer').textContent = `${formatTime(elapsedTime)}`;
            }, 1000);
        }

        function stopTimer() {
            clearInterval(timerInterval);
            document.getElementById('timer').textContent = "00:00";
        }

        function formatTime(milliseconds) {
            const totalSeconds = Math.floor(milliseconds / 1000);
            const minutes = Math.floor(totalSeconds / 60);
            const seconds = totalSeconds % 60;
            return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        async function uploadToS3(blob, fileName) {
            let credentialRequest = await getAWSCredentials();
            try {
                if (!window.AWS) {
                    return;
                }
                if (!isConfigUpdate) {
                    window.AWS.config.update({ region: credentialRequest.region });
                    isConfigUpdate = true;
                }

                let s3 = new window.AWS.S3({
                    credentials: new window.AWS.Credentials({
                        accessKeyId: credentialRequest.accessKeyId,
                        secretAccessKey: credentialRequest.secretAccessKey,
                        signatureVersion: credentialRequest.signatureVersion,
                    }),
                    region: credentialRequest.region,
                });

                let uploadItem = await s3.upload({
                    Bucket: BUCKET_NAME,
                    Key: fileName,
                    ContentType: blob.type,
                    Body: blob,
                }).on("httpUploadProgress", function (progress) {

                    //Upload Progress Function
                    getUploadingProgress(progress.loaded, progress.total);
                    console.log("progress=>", progress);
                }).promise();

                console.log("uploadItem=>", uploadItem);
                return uploadItem;
            } catch (error) {
                console.log(error);
            }
        }

        function getUploadingProgress(uploadSize, totalSize) {
              let uploadProgress = (uploadSize / totalSize) * 100;
            
               let progress = Number(uploadProgress.toFixed(0));
               let bar = document.getElementById('bar');
               bar.innerHTML=progress+"%";
               bar.style.width = progress + '%';

               if (progress >= 100) {
                    bar.style.backgroundColor = '#28a745';
               } else {
                    bar.style.backgroundColor = '#007bff';
               }
        }

       

        document.getElementById('startButton').onclick = start;
        document.getElementById('recordVideoButton').onclick =  startRecording;
        document.getElementById('stopVideoRecordButton').onclick =  stopRecording;
</script>
