<div>
    
    <div class="main-content">
         <!--error message-->
         @if(session('error'))
         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
             @elseif(session('success'))
             <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
         @endif

        <div class="row">
         <div class="col-lg-12 mb-4">
           <form action="" wire:submit.prevent="SendMessage">
               <div class="row">
                   <div class="col-12 mb-4">
                       <div class="form-group">
                           <h5>Recipients</h5>
                           <select wire:model="addresses" id="" required class="custom-select-auto">
                               <option value="all">To address associated with this platform</option>
                               <option value="student">Student</option>
                               <option value="student">Proguide</option>
                               <option value="employer">Employer</option>
                           </select>
                       </div>
                   </div>
                  
                   <div class="hr-dotted-line"></div>
                   <div class="col-12 mb-4">
                       <div class="form-group">
                        <h5>Content</h5>
                            <textarea wire:model="content" required rows="5" placeholder="Type answer here..." class="form-control custom" id=""></textarea>
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

</div>
