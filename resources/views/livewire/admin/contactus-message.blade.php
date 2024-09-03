<div>
    
    <div class="main-content">
        <!--message response-->
        @if(session('error'))
        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif

        <div class="row">
         <div class="col-lg-12 mb-4">
           <form action="" wire:submit.prevent="SendMessage">
               <div class="row">
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Full  name</h5>
                           <input type="text" wire:model="name" required id="" value="John Doe" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Email</h5>
                           <input type="text" wire:model="email" required id="" value="johndoe@domain.com" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Phone Number</h5>
                           <input type="text" wire:model="phone" required id="" value="+234 89483 83983" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Inquiry Type</h5>
                           <input type="text" wire:model="inquiry" required id="" value="Profile update and verification" class="form-control custom">
                       </div>
                   </div>

                   <div class="col-12">
                       <div class="form-group">
                           <h5>Inquiry</h5>
                           <textarea wire:model="message" id="" required rows="5" class="form-control custom">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque culpa, aspernatur hic alias natus qui praesentium voluptate officiis quam veritatis.</textarea>
                       </div>
                   </div>
                   <div class="hr-dotted-line"></div>
                   <div class="col-12 mb-4">
                       <div class="form-group">
                        <h5>Answer</h5>
                            <textarea wire:model="answer" required rows="5" placeholder="Type answer here..." class="form-control custom" id=""></textarea>
                       </div>
                   </div>
               </div>
               <div class="d-flex align-items-center justify-content-between">
                   <a href="contact-us" class="px-sm-5 text-center new-discussion-btn bg-danger">Discard</a>
                   <button type="submit" class="text-center new-discussion-btn px-sm-5" >
                    <span wire:loading.remove>Send Message</span>
                            <span wire:loading wire:target="SendMessage" style="cursor: not-allowed">
                                <i class="fa fa-spin fa-spinner"></i>&nbsp;Sending...
                            </span>
                   </button>
               </div>
           </form>
          </div>
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
                 <h4 class="text-center mb-5">Profile Update & verification</h4>
                 <div class="d-flex align-items-center justify-content-between gap-2 flex-column">
                      <a href="contact-us-message" type="button" class="new-discussion-btn text-center w-100 mb-2">View</a>
                      <button type="button" data-bs-dismiss="modal"  class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >Back</button>
                 </div>
               </div>
          </div>
     </div>
 </div>

</div>
