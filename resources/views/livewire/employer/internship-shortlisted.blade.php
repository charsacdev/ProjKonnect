<div>
    <div class="main-content">
        <div class="row">
          
         <div class="col-12 mb-5">
            <h4>Shortlisted Applicants</h4>
         </div>
         <div class="col-lg-12 mb-4">
          <div class="table-responsive">
               <table class="table" id="livelearn-table">
                    <thead>
                         <th>
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="apt_ful">
                                      <span> Name</span>
                                  </div>
                              </div>
                         </th>
                         <th>Role</th>
                         <th>Status</th>
                         <th></th>
                    </thead>
                   <tbody>
                    <tr>
                        <td  data-bs-toggle="modal"
                                data-bs-target="#interviewedModal" class="cursor-p">
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="td-img">
                                      <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="">
                                  </div>
                                  <div class="apt_ful">
                                      <span> Mary Williams Johnson</span>
                                  </div>
                              </div>

                         </td>
                         <td>Junior Product Designer</td>
                         <td><span class="live-badge primary">Interviewed</span></td>
                         <td data-bs-toggle="modal"
                         data-bs-target="#interviewedModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                    </tr>
                    <tr>
                        <td  data-bs-toggle="modal"
                                data-bs-target="#selectedModal" class="cursor-p">
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="td-img">
                                      <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="">
                                  </div>
                                  <div class="apt_ful">
                                      <span> Mary Williams Johnson</span>
                                  </div>
                              </div>

                         </td>
                         <td>Junior Product Designer</td>
                         <td><span class="live-badge success">Selected</span></td>
                         <td data-bs-toggle="modal"
                         data-bs-target="#selectedModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                    </tr>
                    <tr>
                        <td  data-bs-toggle="modal"
                                data-bs-target="#notInterviewedModal" class="cursor-p">
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="td-img">
                                      <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="">
                                  </div>
                                  <div class="apt_ful">
                                      <span> Mary Williams Johnson</span>
                                  </div>
                              </div>

                         </td>
                         <td>Junior Product Designer</td>
                         <td><span class="live-badge warning">Not Interviewed</span></td>
                         <td data-bs-toggle="modal"
                         data-bs-target="#notInterviewedModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                    </tr>
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>




<div class="modal fade" id="selectedModal" tabindex="-1" aria-labelledby="selectedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                    <img src="{{asset('employer-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
                </div>
                   <h3 class="text-center mb-2">Success!</h3>
                  <div class="text-center mb-3">
                    You have successfully selected <h6 class="d-inline">Mary Doe</h6> for the role of a <h6 class="d-inline">Junior Product Designer Intern</h6>.
                  </div>
                    <a href="/employer/internship-contract" class="new-discussion-btn text-center d-block w-100 mb-2">Draft Contract</a>
                    <button type="button" data-bs-dismiss="modal" class="new-discussion-btn outline-blue  text-center w-100 mb-2">Go Back</a>
              </div>
         </div>
    </div>
</div>

<div class="modal fade" id="notInterviewedModal" tabindex="-1" aria-labelledby="notInterviewedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                    <div class="student-img">
                        <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="icon">
                    </div>
                </div>
                <h6 class="text-center mb-2">Mary Williams</h6>
                <h5 class="text-center mb-5">Junior Product Designer</h5>
                    <button data-bs-toggle="modal"
                        data-bs-target="#interviewModal" type="button" class="new-discussion-btn text-center w-100 mb-2">Schedule Interview</button>
                    <button type="button" class="new-discussion-btn outline-danger w-100 mb-2" data-bs-dismiss="modal">Cancel</button>
              </div>
         </div>
    </div>
</div>

<div class="modal fade" id="interviewModal" tabindex="-1" aria-labelledby="interviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                <h5 class="text-center mt-1 mb-5">Schedule Interview</h5>
                <div class="row">
                    <div class="col-5 mb-4">
                        <div class="form-group">
                            <h6>Date</h6>
                            <input type="text" name="" placeholder="e.g. 24th March, 2024" class="form-control custom">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <h6>Time</h6>
                            <input type="text" name="" placeholder="e.g. 12:00PM" class="form-control custom">
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <h6>Duration</h6>
                            <input type="text" name="" placeholder="e.g. 1 hour" class="form-control custom">
                        </div>
                    </div>
                </div>
               
                <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="new-discussion-btn outline-danger mb-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="new-discussion-btn text-center mb-2" data-bs-toggle="modal"
                    data-bs-target="#successModal">Schedule</button>
                </div>
              </div>
         </div>
    </div>
</div>

<div class="modal fade" id="interviewedModal" tabindex="-1" aria-labelledby="interviewedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                    <div class="student-img">
                        <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="icon">
                    </div>
                </div>
                <h6 class="text-center mb-2">Mary Williams</h6>
                <h5 class="text-center mb-5">Junior Product Designer</h5>
                <div class="d-flex align-items-center flex-column gap-2">
                    <button type="button" class="new-discussion-btn w-100 text-center d-block" data-bs-toggle="modal"
                    data-bs-target="#selectedModal">Select Candidate</button>
                    <button data-bs-dismiss="modal" type="button" class="new-discussion-btn btn-danger text-center w-100 mb-2">Reject Candidate</a>
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
                    <img src="{{asset('employer-asset/asset/img/success-star-checked.png')}}" width="40px" alt="icon">
                </div>
                   <h3 class="text-center mb-2">Success!</h3>
                  <div class="text-center mb-2">
                    You have successfully scheduled an interview.
                  </div>
                    <button type="button" class="new-discussion-btn w-100 mb-2" data-bs-dismiss="modal">Go Back</button>
              </div>
         </div>
    </div>
</div>

</div>
