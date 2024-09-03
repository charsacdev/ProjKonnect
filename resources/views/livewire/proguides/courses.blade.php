<div >
    <div wire:ignore class="main-content">
        <!--message-->
        @if(session('error'))
            <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif

        <div class="row">
          <div class="col-12 mb-5 mt-2">
              <a href="/proguide/create-course" class="new-discussion-btn"><img src="{{asset('proguide-asset/asset/img/book_icon.png')}}" alt=""> &nbsp; New Course</a>
         </div>
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Course Upload</p>
                          <h1 class="card-body">{{$courses}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Average Rating</p>
                          <h1 class="card-body">4.0/5.0</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Income Generated</p>
                          <h1 class="card-body">
                            @if($totalEarnings>1)
                              ${{number_format($totalEarnings)}}
                           @else
                              ${{$totalEarnings}}
                           @endif
                          </h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Purchases</p>
                          <h1 class="card-body">
                            @if($totalpurchase>1)
                              {{number_format($totalpurchase)}}
                            @else
                            {{$totalpurchase}}
                         @endif
                        </h1>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         <div class="col-12">
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
                                      <span>Course Title</span>
                                  </div>
                              </div>
                         </th>
                         <th>Students</th>
                         <th>Price</th>
                         <th>Chapters</th>
                         <th>Type</th>
                         <th>Generated Revenue</th>
                         <th>Action</th>
                    </thead>
                   <tbody>
                    @foreach($courseTable as $course)
                    
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
                                      <span> <a href="javascript:;">{{$course->course_title}}</a> </span>
                                  </div>
                              </div>

                         </td>
                         <td>{{$course->course_students}}</td>
                         <td>${{$course->course_price}}</td>
                         <td>{{count($course->chapters)}}</td>
                         <td>
                            @if($course->course_price>0)
                               <span class="live-badge success">Paid</span>
                            @else
                               <span class="live-badge warning">Free</span>
                            @endif
                          </td>
                         <td>
                            @if($course->course_revenue>0)
                               ${{number_format($course->course_revenue)}}
                            @else
                               0
                            @endif
                           
                        </td>
                         <td onclick="EditCourse({{ $course->id }})"  data-bs-toggle="modal"  data-bs-target="#EditCourseModal">
                             <i class="fa fa-ellipsis-h"></i>
                         </td>
                       </tr>
                     @endforeach
                   
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>


  @if(isset($courseId))
    <div wire:ignore.self class="modal fade" id="EditCourseModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body rounded">
                    <div class="d-flex align-items-center justify-content-center mt-3">
                        <img src="{{$coursebanner}}" class='img-fluid' alt="icon">
                    </div>
                    <h6 class="mb-4 mt-4">{{$coursetitle}}</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="/proguide/edit-course/{{base64_encode($courseId)}}" class="new-discussion-btn outline-blue">View</a>
                        <button type="button" wire:click="DeleteCourse({{$courseId}})" class="new-discussion-btn btn-danger delete-course mb-2">Delete</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                        <img src="{{asset('proguide-asset/asset/img/info-circle.png')}}">
                        <small>You can't delete a course that has students enrolled to it. </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

</div>

<!--JS-->
<script>
    function EditCourse(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('EditCourse', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>


