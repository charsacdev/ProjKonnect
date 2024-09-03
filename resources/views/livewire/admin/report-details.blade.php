<div>
    <div class="main-content">
        <div class="row">
         <div class="col-lg-12 mb-4">
           <form action="">
               <div class="row">
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Student name</h5>
                           <input type="text" name="" id="" value="John Doe" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Student email</h5>
                           <input type="text" name="" id="" value="johndoe@domain.com" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Student Phone Number</h5>
                           <input type="text" name="" id="" value="+234 89483 83983" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-3 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Report reason</h5>
                           <input type="text" name="" id="" value="Out of content" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-4 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Proguide name</h5>
                           <input type="text" name="" id="" value="Lacky Williams" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-4 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Proguide email</h5>
                           <input type="text" name="" id="" value="johndoe@domain.com" class="form-control custom">
                       </div>
                   </div>
                   <div class="col-lg-4 col-sm-6 mb-4">
                       <div class="form-group">
                           <h5>Proguide Phone Number</h5>
                           <input type="text" name="" id="" value="+234 89483 83983" class="form-control custom">
                       </div>
                   </div>

                   <div class="col-12">
                       <div class="form-group">
                           <h5>Report body</h5>
                           <textarea name="" id="" rows="5" class="form-control custom">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque culpa, aspernatur hic alias natus qui praesentium voluptate officiis quam veritatis.</textarea>
                       </div>
                   </div>
                   <div class="hr-dotted-line"></div>
                   <div class="col-12 mb-4">
                       <div class="form-group">
                        <h5>Reply Student</h5>
                            <textarea name="" rows="5" placeholder="Type reply here..." class="form-control custom" id=""></textarea>
                       </div>
                   </div>
               </div>
               <div class="d-flex align-items-center justify-content-between">
                   <a href="reports" class="px-sm-5 text-center new-discussion-btn bg-danger">Discard</a>
                   <button type="submit" class="text-center new-discussion-btn px-sm-5" >Send</button>
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
                      <a href="reports" type="button" class="new-discussion-btn text-center w-100 mb-2">View</a>
                      <button type="button" data-bs-dismiss="modal"  class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >Back</button>
                 </div>
               </div>
          </div>
     </div>
 </div>
</div>
