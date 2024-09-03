<div>
    
    <div class="main-content">
        <div class="mb-4">
                <span class="g-heading">Draft Contract</span>
        </div>
        <form>
            <div class="row align-items-end">
            <div class="col-md-7 mb-4">

                <div id="contract-ctn">
                    <div class="form-group w-100">
                           <textarea name="" class="form-control border-0" placeholder="Enter contract terms" rows="10"></textarea>
                    </div>
                    <div id="signatories">
                        <div class="signate">
                            <span>John Karls Doe</span>
                            <span>(Employer)</span>
                        </div>
                        <div class="signate">
                            <span>Mary Doe</span>
                            <span>(Intern)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="form-group mb-4">
                    <h6>Employer Name</h6>
                    <input type="text" name="" value="John Karls Doe" class="form-control custom">
                </div>
                <div class="form-group mb-4">
                    <h6>Intern Name</h6>
                    <input type="text" name="" value="Mary Doe" class="form-control custom">
                </div>
                <div id="signature">
                    <div class="form-group evid-ctn">
                        <div class="proj-file-ctn"></div>
                        <label class="proj-label" ><span>Upload signature</span> <img src="{{asset('employer-asset/asset/img/upload-icon.png')}}" width="20px" alt=""> </label>
                        <input type="file"  name="files" class="form-control default-input off-screen proj-file">
                    </div>
                </div>
                <div class="text-end mt-4">
                    <button type="button" class="new-discussion-btn px-5" data-bs-toggle="modal"
                    data-bs-target="#successModal">Done</button>
                </div>
            </div>
            </div>
        </form>
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
                    You have successfully drated a contract for the Junior Product Designer Intern role between Karls Max (you) and Jane Doe.
                  </div>
                    <a href="/employer/internship-connect" class="new-discussion-btn d-block text-center w-100 mb-2">Go Home</a>
              </div>
         </div>
    </div>
</div>

</div>
