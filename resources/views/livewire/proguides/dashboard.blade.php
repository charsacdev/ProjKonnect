<div>
    
    <div class="main-content">
        <div class="row">
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Upcoming Live Sessions</p>
                          <h1 class="card-body">{{$upcomingsession}}</h1>
                          <a href="livelearn" class="card-foot">Click here to view more >>></a>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Students</p>
                          <h1 class="card-body">{{$totalstudent}}</h1>
                          <a href="student-progress" class="card-foot">Click here to view more >>></a>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Earnings</p>
                          <h1 class="card-body">${{$totalearnings}}</h1>
                          <a href="payments" class="card-foot">Click here to view more >>></a>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Course Uploads</p>
                          <h1 class="card-body">{{$totalcourse}}</h1>
                          <a href="course" class="card-foot">Click here to view more >>></a>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="col-12 mb-4">
          <div class="row align-items-stretch">
              <div class="col-md-7 mb-3">
                  <div class="ckt-card curr-card">
                      <div class="d-flex align-items-center justify-content-between flex-wrap mb-5">
                          <div>
                              <h5>Student</h5>
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
                                  <img src="{{asset('proguide-asset/asset/img/calender-img.png')}}" alt=""> &nbsp;
                                  <input type="text" class="custom-select" style="width: 90px;" data-provide="datepicker" placeholder="Select dates">
                              </div>
                          </div>
                      </div>
                      <canvas id="studentChart"></canvas>
                  </div>

              </div>
              <div class="col-md-5 mb-3">
                  <div class="ckt-card curr-card">
                     <div class="d-flex flex-wrap align-items-center justify-content-between">
                      <span class="text-primary">Top Performing Stdents</span>
                      <select name="" id="" class="border-0 custom-select w-50 text-primary">
                          <option value="">Human Computer Interface</option>
                          <option value="">Introduction to Computer Programming</option>
                      </select>
                     </div>
                      <div class="lead-card">
                          <div class="d-flex align-items-center justify-content-start gap-2">
                              <div class="img">
                                  <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                              </div>
                              <h2 class="g-sm-heading">John Doe</h2>
                          </div>
                          <div class="g-sm-heading pts">3999pts</div>
                      </div>
                      <div class="lead-card">
                          <div class="d-flex align-items-center justify-content-start gap-2">
                              <div class="img">
                                  <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                              </div>
                              <h2 class="g-sm-heading">John Doe</h2>
                          </div>
                          <div class="g-sm-heading pts">3999pts</div>
                      </div>
                      <div class="lead-card">
                          <div class="d-flex align-items-center justify-content-start gap-2">
                              <div class="img">
                                  <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                              </div>
                              <h2 class="g-sm-heading">John Doe</h2>
                          </div>
                          <div class="g-sm-heading pts">3999pts</div>
                      </div>
                      <div class="lead-card">
                          <div class="d-flex align-items-center justify-content-start gap-2">
                              <div class="img">
                                  <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                              </div>
                              <h2 class="g-sm-heading">John Doe</h2>
                          </div>
                          <div class="g-sm-heading pts">3999pts</div>
                      </div>
                    </div>
              </div>
          </div>
         </div>
         <div class="col-lg-12 mb-4">
          <h5>Enrollments</h5>
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
                                      <span> Course</span>
                                  </div>
                              </div>
                         </th>
                         <th>Enrolls</th>
                         <th>Earnings </th>
                         <th>Course Status</th>
                         <th>Course Price</th>
                    </thead>
                   <tbody>
                    @foreach ($enrollment as $item)
                        @foreach($item->course as $items)
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
                                            <span>{{$items->course_title}}</span>
                                        </div>
                                    </div>

                                </td>
                                <td>{{$items->course_students}}</td>
                                <td>${{$items->course_revenue}}</td>
                                 <td>
                                    @if($items->course_status==="approved")
                                        <span class="live-badge success">{{$items->course_status}}</span>
                                    @else
                                        <span class="live-badge danger">{{$items->course_status}}</span>
                                    @endif
                                </td>
                                <td>${{$items->course_price}}</td>
                            </tr>
                        @endforeach
                      @endforeach
                    
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>

</div>
