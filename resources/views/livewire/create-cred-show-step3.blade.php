<div>
    
     <div class="main-content">
          <div class="row">
               <div class="col-12">
                    <form id="create-credshow-form" wire:submit.prevent="Credshow3">
                         <div id="cred-tabs">
                         
                              <!---CRED SHOW STEP3-->
                              <div class="cred-tab" wire:ignore.self>
                                   <div class="header-lg-ctn mb-5">
                                        <h2>Showcase Projects</h2>
                                        <div class="cred-progress-ctn" style="width:75% !important">
                                         <div class="cred-bar" style="width:75% !important"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="fw-bold">Academic Projects</h5>
                                            <button type="button" class="plus-btn" wire:click="addProject('academic')">
                                                <img src="{{asset('student-asset/asset/img/plus-dark-icon.png')}}" alt="icon">
                                            </button>
                                        </div>
                                        @foreach($academicProjects as $index => $project)
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label>Project Name</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Project Name" wire:model="academicProjects.{{ $index }}.name" class="form-control">
                                                    @error('academicProjects.' . $index . '.name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label>Project Duration</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Project Duration" wire:model="academicProjects.{{ $index }}.duration" class="form-control">
                                                    @error('academicProjects.' . $index . '.duration') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                               <label>Project Summary</label>
                                                <div class="form-group">
                                                    <textarea placeholder="Project Summary" wire:model="academicProjects.{{ $index }}.summary" rows="4" class="form-control h-100"></textarea>
                                                    @error('academicProjects.' . $index . '.summary') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                Project Files
                                                <div class="input-ctn border h-100 p-3" wire:ignore>
                                                    <div class="form-group evid-ctn mt-2">
                                                        <label class="proj-label">
                                                            <span>Upload files</span>
                                                            <img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt="">
                                                        </label>
                                                        <input type="file" wire:model="academicProjects.{{ $index }}.file" class="form-control default-input off-screen proj-file">
                                                       </div>
                                                       <div class="proj-file-ctn"></div>
                                                   </div>
                                                   
                                                   @error('academicProjects.' . $index . '.file') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-12 mb-4">
                                                <button type="button" wire:click="removeProject('academic', {{ $index }})" class="btn btn-danger mt-2">Remove Project</button>
                                            </div>
                                        </div>
                                        @endforeach


                                        <!-- Professional Projects Section -->
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                             <h5 class="fw-bold">Professional Projects</h5>
                                             <button type="button" class="plus-btn" wire:click="addProject('professional')">
                                             <img src="{{asset('student-asset/asset/img/plus-dark-icon.png')}}" alt="icon">
                                             </button>
                                        </div>
                                        @foreach($professionalProjects as $index => $project)
                                        <div class="row mb-4">
                                             <div class="col-md-6 mb-4">
                                                  <label>Project Name</label>
                                                  <div class="form-group">
                                                       <input type="text" placeholder="Project Name" wire:model="professionalProjects.{{ $index }}.name" class="form-control">
                                                       @error('professionalProjects.' . $index . '.name') <span class="text-danger">{{ $message }}</span> @enderror
                                                  </div>
                                             </div>
                                             <div class="col-md-6 mb-4">
                                                  <label>Project Duration</label>
                                                  <div class="form-group">
                                                       <input type="text" placeholder="Project Duration" wire:model="professionalProjects.{{ $index }}.duration" class="form-control">
                                                       @error('professionalProjects.' . $index . '.duration') <span class="text-danger">{{ $message }}</span> @enderror
                                                  </div>
                                             </div>
                                             <div class="col-md-6 mb-4">
                                                  <label>Project Summary</label>
                                                  <div class="form-group">
                                                       <textarea placeholder="Project Summary" wire:model="professionalProjects.{{ $index }}.summary" rows="4" class="form-control h-100"></textarea>
                                                       @error('professionalProjects.' . $index . '.summary') <span class="text-danger">{{ $message }}</span> @enderror
                                                  </div>
                                             </div>
                                             <div class="col-md-6 mb-4">
                                                  Project Files
                                                  <div class="input-ctn border h-100 p-3" wire:ignore>
                                                       <div class="form-group evid-ctn mt-2">
                                                            <label class="proj-label">
                                                                 <span>Upload files</span>
                                                                 <img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt="">
                                                            </label>
                                                            <input type="file" wire:model="professionalProjects.{{ $index }}.file" class="form-control default-input off-screen proj-file">
                                                       </div>
                                                       <div class="proj-file-ctn"></div>
                                                  </div>
                                                  
                                                  @error('professionalProjects.' . $index . '.file') <span class="text-danger">{{ $message }}</span> @enderror
                                             </div>
                                             <div class="col-12">
                                             <button type="button" wire:click="removeProject('professional', {{ $index }})" class="btn btn-danger mt-2">Remove Project</button>
                                             </div>
                                        </div>
                                        @endforeach


                                          <!-- Personal Projects Section -->
                                             <div class="d-flex align-items-center justify-content-between mb-3">
                                                  <h5 class="fw-bold">Personal Projects</h5>
                                                  <button type="button" class="plus-btn" wire:click="addProject('personal')">
                                                  <img src="{{asset('student-asset/asset/img/plus-dark-icon.png')}}" alt="icon">
                                                  </button>
                                             </div>
                                             @foreach($personalProjects as $index => $project)
                                             <div class="row mb-4">
                                                  <div class="col-md-6 mb-4">
                                                       <label>Project Name</label>
                                                       <div class="form-group">
                                                            <input type="text" placeholder="Project Name" wire:model="personalProjects.{{ $index }}.name" class="form-control">
                                                            @error('personalProjects.' . $index . '.name') <span class="text-danger">{{ $message }}</span> @enderror
                                                       </div>
                                                  </div>
                                                  <div class="col-md-6 mb-4">
                                                       <label>Project Duration</label>
                                                       <div class="form-group">
                                                            <input type="text" placeholder="Project Duration" wire:model="personalProjects.{{ $index }}.duration" class="form-control">
                                                            @error('personalProjects.' . $index . '.duration') <span class="text-danger">{{ $message }}</span> @enderror
                                                       </div>
                                                  </div>
                                                  <div class="col-md-6 mb-4">
                                                       <label>Project Summary</label>
                                                       <div class="form-group">
                                                            <textarea placeholder="Project Summary" wire:model="personalProjects.{{ $index }}.summary" rows="4" class="form-control h-100"></textarea>
                                                            @error('personalProjects.' . $index . '.summary') <span class="text-danger">{{ $message }}</span> @enderror
                                                       </div>
                                                  </div>
                                                  <div class="col-md-6 mb-4">
                                                       <label>Project Files</label>
                                                       <div class="input-ctn border h-100 p-3" wire:ignore>
                                                            <div class="form-group evid-ctn mt-2">
                                                                 <label class="proj-label">
                                                                      <span>Upload files</span>
                                                                      <img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt="">
                                                                 </label>
                                                                 <input type="file" wire:model="personalProjects.{{ $index }}.file" class="form-control default-input off-screen proj-file">
                                                                 <div class="proj-file-ctn"></div>
                                                            </div>  
                                                       </div>
                                                       @error('personalProjects.' . $index . '.file') <span class="text-danger">{{ $message }}</span> @enderror
                                                            
                                                  </div>
                                                  <div class="col-12">
                                                  <button type="button" wire:click="removeProject('personal', {{ $index }})" class="btn btn-danger mt-2">Remove Project</button>
                                                  </div>
                                             </div>
                                             @endforeach

                                    
                                    </div>
                              </div>
                         </div>
                          <!--Next and Previous Button-->
                          <div class="d-flex align-items-center justify-content-center gap-5 mt-5 mb-5">
                              <a href="/create-cred-show1">
                                 <button type="button" class="cred-btn" id="prev-cred-btn"><i class="fa fa-arrow-left"></i></button>
                              </a>
                                <button type="submit" class="cred-btn" id="next-cred-btn">
                                      <span wire:loading.remove><i class="fa fa-arrow-right"></i>
                                      <span wire:loading wire:target="Credshow3" style="cursor: not-allowed">
                                          <i class="fa fa-spin fa-spinner"></i>&nbsp;...
                                      </span>
                                 </button>
                         </div>
                    </form>
               </div>
          </div>
   </div>
</div>
