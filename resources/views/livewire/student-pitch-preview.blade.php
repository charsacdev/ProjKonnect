<div>
     @if($pitchUrlstatus==="pending" and Request::segment(3))
      <center class="mt-5">This Project Pitch has been unpublished.</center>
     @else
     <div class="main-content">
          <div class="row">
              <div class="col-12">
 
             <!--show user profile on external link-->
               @if(Request::segment(3))
               
                     <div class="d-flex justify-content-center">
                          <div class="cred-profile-img">
                               <img src="{{$profilephoto}}" class="img-fluid" alt="Profile picture">
                          </div>
                     </div>
                     <div class="d-flex justify-content-center">
                          <div class="cred-prev-header">
                               Project Pitch 
                          </div>
                     </div>
                @endif
 
                  <form id="project-pitch-form" wire:submit.prevent="CreatePitch">
                      <div class="row">
                          <!-- Pitch Title -->
                          <div class="col-md-6 mb-4">
                              <div class="form-group">
                                  <label for="">Pitch Title</label>
                                  <input type="text" class="form-control" wire:model="title" placeholder="Enter Pitch Title">
                                  @error('title') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Category/Industry Tags -->
                          <div class="col-md-6 mb-4">
                              <div class="form-group">
                                  <label for="">Category/Industry Tags</label>
                                  <input type="text" class="form-control" wire:model="categoryTags" placeholder="Enter Category/Industry Tags">
                                  @error('categoryTags') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Description -->
                          <div class="col-12 mb-4">
                              <div class="form-group">
                                  <label for="">Description</label>
                                  <textarea placeholder="Enter Description" class="form-control" wire:model="description" cols="30" rows="3"></textarea>
                                  @error('description') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Collaborative Invites -->
                          <div class="col-12 mb-4">
                              <div class="form-group">
                                  <label for="">Collaborative Invites (optional)</label>
                                  <input type="text" class="form-control" wire:model="collaborativeInvites" placeholder="Enter Collaborative invites">
                                  @error('collaborativeInvites') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Elevator Pitch -->
                          <div class="col-12 mb-4">
                              <div class="form-group">
                                  <label for="">Brief Elevator Pitch (concise summary)</label>
                                  <textarea placeholder="Enter Brief Elevator Pitch" class="form-control" wire:model="elevatorPitch" cols="30" rows="3"></textarea>
                                  @error('elevatorPitch') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Problem Statement -->
                          <div class="col-12 mb-4">
                              <div class="form-group">
                                  <label for="">Problem Statement</label>
                                  <textarea placeholder="Enter Problem Statement" class="form-control" wire:model="problemStatement" cols="30" rows="3"></textarea>
                                  @error('problemStatement') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Solution Overview -->
                          <div class="col-12 mb-4">
                              <div class="form-group">
                                  <label for="">Solution Overview</label>
                                  <textarea placeholder="Enter Solution Overview" class="form-control" wire:model="solutionOverview" cols="30" rows="3"></textarea>
                                  @error('solutionOverview') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                          </div>
  
                          <!-- Target Audience -->
                          <div class="col-md-6 mb-4">
                              <label for="">Target Audience/Marketing Segment</label>
                              <textarea placeholder="Enter Target Audience or Market Segment" class="form-control" wire:model="targetAudience" cols="30" rows="5"></textarea>
                              @error('targetAudience') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Key Features -->
                          <div class="col-md-6 mb-4">
                              <label for="">Key Features</label>
                              <textarea placeholder="Enter Key Features" class="form-control" wire:model="keyFeatures" cols="30" rows="5"></textarea>
                              @error('keyFeatures') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Benefits/Impacts -->
                          <div class="col-md-6 mb-4">
                              <label for="">Benefits/Impacts</label>
                              <textarea placeholder="Enter Benefits/impacts" class="form-control" wire:model="benefitsImpacts" cols="30" rows="5"></textarea>
                              @error('benefitsImpacts') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Proof of Concept Files -->
                          <div class="col-md-6 mb-4" >
                              <div class="input-ctn border h-100 p-3" wire:ignore>
                                  <h6>Proof of Concept</h6>
                                  <div id="pocFile-ctn"></div>
                                  @if(!Request::segment(3))
                                    <div class="form-group evid-ctn mt-2">
                                         <label for="pocFile"><span>Upload files</span> <img src="{{asset('student-asset/asset/img/upload-icon.png')}}" width="20px" alt=""> </label>
                                         <input type="file" id="pocFile" wire:model="pocFiles" class="form-control default-input d-none">
                                    </div>
                                    @if(!empty($pocDetailFile))
                                         <p class="p-2"><a href="{{$pocDetailFile}}" target="_blank">View File</a></p>
                                    @endif
                                  @else
                                  @if(!empty($pocDetailFile))
                                         <p class="p-2"><a href="{{$pocDetailFile}}" target="_blank">View File</a></p>
                                    @else
                                      No File
                                    @endif
                                  @endif
                               </div>
                              @error('pocFiles') <p class="text-danger">{{$message}}</p> @enderror
                             
                          </div>
  
                          <!-- Market Research/Trends -->
                          <h5>Market Potential</h5>
                          <div class="col-md-6 mb-4">
                              <label for="">Market Research/Trends</label>
                              <textarea placeholder="Enter Market Research or Trends" class="form-control" wire:model="marketResearch" cols="30" rows="5"></textarea>
                              @error('marketResearch') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Competitive Analysis -->
                          <div class="col-md-6 mb-4">
                              <label for="">Competitive Analysis</label>
                              <textarea placeholder="Enter Competitive Analysis" class="form-control" wire:model="competitiveAnalysis" cols="30" rows="5"></textarea>
                              @error('competitiveAnalysis') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Implementation Plan -->
                          <h5>Implementation Strategy</h5>
                          <div class="col-md-6 mb-4">
                              <label for="">Plan for Implementation</label>
                              <textarea placeholder="Enter Plan for Implementation" class="form-control" wire:model="implementationPlan" cols="30" rows="5"></textarea>
                              @error('implementationPlan') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Partnerships -->
                          <div class="col-md-6 mb-4">
                              <label for="">Partnerships or Collaborations</label>
                              <textarea placeholder="Enter Partnerships or Collaborations" class="form-control" wire:model="partnerships" cols="30" rows="5"></textarea>
                              @error('partnerships') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Scalability Plan -->
                          <div class="col-12 mb-4">
                              <label for="">Scalability Plan</label>
                              <textarea placeholder="Enter Scalability Plan (how your project can be expanded or replicated)" class="form-control" wire:model="scalabilityPlan" cols="30" rows="5"></textarea>
                              @error('scalabilityPlan') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Reviewer Help -->
                          <div class="col-md-6 mb-4">
                              <h5 class="mb-3">How can the Reviewer help?</h5>
                              <textarea class="form-control" wire:model="reviewerHelp" cols="30" rows="5"></textarea>
                              @error('reviewerHelp') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Additional Comments -->
                          <div class="col-md-6 mb-4">
                              <h5>Additional comments or information</h5>
                              <textarea class="form-control" wire:model="additionalComments" cols="30" rows="5"></textarea>
                              @error('additionalComments') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
  
                          <!-- Attachments -->
                          <div class="col-12 mb-4">
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                  <h5>Attachments</h5>
                                  <div>
                                    @if(!Request::segment(3))
                                         <button wire:click="addAttachment" type="button" class="plus-btn" id="new-attachment-btn">
                                              <img src="{{asset('student-asset/asset/img/plus-dark-icon.png')}}" alt="icon">
                                         </button>
                                      @endif
                                  </div>
                              </div>
                              <div id="pitch-attachment-ctn">
                               @foreach($AttachmentsDetailsFile as $index => $attachment)
                               <div class="pitch-attachment mb-2">
                                   <div class="row align-items-center">
                                       <div class="col-sm-6">
                                           <div class="attachment-description">
                                               <span class="op-6">Attachment {{ $index + 1 }}</span>
                                               <h6>Title</h6>
                                               <div class="pitch-type">Pitch Video</div>
                                           </div>
                                       </div>
                                       <div class="col-sm-6">
                                           <div class="form-group evid-ctn" wire:ignore>
                                              @if(!Request::segment(3))
                                               <label class="attaFileLabel">
                                                   <span>Upload Attachment</span>
                                                   <img src="{{ asset('student-asset/asset/img/upload-icon.png') }}" alt="">
                                               </label>
                                               <input type="file" wire:model="attachments.{{ $index }}" class="form-control default-input attaFile off-screen">
                                             @else
                                               @if(isset($AttachmentsDetailsFile[$index]))
                                                   <p class="px-3">
                                                        <a href="{{ $attachment }}" target="_blank">
                                                        View File&nbsp;<i class="fa fa-file" aria-hidden="true"></i></a>
                                                   </p>
                                                @endif  
                                             @endif
                                           </div>
                                           @error('attachments.' . $index) <p class="text-danger">{{ $message }}</p> @enderror
                                       </div>
                                       @if(!Request::segment(3))
                                         @if(isset($AttachmentsDetailsFile[$index]))
                                              <p class="px-3"><a href="{{ $attachment }}" target="_blank">View File</a></p>
                                         @endif
                                       @endif
                                   </div>
                               </div>
                               @if(!Request::segment(3))
                                 <button type="button" wire:click="removeAttachment({{ $index }})" class="btn btn-danger mb-4">Remove</button>
                               @endif
                          @endforeach
                           
                          </div>
                      </div>
 
                      <!---Error Message--> 
                      @if(session('error'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                      @elseif(session('success'))
                        <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                      @endif
  
                      @if(!Request::segment(3))
                          <!-- Submit Button -->
                          <div class="col-12">
                               <div class="d-flex align-items-center justify-content-between">
                               <button type="button" wire:click="publishPitch" wire:loading.attr="disabled" class="new-discussion-btn">
                                    <span wire:loading.remove><img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt=""> Publish</span>
                                    <div wire:loading class="loading-indicator">
                                         <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                    </div>
                               </button>
                               
                               <button type="button" wire:click="saveAsDraft" wire:loading.attr="disabled" class="new-discussion-btn">
                                    <span wire:loading.remove><img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt=""> Save as drafts</span>
                                    <div wire:loading class="loading-indicator">
                                    <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                    </div>
                               </button>
                               </div>
                          </div>
                      @endif
 
                  </form>
              </div>
          </div>
      </div>
     @endif
     
 </div>


    