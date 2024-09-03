<div>
    <div class="main-content">
        <div class="row">
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Intern Roles Created</p>
                          <h1 class="card-body">254</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Job Roles Created</p>
                          <h1 class="card-body">5487</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Internship Applications</p>
                          <h1 class="card-body">42,214</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Job Applications</p>
                          <h1 class="card-body">458</h1>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="col-12 mb-4">
            <div class="ckt-card curr-card">
                <div class="d-flex align-items-center flex-wrap justify-content-between mb-5">
                    <div>
                        <h5>Applications</h5>
                    </div>
                    <div class="chart-filter">
                        <div>
                            <select name="" id="" class="custom-select op-6">
                                <option value="">Weekly</option>
                                <option value="">Monthly</option>
                                <option value="">Yearly</option>
                            </select>
                        </div>
                        <div>
                            <img src="{{asset('employer-asset/asset/img/calender-img.png')}}" alt=""> &nbsp;
                            <input type="text" class="custom-select" style="width: 90px;" data-provide="datepicker" placeholder="Select dates">
                        </div>
                    </div>
                </div>
                    <canvas   id="jobInternChart"></canvas>
            </div>
         </div>
         <div class="col-lg-12 mb-4">
          <h5>Applicants</h5>
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
                         <th>Application Date </th>
                         <th>Type</th>
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
                                      <span> John Williams Doe</span>
                                  </div>
                              </div>

                         </td>
                         <td>Fullstack Developer</td>
                         <td>March 23, 2024 12:00PM </td>
                         <td><span class="live-badge success">Job</span></td>
                         <td><i class="fa fa-ellipsis-h"></i></td>
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
                                      <span> John Williams Doe</span>
                                  </div>
                              </div>

                         </td>
                         <td>Frontend Developer</td>
                         <td>March 23, 2024 12:00PM </td>
                         <td><span class="live-badge warning">Intern</span></td>
                         <td><i class="fa fa-ellipsis-h"></i></td>
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
                                      <span> John Williams Doe</span>
                                  </div>
                              </div>

                         </td>
                         <td>Fullstack Developer</td>
                         <td>March 23, 2024 12:00PM </td>
                         <td><span class="live-badge success">Job</span></td>
                         <td><i class="fa fa-ellipsis-h"></i></td>
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
                                      <span> John Williams Doe</span>
                                  </div>
                              </div>

                         </td>
                         <td>Frontend Developer</td>
                         <td>March 23, 2024 12:00PM </td>
                         <td><span class="live-badge warning">Intern</span></td>
                         <td><i class="fa fa-ellipsis-h"></i></td>
                    </tr>
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>
  
</div>
