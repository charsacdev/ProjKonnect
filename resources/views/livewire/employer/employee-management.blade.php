<div>
    
    <div class="main-content">
        <div class="row">
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Employees</p>
                          <h1 class="card-body">14</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Current Employees</p>
                          <h1 class="card-body">104</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Formal Empolyees</p>
                          <h1 class="card-body">1042</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head"><i class="fa fa-ellipsis-h"></i></p>
                          <h1 class="card-body">1042</h1>
                      </div>
                  </div>
              </div>
          </div>
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
                                      <span> Employee Name</span>
                                  </div>
                              </div>
                         </th>
                         <th>Employee Role</th>
                         <th>Start Date</th>
                         <th>Tasks Assigned</th>
                         <th>Tasks Delivered</th>
                         <th>Status</th>
                         <th></th>
                    </thead>
                   <tbody>
                    <tr>
                         <td>
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="apt_ful">
                                      <span> Jane Williams</span>
                                  </div>
                              </div>

                         </td>
                         <td>Senior Product Manager</td>
                         <td>March 23, 2024 12:00PM</td>
                         <td>145</td>
                         <td>125</td>
                         <td><span class="live-badge success">Ongoing</span></td>
                         <td data-bs-toggle="modal"
                         data-bs-target="#internModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                    </tr>
                    <tr>
                         <td>
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="apt_ful">
                                      <span> Jane Williams</span>
                                  </div>
                              </div>

                         </td>
                         <td>Senior Product Manager</td>
                         <td>March 23, 2024 12:00PM</td>
                         <td>145</td>
                         <td>125</td>
                         <td><span class="live-badge success">Ongoing</span></td>
                         <td data-bs-toggle="modal"
                         data-bs-target="#internModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                    </tr>
                    <tr>
                         <td>
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="apt_ful">
                                      <span> Jane Williams</span>
                                  </div>
                              </div>

                         </td>
                         <td>Senior Product Manager</td>
                         <td>March 23, 2024 12:00PM</td>
                         <td>145</td>
                         <td>125</td>
                         <td><span class="live-badge danger">Ended</span></td>
                         <td data-bs-toggle="modal"
                         data-bs-target="#internModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                    </tr>
                   </tbody>
               </table>
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
                            <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="icon">
                        </div>
                    </div>
                    <h6 class="text-center mb-2">Mary Williams</h6>
                    <h5 class="text-center mb-5">Junior Product Designer</h5>
                    <div class="d-flex align-items-center flex-column gap-2">
                        <a href="/employer/employee-management-details" class="new-discussion-btn w-100 text-center d-block">View</a>
                        <a href="/employer/message" type="button" class="new-discussion-btn btn-warning text-center w-100 mb-2">Send Messge</a>
                    </div>
                  </div>
             </div>
        </div>
    </div>

</div>
