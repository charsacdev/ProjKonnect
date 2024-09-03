<div>
    
     <div class="main-content">
          
          <div class="row">
               <div class="col-12">
                    <form id="create-credshow-form" wire:submit.prevent="Credshow2">
                         <div id="cred-tabs">
                              @if(session('error'))
                         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                              @elseif(session('success'))
                              <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                         @endif
                              <!---CRED SHOW STEP2-->
                              <div class="cred-tab"  wire:ignore.self>
                                   <div class="header-lg-ctn mb-5">
                                        <h2>Select Skills</h2>
                                        <div class="cred-progress-ctn" style="width:50%">
                                         <div class="cred-bar"></div>
                                        </div>
                                    </div>
                                   <div class="d-flex align-items-center justify-content-between">
                                        <h5>Skill</h5>
                                        <h5>Proficiency</h5>
                                   </div>
                                   <div id="skills">
                     
                                        @foreach($skills as $index => $skill)
                                             <div class="row mb-3">
                                                  <div class="col-7 col-md-5">
                                                       <div class="form-group">
                                                            <input type="text" wire:model="skills.{{ $index }}.skill" placeholder="Enter skill" class="form-control">
                                                       </div>
                                                  </div>
                                                  <div class="col-md-2 d-none d-md-block"></div>
                                                  <div class="col-5 col-md-5">
                                                       <div class="form-group">
                                                            <select wire:model="skills.{{ $index }}.level" class="form-control">
                                                            <option value="">Select Level</option>
                                                            <option value="Beginner">Beginner</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                            <option value="Advanced">Advanced</option>
                                                            <option value="Expert">Expert</option>
                                                            <option value="Master">Master</option>
                                                            </select>
                                                       </div>
                                                  </div>
                                             </div>
                                        @endforeach
                                   </div>
                                   <button wire:click="addSkill" type="button" class="new-discussion-btn">
                                        <img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt="icon"> Add skill
                                   </button>
                              </div>

                           
                         </div>

                         <!--Next and Previous Button-->
                         <div class="d-flex align-items-center justify-content-center gap-5 mt-5 mb-5">
                              <a href="/create-cred-show1">
                                 <button type="button" class="cred-btn" id="prev-cred-btn"><i class="fa fa-arrow-left"></i></button>
                              </a>
                                <button type="submit" class="cred-btn" id="next-cred-btn">
                                      <span wire:loading.remove><i class="fa fa-arrow-right"></i>
                                      <span wire:loading wire:target="Credshow2" style="cursor: not-allowed">
                                          <i class="fa fa-spin fa-spinner"></i>&nbsp;...
                                      </span>
                                 </button>
                         </div>
                    </form>
               </div>
          </div>
         
    </div>
</div>
