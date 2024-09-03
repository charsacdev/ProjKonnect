<div>
    <div class="main-content">
        <div class="row">
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Students</p>
                          <h1 class="card-body">
                            @if($students>0)
                              <span class="student">{{number_format($students)}}</span>
                            @endif
                          </h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Proguides</p>
                          <h1 class="card-body">
                            @if($proguide>0)
                            <span class="proguide">{{number_format($proguide)}}</span>
                            @endif
                          </h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Employers</p>
                          <h1 class="card-body">
                            @if($employer>0)
                              <span class="employer">{{number_format($employer)}}</span>
                            @endif
                          </h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Revenue Generated</p>
                          <h1 class="card-body">$548,458</h1>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="col-12 mb-4">
          <div class="row align-items-stretch">
              <div class="col-md-7 mb-3">
                  <div class="ckt-card curr-card">
                      <div class="d-flex flex-wrap align-items-center justify-content-between mb-5">
                          <div>
                              <h6>Users</h6>
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
                                  <img src="asset/img/calender-img.png" alt=""> &nbsp;
                                  <input type="text" class="custom-select" style="width: 90px;" data-provide="datepicker" placeholder="Select dates">
                              </div>
                          </div>
                      </div>
                      <canvas id="userChart"></canvas>
                  </div>

              </div>
              <div class="col-md-5 mb-3">
                  <div class="ckt-card curr-card">
                       <div class="d-flex flex-wrap align-items-center justify-content-between mb-5">
                           <div>
                               <h6>Overall Report</h6>
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
                                   <img src="asset/img/calender-img.png" alt=""> &nbsp;
                                   <input type="text" class="custom-select" style="width: 90px;" data-provide="datepicker" placeholder="Select dates">
                               </div>
                           </div>
                       </div>
                       <canvas id="overallChart"></canvas>

                   </div>
              </div>
          </div>
         </div>
         <div class="col-lg-12 mb-4">
          <h5>Recent Users</h5>
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
                         <th>Sign Up Date</th>
                         <th>Subscription Plan </th>
                         <th>Type</th>
                         <th></th>
                    </thead>
                   <tbody>
                    @foreach($allUsers as $item)
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
                                        <span> {{$item->full_name}}</span>
                                    </div>
                                </div>

                            </td>
                            <td>{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}} </td>
                            
                                <td>
                                    @if(empty($item->plans))
                                       <span>No Subscription</span>
                                      @else
                                       @foreach($item->plans as $plans)
                                           {{$plans->plan_option_name}}
                                        @endforeach
                                    @endif
                                </td>
                            
                            <td>
                                @if($item->user_type==="student")
                                 <span class="live-badge primary">{{$item->user_type}}</span>
                                @elseif($item->user_type==="proguide")
                                  <span class="live-badge warning">{{$item->user_type}}</span>
                                @else
                                  <span class="live-badge secondary">{{$item->user_type}}</span>
                                @endif

                            </td>
                            <td><i class="fa fa-ellipsis-h"></i>
                            </td>
                         </tr>
                      @endforeach
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>
</div>

