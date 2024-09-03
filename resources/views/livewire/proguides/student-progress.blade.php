<div>
    
    <div class="main-content" wire:ignore>
        <div class="row">
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Students</p>
                          <h1 class="card-body">{{$totalstudent}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Above Average</p>
                          <h1 class="card-body">{{$aboveAvg}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Below Average</p>
                          <h1 class="card-body">{{$belowAvg}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Total Earning</p>
                        <h1 class="card-body">${{$totalearnings}}</h1>
                    </div>
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
                                      <span> Student Name</span>
                                  </div>
                              </div>
                         </th>
                         <th>No of Chapters</th>
                         <th>Performance</th>
                         <th>Top Performing Course</th>
                         <th>Progress</th>
                         <th>Points Earned</th>
                         <th></th>
                    </thead>
                   <tbody>
                    @foreach ($enrollment as $item)
                        @foreach($item->course as $items)
                            <tr style="white-space: nowrap">
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
                                            <span data-bs-toggle="modal" class="cursor-p"
                                            data-bs-target="#studentModal">{{ucwords($item->student->full_name)}}</span>
                                        </div>
                                    </div>

                                </td>
                                <td>{{$item->course_chapters}}</td>
                                <td>
                                    @if(round(($item->current_chapters/$item->course_chapters)*100)>50)
                                    <span class="live-badge success"> Above Average</span>
                                    @else
                                    <span class="live-badge warning"> Below Average </span>
                                    @endif
                                </td>
                                <td>{{$items->course_title}}</td>
                                <td>{{round(($item->current_chapters/$item->course_chapters)*100)}}%</td>
                                <td>{{$item->points_earned}}</td>
                                <td onclick="ProgressMessage({{ $item->student->id }})">
                                    <span class="cursor-p" data-bs-toggle="modal" data-bs-target="#studentModal">
                                        <i class="fa fa-ellipsis-h cursor-p"></i></span>
                                </td>
                            </tr>
                            @endforeach
                      @endforeach
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>


<!-- Student Modal -->
@if(isset($studentId))
   <div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                    
                    <div class="student-img">
                        @if(empty($studentProfile))
                         <img src="{{asset('proguide-asset/asset/img/team3.png')}}" alt="">
                       @else
                         <img src="{{$studentProfile}}" alt="">
                      @endif
                     </div>
                </div>
                   <h5 class="text-center">{{ucwords($studentName)}}</h5>
                   <h6 class="text-center mb-5">{{ucwords($studentType)}}</h6>
                    <a href="messages/{{base64_encode($studentId)}}" type="button" class="new-discussion-btn text-center d-block mb-2">Send Message</a>
                    <button type="button" class="new-discussion-btn outline-danger w-100 mb-2" data-bs-dismiss="modal">Cancel</button>
              </div>
         </div>
    </div>
</div>
@endif

</div>

<!--JS-->
<script>
    function ProgressMessage(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('ProgressMessage', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>
