<div>
    <div class="main-content">
        <div class="row">
            <div class="col-lg-8 col-md-7 mb-4">
                <form action="" wire:submit.prevent="CreateInternShip">
                 <h6>Role</h6>
                 <div class="form-group mb-4">
                    <input type="text" wire:model="role" required placeholder="e.g. Junior Product Designer" id="" class="form-control custom">
                 </div>
                 <h6>Description</h6>
                 <div class="form-group mb-4">
                    <textarea wire:model="description" required class="form-control custom"  placeholder="Enter description" cols="30" rows="5"></textarea>
                 </div>

                 <div class="row">
                    <div class="col-sm-4 mb-4">
                        <h6>Stipend (eg. $10/week)</h6>
                        <div class="form-group">
                            <input type="number" required wire:model="earning" placeholder="e.g. $10" class="form-control custom">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <h6>Duration (eg. 6 weeks)</h6>
                        <div class="form-group">
                            <input type="number" required wire:model="duration" placeholder="e.g. 2weeks" class="form-control custom">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <h6>No of required applicants</h6>
                        <div class="form-group">
                            <input type="number" required wire:model="applicant" min="1"  class="form-control custom">
                        </div>
                    </div>
                 </div>
                 <h6>Skills required</h6>
                 
                 <div class="tag-container  w-100">
                    <div class="tags">
                     @foreach($parent['tags'] as $index => $tag)
                         <div class="tag" data-index="{{ $index }}">
                             {{ $tag }} &nbsp;
                             <span class="delete-tag cursor-p">
                                 <i class="fa fa-times-circle " onclick="tagClose(event)"></i>
                             </span>
                         </div>
                     @endforeach
                    </div>
                    <input type="text" class="input-tag" placeholder="Enter tag" wire:keydown.enter="addTag($event.target.value)" wire:keydown.comma="addTag($event.target.value)" />
                </div>

                 <div class="text-start mt-5">
                    
                    <button type="submit"  class="new-discussion-btn" id="publishCourseBtn"> 
                        <span wire:loading.remove>Create Internship</span>
                        <span wire:loading wire:target="CreateInternShip" style="cursor: not-allowed">
                            <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                        </span>
                    </button>
                 </div>
            </form>
        </div>
            <div class="col-lg-4 col-md-5 mb-4">
                 <div class="internship-card-sm">
                     <div class="text-start mb-5">
                        <h5>Recent Applications</h5>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     <div class="d-flex align-items-baseline justify-content-between mt-4">
                        <div class="d-flex align-items-start justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('employer-asset/asset/img/briefcase-icon.png')}}" />
                            </div>
                            <a href="/employer/internship-applicant">
                                <p class="company">Karl Max </p>
                                <p class="position text-orange"> Junior Product Designer </p>
                            </a>
                        </div>
                        <small class="duration op-6">2 days ago</small>
                     </div>
                     
                 </div>
            </div>
       </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
             <div class="modal-content">
                  <div class="modal-body rounded">
                    <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                        <img src="{{asset('employer-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
                    </div>
                       <h3 class="text-center mb-2">Success!</h3>
                      <div class="text-center mb-2">
                        You have successfully created a new intern role <h6 class="d-inline">Junior Product Designer</h6>
                      </div>
                        <a href="/employer/internship-connect" class="new-discussion-btn d-block text-center w-100 mb-2">Go Back</a>
                  </div>
             </div>
        </div>
    </div>

    <div class="modal fade" id="internRoleModal" tabindex="-1" aria-labelledby="internRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
             <div class="modal-content">
                  <div class="modal-body rounded">
                    <div class="intern-img">
                       <img src="{{asset('employer-asset/asset/img/briefcase-lg.png')}}" alt="">
                    </div>
                       <span class="d-block text-center text-orange mb-2">Intern Role</span>
                      <h5 class="text-center mb-4">Junior Product Designer</h5>
                      <div class="d-flex align-items-center justify-content-between gap-3 gap-md-5">
                          <a href="" class="new-discussion-btn light d-block text-center w-100 mb-2">View</a>
                          <button type="button" class="new-discussion-btn danger w-100 mb-2">Delete</button>

                      </div>
                  </div>
             </div>
        </div>
    </div>


</div>


<script>
    //Hide the Tag if not needed
    function tagClose(event) {
        const target = event.currentTarget; 
        const parentTag = target.closest('.tag'); 
        if (parentTag) {
            parentTag.remove();
        }
    }
</script>