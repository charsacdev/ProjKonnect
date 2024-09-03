<div>
    
    <div>
        <div class="main-content">
            <div class="row">
                 <div class="col-12">
                      <form id="create-credshow-form">
                           <div id="cred-tabs">
                               
                            <!-- *************** Preview Tab *******************-->
                            <div class="cred-tab" style="display: block">
                                <div class="header-lg-ctn mb-5">
                                     <h2>Preview Portfolio</h2>
                                     <div class="cred-progress-ctn">
                                      <div class="cred-bar"></div>
                                     </div>
                                 </div>
                                <div class="d-flex justify-content-center">
                                     <div class="cred-profile-img">
                                          <img src="{{$profilephoto}}" class="img-fluid" alt="Profile picture">
                                     </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                     <div class="cred-prev-header">
                                          Resume
                                     </div>
                                </div>
                                <h5 class="px-2">Personal Information</h5>
                                <div class="row px-2">
                                   <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                             <label>Full Name</label>
                                             <input type="text" required wire:model="fullname" placeholder="Full Name" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                             <label>Phone Number</label>
                                             <input type="text" required wire:model="phone" placeholder="Phone Number" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                             <label>E-mail Address</label>
                                             <input type="text" required wire:model="email" placeholder="E-mail Address" id="" class="form-control">
                                        </div>
                                   </div>
                                </div>
                                <div class="row px-2 align-items-stretch">
                                   <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                             <label>Address</label>
                                             <textarea required wire:model="address" class="form-control h-100" placeholder="Address" id="" cols="30" rows="3"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                        <div class="form-group mb-2">
                                             <label>Instagram Link (optional)</label>
                                             <input type="text" class="form-control"  wire:model="socials.instagram" placeholder="Instagram Link (optional)" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                             <label>Behance Link (optional)</label>
                                             <input type="text" class="form-control"  wire:model="socials.behance" placeholder="Behance Link (optional)" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                        <div class="form-group mb-2">
                                             <label>Twitter Link (optional)</label>
                                             <input type="text" class="form-control"  wire:model="socials.twitter" placeholder="Twitter Link (optional)" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                             <label>Github Link (optional)</label>
                                             <input type="text" class="form-control"  wire:model="socials.github" placeholder="Github Link (optional)" id="" class="form-control">
                                        </div>
                                   </div>
                                </div>
                                <h5 class="px-2">Educational Background</h5>
                                <div class="row px-2">
                                   <div class="col-md-8 mb-4">
                                        <label>School Attended</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="schoolAttended" required placeholder="School Attended" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-2 mb-4">
                                        <label>Degree Obtained</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="degree" required placeholder="Degree Obtained" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-2 mb-4">
                                        <label>CGPA</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="cgpa" required placeholder="CGPA" id="" class="form-control">
                                        </div>
                                   </div>

                                   <div class="col-md-6 mb-4">
                                        <label>Relevant Coursework</label>
                                        <div class="form-group">
                                             <textarea wire:model="coursework" required class="form-control" placeholder="Relevant Coursework" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Academic Projects</label>
                                        <div class="form-group">
                                             <textarea wire:model="academicproject" required class="form-control" placeholder="Academic Projects" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                </div>
                                <h5 class="px-2">Work Experience</h5>
                               <div class="row px-2">
                                   <div class="col-md-3 mb-4">
                                        <label>Institution</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="institution" required placeholder="Institution" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-3 mb-4">
                                        <label>Position Held</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="position" required placeholder="Position Held" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-3 mb-4">
                                        <label>Start Date</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="startdate" required placeholder="Start Date" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-3 mb-4">
                                        <label>End Date</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="enddate" required placeholder="End Date" id="" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Responsibilities</label>
                                        <div class="form-group">
                                             <textarea wire:model="reponsiblity" required class="form-control" placeholder="Responsibilities" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Achievements</label>
                                        <div class="form-group">
                                             <textarea wire:model="achievement" required class="form-control" placeholder="Achievements" id="" cols="30" rows="5"></textarea>
                                        </div>
                                     </div>
                               </div>
                               <h5 class="mb-3">Certifications</h5>
                                   <div class="row">
                                        <div class="col-md-5 mb-4">
                                             <label>Certification name</label>
                                             <div class="form-group">
                                                  <input type="text" required wire:model="certification.one" placeholder="Certification name" id="" class="form-control">
                                             </div>
                                        </div>
                                        <div class="col-md-5 mb-4">
                                             <label>Issuing Organization</label>
                                             <div class="form-group">
                                                  <input type="text" required wire:model="certOrganization.one" placeholder="Issuing Organization" id="" class="form-control">
                                             </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                             <label>Year of acquisition</label>
                                             <div class="form-group">
                                                  <input type="text" required wire:model="yearOrganization.one" placeholder="Year of acquisition" id="" class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-md-5 mb-4">
                                             <label>Certification name</label>
                                             <div class="form-group">
                                                  <input type="text" required wire:model="certification.two" placeholder="Certification name" id="" class="form-control">
                                             </div>
                                        </div>
                                        <div class="col-md-5 mb-4">
                                             <label>Issuing Organization</label>
                                             <div class="form-group">
                                                  <input type="text" required wire:model="certOrganization.two" placeholder="Issuing Organization" id="" class="form-control">
                                             </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                             <label>Year of acquisition</label>
                                             <div class="form-group">
                                                  <input type="text" required wire:model="yearOrganization.two" placeholder="Year of acquisition" id="" class="form-control">
                                             </div>
                                        </div>
                                       
                               </div>
                               <h5 class="px-2">Honors and Awards <i class="op-6">(scholarships, dean's list, honor societies)</i></h5>
                               <div class="row">
                               <div class="col-md-4 mb-4">
                                   <div class="d-flex align-items-center justify-content-between honor-ctn mb-2" style="padding: 10px!important;padding-left: 0!important;padding-right: 10px!important;">
                                        <input type="text" wire:model="honorTitle.one" placeholder="Enter Title" id="" class="form-control" style="border-color: transparent;">      
                                          @if(!empty($honorFile['one'][0]))
                                           <a href="{{$honorFile['one'][0]}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a>
                                          @endif
                                        </div>
                                   
                                   <div id="pocFile-ctn1"></div>
                              </div>
                              <div class="col-md-4 mb-4">
                                   <div class="d-flex align-items-center justify-content-between honor-ctn mb-2" style="padding: 10px!important;padding-left: 0!important;padding-right: 10px!important;">
                                        <input type="text" wire:model="honorTitle.two" placeholder="Enter Title" id="" class="form-control" style="border-color: transparent;">
                                             @if(!empty($honorFile['two'][0]))
                                                <a href="{{$honorFile['two'][0]}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a>
                                             @endif
                                        </div>
                                   <div id="pocFile-ctn2"></div>
                              </div>
                              <div class="col-md-4 mb-4">
                                   <div class="d-flex align-items-center justify-content-between honor-ctn mb-2" style="padding: 10px!important;padding-left: 0!important;padding-right: 10px!important;">
                                        <input type="text" wire:model="honorTitle.three" placeholder="Enter Title" id="" class="form-control" style="border-color: transparent;">
                                        @if(!empty($honorFile['three'][0]))
                                          <a href="{{$honorFile['three'][0]}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a>
                                       @endif
                                   </div>
                                   <div id="pocFile-ctn3"></div>
                              </div>
                         </div>
                               <h5 class="px-2">Activities</h5>
                               <div class="row px-2">
                                   <div class="col-md-6 mb-4">
                                        <label>Student Organizations</label>
                                        <div class="form-group">
                                             <textarea wire:model="studentOrganization" required class="form-control" placeholder="Student Organizations" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Sport Teams</label>
                                        <div class="form-group">
                                             <textarea wire:model="sportTeam" required class="form-control" placeholder="Sport Teams" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Conferences Attended</label>
                                        <div class="form-group">
                                             <textarea wire:model="conference" required class="form-control" placeholder="Conferences Attended" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Student Clubs</label>
                                        <div class="form-group">
                                             <textarea wire:model="studentClub" required class="form-control" placeholder="Student Clubs" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                               </div>
                               <h5 class="px-2">Volunteering</h5>
                               <div class="row px-2">
                                   <div class="col-md-6 mb-4">
                                        <label>Name of Organization</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="Volunteerorganization" required class="form-control" placeholder="Name of Organization">
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Volunteering Duration</label>
                                        <div class="form-group">
                                             <input type="text" wire:model="VolunteerDuration" required class="form-control" placeholder="Volunteering Duration">
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Causes Supported</label>
                                        <div class="form-group">
                                             <textarea wire:model="VolunteerCourseSupported" required class="form-control" placeholder="Causes Supported" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Accomplishments/responsibilities</label>
                                        <div class="form-group">
                                             <textarea wire:model="VolunteerAccomplishment" required class="form-control" placeholder="Accomplishments/responsibilities" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                               </div>
                               <h5 class="px-2">Additional</h5>
                               <div class="row px-2">
                                   <div class="col-md-6 mb-4">
                                        <label>Publications</label>
                                        <div class="form-group">
                                             <textarea wire:model="publications" required class="form-control" placeholder="Publications" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Leadership Roles</label>
                                        <div class="form-group">
                                             <textarea wire:model="leadership" required class="form-control" placeholder="Leadership Roles" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Interests</label>
                                        <div class="form-group">
                                             <textarea wire:model="interest" required class="form-control" placeholder="Interests" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                        <label>Hobbies</label>
                                        <div class="form-group">
                                             <textarea wire:model="Hobbies" required class="form-control" placeholder="Hobbies" id="" cols="30" rows="5"></textarea>
                                        </div>
                                   </div>
                               </div>
                               <div class="d-flex justify-content-center">
                                    <div class="cred-prev-header">
                                          Skills
                                     </div>
                               </div>
                                <div class="d-flex align-items-center justify-content-between">
                                     <h5 class="px-2">Skill</h5>
                                     <h5 class="px-2">Proficiency</h5>
                                </div>
                               @foreach ($skills as $skill)
                                   <div class="row px-2 mb-4">
                                        <div class="col-md-5 col-7">
                                             <div class="form-group">
                                                  <input type="text" name="skill[]" value="{{ $skill['skill'] }}" class="form-control">
                                             </div>
                                        </div>
                                        <div class="col-md-2 d-none d-md-block"></div>
                                        <div class="col-md-5 col-5">
                                             <div class="form-group">
                                                  <select name="level[]" class="form-control">
                                                       <option value="">Select</option>
                                                       <option value="Beginner" {{ $skill['level'] == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                                       <option value="Intermediate" {{ $skill['level'] == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                                       <option value="Advanced" {{ $skill['level'] == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                                       <option value="Expert" {{ $skill['level'] == 'Expert' ? 'selected' : '' }}>Expert</option>
                                                       <option value="Master" {{ $skill['level'] == 'Master' ? 'selected' : '' }}>Master</option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   @endforeach

                                
                                   <div class="d-flex justify-content-center">
                                        <div class="cred-prev-header">
                                            Projects
                                        </div>
                                    </div>
                                    
                                    @foreach ($projects as $type => $projectList)
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="px-2">{{ $type }} Projects</h5>
                                        </div>
                                    
                                        @foreach ($projectList as $project)
                                            <div class="row px-2">
                                                <div class="col-md-6 mb-4">
                                                  <label>Project Name</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Project Name" name="project_name[]" value="{{ $project['name'] }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                  <label>Project Duration</label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Project Duration" name="project_duration[]" value="{{ $project['duration'] }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                  <label>Project Summary</label>
                                                    <div class="form-group">
                                                        <textarea name="project_summary[]" cols="30" placeholder="Project Summary" rows="4" class="form-control h-100">{{ $project['summary'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="input-ctn border h-100 p-3">
                                                        <div class="proj-file-ctn">
                                                            @if ($project['file'])
                                                                <div class="report-evid">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <small style="opacity: 0.6"><i>Uploaded</i></small>
                                                                        <div id="percent" class="percent">100%</div>
                                                                    </div>
                                                                    <div class="progress" id="progress">
                                                                        <div class="bar" style="width: 100%!important;" id="bar"></div>
                                                                    </div><br>
                                                                    <a href="" target="_blank">View File</a>
                                                                </div>
                                                            @else
                                                                 <div class="report-evid">
                                                                      <a href="{{$project['file']}}" target="_blank">View File</a>
                                                                 </div>
                                                            @endif
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    

                                <div class="d-flex justify-content-center">
                                     <div class="cred-prev-header">
                                           Video Pitch
                                      </div>
                                </div>
                                <div class="prevido mb-4 ">
                                     <div class="d-flex align-items-center justify-content-start gap-3">
                                          <img src="{{asset('student-asset/asset/img/video-play-icon.png')}}" width="30px" alt="icon">
                                          <a href="{{$pitchvideo['videolink']}}" target="_blank"><span>Uploaded File</span></a>
                                     </div>
                              </div>
                           </div>
                        </div>

                        <!--Next and Previous Button-->
                        <div class="d-flex align-items-center justify-content-center gap-5 mt-5 mb-5">
                         @if(!Auth::check())
                         <a href="/create-cred-show-step4">
                            <button type="button" class="cred-btn" id="prev-cred-btn"><i class="fa fa-arrow-left"></i></button>
                         </a>
                         @endif
                        
                         <button type="button" class="new-discussion-btn" id="generate-link-btn" >Generate Link</button>
                         <button class="d-none" id="show-link-btn" data-bs-toggle="modal" data-bs-target="#linkModal" type="hidden"></button>
                         </div>
                       </div>
                    </form>
               </div>
          </div>
    </div>

    <div wire:ignore.self class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body rounded overflow-hidden">
                 <h5>Share</h5>
                 <div class="sharer-ctn">
                     <div class="sharer whatsapp" id="whatsappShare">
                         <div class="img">
                             <img src="{{asset('student-asset/asset/img/whatsapp-icon.png')}}" alt="icon">
                         </div>
                         <span>Whatsapp</span>
                     </div>
                     <div class="sharer facebook" id="facebookShare">
                         <div class="img">
                             <img src="{{asset('student-asset/asset/img/facebook-icon-alt.png')}}" alt="icon">
                         </div>
                         <span>Facebook</span>
                     </div>
                     <div class="sharer email" id="emailShare">
                         <div class="img">
                             <img src="{{asset('student-asset/asset/img/email-icon.png')}}" alt="icon">
                         </div>
                         <span>Email</span>
                     </div>
                 </div>
                 <div class="share-link-ctn">
                     <div class="custom-tooltip">
                         Copied!
                     </div>
                     <input type="text" id="sharelink" value="{{$credshowLink}}">
                     <button class="copy-btn" id="btnCopy">Copy</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 

<script>
     //Prevent form from submitting
     document.getElementById('create-credshow-form').addEventListener('submit', function(event) {
       event.preventDefault();
    });

    //Sharing Link
    const shareLink = document.getElementById('sharelink').value;

    // WhatsApp share
    document.getElementById('whatsappShare').addEventListener('click', function () {
        const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(shareLink)}`;
        window.open(whatsappUrl, '_blank');
    });

    // Facebook share
    document.getElementById('facebookShare').addEventListener('click', function () {
        const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareLink)}`;
        window.open(facebookUrl, '_blank');
    });

    // Email share
    document.getElementById('emailShare').addEventListener('click', function () {
        const emailSubject = 'Check this out!';
        const emailBody = `Here's something interesting: ${shareLink}`;
        const mailtoUrl = `mailto:?subject=${encodeURIComponent(emailSubject)}&body=${encodeURIComponent(emailBody)}`;
        window.open(mailtoUrl, '_self');
    });

</script>


  </div>



