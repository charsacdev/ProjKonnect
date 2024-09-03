<div>
    
    <div class="main-content">
         <!--error message-->
         @if(session('error'))
         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
             @elseif(session('success'))
             <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
         @endif
         
        <div class="row">
           <form action="" wire:submit.prevent="UpdateFaq">
               <div class="row">
                   <div class="col-12 mb-4">
                       <div class="form-group">
                        <h5>Question</h5>
                           <input type="text" required class="form-control custom " wire:model="title">
                       </div>
                   </div>
                   <div class="col-12 mb-4">
                       <div class="form-group">
                        <h5>Answer</h5>
                            <textarea wire:model="content" required rows="5" placeholder="Type answer here..." class="form-control custom" id=""> </textarea>
                       </div>
                   </div>
               </div>
               <div class="d-flex align-items-center justify-content-between">
                   <a href="content-management" class="px-sm-5 text-center new-discussion-btn bg-danger">Discard</a>
                   <button type="submit" class="text-center new-discussion-btn px-sm-5" >
                    <span wire:loading.remove>Save</span>
                    <span wire:loading wire:target="UpdateFaq" style="cursor: not-allowed">
                        Processing...
                    </span>
                   </button>
               </div>
           </form>
          </div>
        </div>


        <!--MODAL-->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                 <div class="modal-content">
                      <div class="modal-body rounded">
                        <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                            <img src="{{asset('admin-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
                        </div>
                           <h3 class="text-center mb-2">Success!</h3>
                          <div class="text-center mb-2">
                            You have successfully deactivated <h6 class="d-inline">Williams Michael</h6>
                          </div>
                            <button type="button" class="new-discussion-btn w-100 mb-2" data-bs-dismiss="modal">Go Back</button>
                      </div>
                 </div>
            </div>
        </div>
    
        <div class="modal fade" id="internModal" tabindex="-1" aria-labelledby="internModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered">
              <div class="modal-content">
                   <div class="modal-body rounded">
                     <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                         <div class="student-img">
                             <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="icon">
                         </div>
                     </div>
                     <h6 class="text-center mb-2">Mary Williams</h6>
                     <h5 class="text-center mb-5">Author</h5>
                     <div class="d-flex align-items-center justify-content-between gap-4">
                         <button type="button" data-bs-toggle="modal"
                         data-bs-target="#successModal" class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >Deactivate</button>
                         <a href="javascript:;" type="button" class="new-discussion-btn text-center w-100 mb-2">View</a>
                     </div>
                   </div>
              </div>
         </div>
     </div>
</div>
