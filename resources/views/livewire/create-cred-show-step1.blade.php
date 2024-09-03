<div>
    
      <!--Errors Handling-->
      <div>
           @if(session('error'))
           <p class="text-danger text-center p-1"> 
                {{ session('error') }}
           </p>
           @endif
      </div>

     <div wire:ignore class="main-content">
          <div class="row">
               <div class="col-12">
                    <form id="create-credshow-form" wire:submit.prevent="Credshow1">
                         <div id="cred-tabs">

                              <!---CRED SHOW STEP1-->
                              <div class="cred-tab">
                                   <div class="header-lg-ctn mb-5">
                                        <h2>Add Resume</h2>
                                        <div class="cred-progress-ctn" style="width:25% !important">
                                         <div class="cred-bar"></div>
                                        </div>
                                    </div>
                                   <h5>Personal Information</h5>
                                   <div class="row">
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
                                   <div class="row align-items-stretch">
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
                                   <h5>Educational Background</h5>
                                   <div class="row">
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
                                   <h5>Work Experience</h5>
                                  <div class="row">
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
                                  <h5>Certifications</h5>
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
                                  <h5 class="mb-3">Honors and Awards <i class="op-6">(scholarships, dean's list, honor societies)</i></h5>
                                   <div class="row">
                                   <div class="col-md-4 mb-4">
                                        <div class="d-flex align-items-center justify-content-between honor-ctn mb-2" style="padding: 10px!important;padding-left: 0!important;padding-right: 10px!important;">
                                             <input type="text" wire:model="honorTitle.one" placeholder="Enter Title" id="" class="form-control" style="border-color: transparent;">
                                             <div class="form-group evid-ctn mt-2" style="border-color: transparent!important;">
                                                  <label for="pocFile1" style="border-color: transparent!important;"><img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt=""> </label>
                                                  <input type="file" id="pocFile1" wire:model="honorFile.one" class="form-control default-input d-none" multiple>
                                             </div>
                                        </div>
                                        <div id="pocFile-ctn1"></div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                        <div class="d-flex align-items-center justify-content-between honor-ctn mb-2" style="padding: 10px!important;padding-left: 0!important;padding-right: 10px!important;">
                                             <input type="text" wire:model="honorTitle.two" placeholder="Enter Title" id="" class="form-control" style="border-color: transparent;">
                                             <div class="form-group evid-ctn mt-2" style="border-color: transparent!important;">
                                                  <label for="pocFile2" style="border-color: transparent!important;"><img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt=""> </label>
                                                  <input type="file" id="pocFile2" wire:model="honorFile.two" class="form-control default-input d-none" multiple>
                                             </div>
                                        </div>
                                        <div id="pocFile-ctn2"></div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                        <div class="d-flex align-items-center justify-content-between honor-ctn mb-2" style="padding: 10px!important;padding-left: 0!important;padding-right: 10px!important;">
                                             <input type="text" wire:model="honorTitle.three" placeholder="Enter Title" id="" class="form-control" style="border-color: transparent;">
                                             <div class="form-group evid-ctn mt-2" style="border-color: transparent!important;">
                                                  <label for="pocFile3" style="border-color: transparent!important;"><img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt=""> </label>
                                                  <input type="file" id="pocFile3" wire:model="honorFile.three" class="form-control default-input d-none" multiple>
                                             </div>
                                        </div>
                                        <div id="pocFile-ctn3"></div>
                                   </div>
                              </div>
                                  <h5>Activities</h5>
                                  <div class="row">
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
                                  <h5>Volunteering</h5>
                                  <div class="row">
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
                                  <h5>Additional</h5>
                                  <div class="row">
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
                              </div>

                             
                         </div>

                         <!--Next and Previous Button-->
                         <div class="d-flex align-items-center justify-content-center gap-5 mt-5 mb-5">
                              <a href="/create-cred-show">
                                 <button type="button" class="cred-btn" id="prev-cred-btn"><i class="fa fa-arrow-left"></i></button>
                              </a>
                                <button type="submit" class="cred-btn" id="next-cred-btn">
                                      <span wire:loading.remove><i class="fa fa-arrow-right"></i>
                                      <span wire:loading wire:target="Credshow1" style="cursor: not-allowed">
                                          <i class="fa fa-spin fa-spinner"></i>&nbsp;...
                                      </span>
                                 </button>
                         </div>
                    </form>
               </div>
          </div>
          
    </div>



</div>
