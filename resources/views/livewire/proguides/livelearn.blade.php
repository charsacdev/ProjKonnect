<div>
    <div class="main-content">
        <div class="row">
          <div class="col-12 mb-5 mt-2">
              <a href="/proguide/create-livelearn" class="new-discussion-btn"><img src="{{asset('proguide-asset/asset/img/camera-icon.png')}}" alt=""> &nbsp; New Livelearn Session</a>
         </div>
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">LiveLearn Sessions</p>
                          <h1 class="card-body">{{$sessions}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Upcoming Sessions</p>
                          <h1 class="card-body">{{$upcoming}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Participants</p>
                          <h1 class="card-body">1042</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Hours</p>
                          <h1 class="card-body">{{$hours}}</h1>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="col-12">
            <!--message-->
            @if(session('error'))
                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                @elseif(session('success'))
                <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
            @endif
          <div class="d-flex align-items-center justify-content-between flex-wrap d-none">
              <div class="g-search-ctn mb-4">
                  <img src="{{asset('proguide-asset/asset/img/message-search-icon.png')}}" alt="icon">
                  <input type="text" name="" placeholder="Search">
              </div>
              <div class="d-flex align-items-center justify-content-between gap-3 mb-4 lv-filter-ctn">
                  <div class="filter-card">
                      <img src="{{asset('proguide-asset/asset/img/calender-img2.png')}}" alt="icon">
                      <span>Select dates</span>
                  </div>
                  <div class="filter-card">
                      <img src="{{asset('proguide-asset/asset/img/filter-img.png')}}" alt="icon">
                      <span>Filters</span>
                  </div>
              </div>
          </div>
         </div>
         <div class="col-lg-12 mb-4">
          <div class="table-responsive">
               <table class="table" id="livelearn-table">
                    <thead style="white-space: nowrap">
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
                                      <span> Title</span>
                                  </div>
                              </div>
                         </th>
                         <th>Created</th>
                         <th>Date Schedule</th>
                         <th>Participants</th>
                         <th>Duration</th>
                         <th>Status</th>
                         <th>Action</th>
                    </thead>
                   <tbody>
                    @foreach($allsessions as $session)
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
                                      <span>{{$session->meeting_title}}</span>
                                  </div>
                              </div>

                         </td>
                         <td>{{ $session->created_at->diffForHumans() }}</td>
                         <td>{{$session->meeting_date}}</td>
                         <td>
                            @if($session->meeting_participant==1)
                              one-to-one
                            @elseif($session->meeting_participant==2)
                              Subscribed Student's
                            @elseif($session->meeting_participant==3)
                              Student's of same Interest
                            @else
                               None
                            @endif

                         </td>
                         <td>{{$session->meeting_duration}}hour</td>
                         <td>
                            @if($session->meeting_status==='pending')
                              <span class="live-badge success">Upcoming</span>
                            @else
                              <span class="live-badge danger">Ended</span>
                            @endif
                        </td>
                         <td style="white-space:nowrap">
                            <a target="_blank" href="/ongoinglivelearn/{{$session->meeting_name}}">
                              <button class="new-discussion-btn">Start Meeting</button>
                            </a>
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
