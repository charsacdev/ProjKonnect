<div>
   <!--style for disabled-->
   <style>
    .pch-btn:disabled{
       background-color: #f0f8ff;
       color:blue;
       cursor: not-allowed !important
      }

      a[disabled=disabled] {
        background-color: #f0f8ff;
        color:blue;
        cursor: not-allowed !important
      }
    </style>

    <div class="main-content">
        @foreach($CourseInfo as $info)

        <!--if course is purchased by user already-->
        @if(count($info->purchasedCourses)>0)
        <div class="row" wire:ignore>
            <div class="col-12">
                <div class="mb-3">
                    <span class="g-sm-heading op-6">
                      <a href="/student-courses">Courses</a> 
                      <i class="fa fa-chevron-right"></i>
                  </span>
                    <span class="g-sm-heading">
                      @if(count(Request::segments())<3)
                        {{$info->course_title}}
                      @else
                        {{$info->course_chapter}}
                      @endif
                  </span>
               </div>
            </div>
               <div class="col-lg-8 col-md-7 mb-4">
                    <div class="tutimg">
                    <!--Handle Showing Video and Banner-->
                      @if(count(Request::segments())<3)
                       <img src="{{$info->course_banner}}" class="img-fluid w-100">
                       @else
                         <video style="object-fit:cover" class="h-100 w-100" id="player" controls playsinline data-poster="{{asset('student-asset/asset/img/course-img.png')}}">
                            <source src="{{$info->course_video}}" type="video/mp4">
                        </video>
                         <!--Show Next Button when Video is done playing-->
                         <script>
                            const video = document.getElementById('player');
                              video.addEventListener('ended', function() {
                                let nextButton = document.getElementById('next');
                                nextButton.classList.remove('d-none');
                            });
                        </script>
                        @endif
                    </div>

                    <div>
                        <!--Handle Showing Intro and Chapters-->
                        @if(count(Request::segments())<3)
                            <h3 class="g-md-heading">{{$info->course_title}}</h3>
                            <p class="thin">
                                {{$info->course_description}}
                            </p>
                        @else
                            <h3 class="g-md-heading">{{$info->course_chapter}}</h3>
                            <p class="thin">
                                {{$info->description}}
                            </p>
                        @endif
                    </div>

                   
                  @if(count($info->purchasedCourses)>0)
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card px-3 py-2 br-10 mt-3">
                                <div class="d-flex align-items-center justify-content-start gap-3">
                                    <a href="/quiz" class="gray-img">
                                        <img src="{{asset('student-asset/asset/img/note-2.png')}}" />
                                    </a>
                                    <a href="/quiz" class="cour-resrc w-100">
                                        <h6>Quizzes</h6>
                                        <h5>100</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card px-3 py-2 br-10 mt-3">
                                <div class="d-flex align-items-center justify-content-start gap-3">
                                    <a href="/assignment" class="gray-img">
                                        <img src="{{asset('student-asset/asset/img/note-2.png')}}" />
                                    </a>
                                           @php
                                              $courseResourcesCount = 0;
                                              $courseAssignmentsCount = 0;
                                           @endphp
        
                                          @foreach($chaptersInfo as $course)
                                              @if(!empty($course['course_resources']))
                                                  @php $courseResourcesCount++ @endphp
                                              @endif
                                              @if(!empty($course['course_assignment']))
                                                  @php $courseAssignmentsCount++ @endphp
                                              @endif
                                          @endforeach
                                    <a href="/assignment" class="cour-resrc">
                                        <h6>Assignments</h6>
                                        <h5>{{ $courseAssignmentsCount }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="card px-3 py-2 br-10 mt-3">
                                <div class="d-flex align-items-center justify-content-start gap-3 cursor-p" data-bs-toggle="modal"
                                data-bs-target="#resourceModal">
                                    <div class="gray-img">
                                        <img src="{{asset('student-asset/asset/img/note-2.png')}}" />
                                    </div>
                                    <div class="cour-resrc">
                                        <h6>Resources</h6>
                                        <h5>{{ $courseResourcesCount }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                      <button class="btn report-btn my-4" data-bs-toggle="modal"
                      data-bs-target="#reportModal">
                      <img src="{{asset('student-asset/asset/img/warning-2.png')}}" alt=""> Report
                      </button>
                      &nbsp;

                      <!---Next Button Course--->
                      @if(count(Request::segments())>2)
                          @php
                              $next=base64_decode(Request::segment(count(Request::segments())));
                              $totalChapter=count($CourseChapters);
                          @endphp
                            @if($next < $totalChapter)
                              <a href="#">
                                  <button id="next" class="btn report-btn my-4 d-none" wire:click="NextCourse({{$info->course_Id}},{{$next}})">
                                   <img src="{{asset('student-asset/asset/img/play-icon.png')}}" style="width:20px;height:20px" alt="">Next
                                  </button>
                              </a>
                           @endif   
                        @else
                            @php
                               $next=Request::segment(count(Request::segments()));
                                $totalChapter=count($CourseChapters);
                             @endphp
                              <a href="/course-learn/{{base64_encode($info->id)}}/{{base64_encode(1)}}">
                                  <button class="btn report-btn my-4" wire:click="StartCourse({{$info->id}})">
                                  <img src="{{asset('student-asset/asset/img/play-icon.png')}}" style="width:20px;height:20px" alt=""> Start
                                  </button>
                              </a>
                              @endif
                          </div>
                          @else
                     @endif
        
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="content-heading heading-lg">More Courses</h2>
                        <a href="/student-courses" class="content-heading heading-lg">View all &nbsp; <i class="fa fa-chevron-right"></i></a>
                   </div>
                   <div class="row">
                      
                          @foreach ($Allcourse as $item)
                              <div class="col-sm-6">
                                  <div class="course-card course-card-sm mt-4">
                                      <a href="/course-preview/{{base64_encode($item->id)}}">
                                      <div class="img-ctn">
                                          <img src="{{$item->course_banner}}" alt="">
                                      </div>
                                      </a>
                                      
                                      <h3 class="course-title"><a href="/course-preview/{{base64_encode($item->id)}}">{{$item->course_title}}</a></h3>
                                      <small class="author">from {{$item->proguide->full_name}}</small>
                                      <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                          <div class="course-details">
                                              <img src="{{asset('student-asset/asset/img/user-icon-dark.png')}}" alt="">
                                              <span>{{$item->course_students}}</span>
                                          </div>
                                          <div class="course-details">
                                              <img src="{{asset('student-asset/asset/img/book-icon.png')}}" alt="">
                                              <span>{{$item->chapters_count}} Chapters</span>
                                          </div>
                                      </div>
                                    
                                      @if(count($item->purchasedCourses)>0)
        
                                          @foreach($item->purchasedCourses as $purchaseditem) 
                                              <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                                                  <div><img src="{{asset('student-asset/asset/img/orange-ribbon.png')}}" alt=""></div>
                                                  <div><img src="{{asset('student-asset/asset/img/violet-ribbon.png')}}" alt=""></div>
                                                  <div><img src="{{asset('student-asset/asset/img/blue-ribbon.png')}}" alt=""></div>
                                                  <div><img src="{{asset('student-asset/asset/img/red-ribbon.png')}}" alt=""></div>
                                                  <div><img src="{{asset('student-asset/asset/img/green-ribbon.png')}}" alt=""></div>
                                                  <div class="card-color-box rounded-circle">+{{($purchaseditem->badged_earned)}}</div>
                                              </div>
                                              <div class="d-flex align-items-center justify-content-start gap-2 mt-4">
                                                  <div class="course-progress-ctn">
                                                      <div class="course-progress" style="width: {{($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100}}%;">
                                                          {{round((($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100),2)}}
                                                      </div>
                                                  </div>
                                                  <img src="{{asset('student-asset/asset/img/trophy-icon.png')}}" class="trophy-icon" alt="">
                                              </div>
                                              @endforeach
                                          @else
                                           <button wire:click="EnrollCourse({{$item}})" class="pch-btn w-100 mt-3 p-1 m-2">Add to Cart</button>
                                      @endif
                                      
                                  </div>
                              </div>
                          @endforeach
                          <p>{{$allCourses->links()}}</p>
                      </div>
               </div>
               <div class="col-lg-4 col-md-5 mb-4">
                  <div class="ckt-card curr-card">
                    <div class="d-flex align-items-center justify-content-between mb-5">
                         <h3 class="g-sm-heading">Lessons</h3>
                         <a href="javascript:;" class="primary-color">View all &nbsp; <i class="fa fa-chevron-right"></i></a>
                    </div>
                    @php
                        $i = 1;
                        $currentSegment = base64_decode(Request::segment(count(Request::segments())));
                    @endphp

                @foreach($CourseChapters as $chapters)
                    @php
                        #Assuming $chapters->id is the value you want to compare with the URL segment
                        $isBold = $chapters->id == $currentSegment; 
                    @endphp
                    <div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                        <div class="cur-icon-img">
                            <img src="{{ asset('student-asset/asset/img/curriculum-icon.png') }}" alt="">
                        </div>

                        <div class="chapter">
                            <small class="op-6 {{ $isBold ? 'fw-bold' : '' }}">
                                Chapter {{ $i++ }}
                            </small>
                            <h3 class="g-sm-heading op-6 {{ $isBold ? 'fw-bold' : '' }}">
                                {{ $chapters->course_chapter }}
                            </h3>
                        </div>
                    </div>
                @endforeach

                     
                    <div class="curr-lesson active mb-3">
                         <div class="cur-icon-img">
                              <img src="{{asset('student-asset/asset/img/curriculum-icon.png')}}" alt="">
                         </div>
                        <div class="chapter">
                              <h3 class="g-sm-heading m-0"><a href="certificate.html">Certificate</a></h3>
                        </div>
                    </div>
                  </div>
        
                  <div class="ckt-card curr-card mt-4">
                    <h2 class="g-sm-heading text-center mb-5">Leaderboard</h2>
                    <div class="lead-card">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="">
                            </div>
                            <h2 class="g-sm-heading">John Doe</h2>
                        </div>
                        <div class="g-sm-heading pts">3999pts</div>
                    </div>
                    <div class="lead-card">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="">
                            </div>
                            <h2 class="g-sm-heading">John Doe</h2>
                        </div>
                        <div class="g-sm-heading pts">3999pts</div>
                    </div>
                    <div class="lead-card">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <div class="img">
                                <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="">
                            </div>
                            <h2 class="g-sm-heading">John Doe</h2>
                        </div>
                        <div class="g-sm-heading pts">3999pts</div>
                    </div>
                  </div>
               </div>
          </div>
        @endif









       
    <!--========================if course have not being purchase by user====================--> 
    @if(count($info->purchasedCourses)==0)
      <div class="row">
        <div class="col-lg-8 col-md-7 mb-4">
            <div class="mb-5">
                <span class="g-sm-heading op-6">Courses <i class="fa fa-chevron-right"></i></span>
                <span class="g-sm-heading">{{$info->course_title}}</span>
            </div>
            <div class="custom-tab cs-dtl">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview"></i> Course Overview</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#review"> Reviews</a>
                            </li>
                        </ul>
                </div>
                <div class="tab-content mb-5">
                        <div class="tab-pane fade show active course-overview" id="overview" role="tabpanel">
                            <h3 class="g-sm-heading mt-4 mb-3">{{$info->course_title}}</h3>
                            <p>
                                {{$info->course_description}}
                            </p>
                            <h2 class="g-sm-heading mt-4 mb-3">Course Chapters</h2>
                            <div class="course-chapters">
                                @php($i=1)
                                @foreach($CourseChapters as $chapters)
                                    <div class="chapter border p-3 rounded mb-2">
                                        <h2 class="g-sm-heading">{{$i++}}. {{$chapters->course_chapter}}</h2>
                                        <p class="mb-0 pb-0">
                                            {{$chapters->description}} 
                                        </p>
                                    </div>
                                @endforeach
                        </div>
                        </div>
                      <div class="tab-pane fade show" id="review" role="tabpanel">
                        <div class="mt-4 rvws-ctn">
                            @foreach($reviews as $review)
                                <div class="pro-dlt rvw">
                                    <div class="d-flex align-items-center gap-3 mt-4 mb-2">
                                        <div class="img">
                                            @if(empty($review->students->profile_image))
                                             <img src="{{asset('student-asset/asset/img//user-picture.png')}}" alt="Proguide">
                                            @else
                                              <img src="{{$review->students->profile_image}}" class="h-100 img-fluid" alt="Proguide">
                                            @endif
                                        </div>
                                        <h3 class="g-heading">{{$review->students->full_name}}</h3>
                                    </div>
                                    <div class="rvw-stars my-2">
                                        @for($i=1;$i<=$review->rating;$i++)
                                          <img src="{{asset('student-asset/asset/img/star-icon-fill.png')}}" alt="Rating star">
                                        @endfor
                                    </div>
                                    <p class="mb-0 pb-0 thin">{{$review->review}}</p>
                                </div>
                            @endforeach
                            <p>{{$reviews->links()}}</p>
                        </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <h2 class="content-heading heading-lg">More Courses</h2>
                            <a href="/student-courses" class="content-heading heading-lg">View all &nbsp; <i class="fa fa-chevron-right"></i></a>
                       </div>
                       <div class="row">
                              @foreach ($Allcourse as $item)
                                  <div class="col-sm-6">
                                      <div class="course-card course-card-sm mt-4">
                                          <a href="/course-preview/{{base64_encode($item->id)}}">
                                          <div class="img-ctn">
                                              <img src="{{$item->course_banner}}" alt="">
                                          </div>
                                          </a>
                                          
                                          <h3 class="course-title"><a href="/course-preview/{{base64_encode($item->id)}}">{{$item->course_title}}</a></h3>
                                          <small class="author">By {{$item->proguide->full_name}}</small>
                                          <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                              <div class="course-details">
                                                  <img src="{{asset('student-asset/asset/img/user-icon-dark.png')}}" alt="">
                                                  <span>{{$item->course_students}}</span>
                                              </div>
                                              <div class="course-details">
                                                  <img src="{{asset('student-asset/asset/img/book-icon.png')}}" alt="">
                                                  <span>{{$item->chapters_count}} Chapters</span>
                                              </div>
                                          </div>
                                        
                                          @if(count($item->purchasedCourses)>0)
                                              @foreach($item->purchasedCourses as $purchaseditem) 
                                                  <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                                                      <div><img src="{{asset('student-asset/asset/img/orange-ribbon.png')}}" alt=""></div>
                                                      <div><img src="{{asset('student-asset/asset/img/violet-ribbon.png')}}" alt=""></div>
                                                      <div><img src="{{asset('student-asset/asset/img/blue-ribbon.png')}}" alt=""></div>
                                                      <div><img src="{{asset('student-asset/asset/img/red-ribbon.png')}}" alt=""></div>
                                                      <div><img src="{{asset('student-asset/asset/img/green-ribbon.png')}}" alt=""></div>
                                                      <div class="card-color-box rounded-circle">+{{($purchaseditem->badged_earned)}}</div>
                                                  </div>
                                                  <div class="d-flex align-items-center justify-content-start gap-2 mt-4">
                                                      <div class="course-progress-ctn">
                                                          <div class="course-progress" style="width: {{($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100}}%;">
                                                              {{round((($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100),2)}}
                                                          </div>
                                                      </div>
                                                      <img src="{{asset('student-asset/asset/img/trophy-icon.png')}}" class="trophy-icon" alt="">
                                                  </div>
                                                  @endforeach
                                              @else
                                               <button wire:loading.attr="disabled" wire:click="AddtoCart({{$item}})" class="pch-btn w-100 mt-3 p-1 m-2 add-to-cart">Add to Cart</button>
                                          @endif
                                          
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                   </div>
            </div>
        </div>
        
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="dlt-card mb-4">
                    <div class="dlt-card-header">
                            
                            <div class="header-ctn">
                                <img src="{{$info->course_banner}}" class="img img-fluid" alt="" style="width:100%;">
                            </div>
                    </div>
                    
                    <div class="dlt-card-body">
                            <h3 class="price mb-3">${{$info->course_price}}</h3>
                               <!--course free tag-->
                                @if($info->course_price==="0")
                                        <span class="text-light bg-success px-2 rounded">
                                            Free
                                        </span>
                                    @endif
                            <h4 class="g-sm-heading my-4">{{$info->course_title}}</h4>
                            <!--Only add to cart when not a free course-->
                            @if($info->course_price!=="0")
                              <a href="javascript:;" wire:click="AddtoCart({{$info}})" class="new-discussion-btn text-center d-block mb-4 add-to-cart">Add to cart</a>
                            @endif
                            <a href="javascript:;" wire:loading.attr="disabled" wire:click="EnrollCourse({{$info}})" class="pch-btn d-block mb-4">
                                <span wire:loading.remove>Purchase Now</span>
                                <!-- Loading indicator -->
                                <div wire:loading wire:target="EnrollCourse" class="loading-indicator">
                                    <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                </div>
                            </a>
                            <h3 class="g-sm-heading mb-3">This course contains:</h3>
                            <div class="cont-ctn">
                                <div class="ctn">
                                    <img src="{{asset('student-asset/asset/img/topics-icon.png')}}" alt="">
                                    <p class="mb-0 pb-0 thin">{{count($CourseChapters)}} Topics</p>
                                </div>
                            </div>
                            <div class="cont-ctn">
                                <div class="ctn">
                                    <img src="{{asset('student-asset/asset/img/video-icon.png')}}" alt="">
                                    <p class="mb-0 pb-0 thin">72 Hours on-demand videos</p>
                                </div>
                            </div>
                            <div class="cont-ctn">
                                <div class="ctn">
                                    <img src="{{asset('student-asset/asset/img/livelearn-icon.png')}}" alt="">
                                    <p class="mb-0 pb-0 thin">Livelearn Sessions</p>
                                </div>
                            </div>
                            <div class="cont-ctn">
                                <div class="ctn">
                                    <img src="{{asset('student-asset/asset/img/cert-icon.png')}}" alt="">
                                    <p class="mb-0 pb-0 thin">Certificate of completion</p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="pro-dlt">
                    <h3 class="g-sm-heading primary-color">Proguide Information</h3>
                    <div class="d-flex align-items-center gap-3 mt-4 mb-2">
                            <div class="img">
                                @if($item->proguide->profile_image!==null)
                                <img src="{{$item->proguide->profile_image}}" alt="">
                                @else
                                 <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="">
                                @endif
                            </div>
                            <h3 class="g-heading">{{$item->proguide->full_name}}</h3>
                    </div>
                    <p class="mb-0 pb-0 thin">
                        {{$item->proguide->bio}}   
                    </p>
                </div>
            </div>
             </div>
          @endif
        @endforeach
</div>


 

  <!--********************** Report Modal *****************************-->
  <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-body rounded p-4">
              <div class="text-center mt-3">
                  <img src="asset/img/warning-2-red.png" width="50px" alt="">
              </div>
              <button type="button" class="btn-close d-none" data-bs-dismiss="modal"
              aria-label="Close"></button>
              <form action="#">
                  <div class="form-group mt-4">
                      <label for="">Reason</label>
                      <select name="reason" id="" class="default-select p-2 mt-1">
                          <option value="">Select reason</option>
                          <option value="">Out of context course outline</option>
                          <option value="">Other reasons</option>
                      </select>
                  </div>
                  <div class="form-group mt-4 evid-ctn">
                      <label for="fileInput"> <img src="asset/img/upload-icon.png" alt=""> <span>Upload Evidence</span></label>
                      <input type="file" id="fileInput" name="files[]" class="form-control default-input d-none">
                  </div>
                  <div id="evidences" class="my-4">

                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                      <button type="button" class="btn evid-btn evid-btn-outline report-btn" id="close-modal">Cancel</button>
                      <button class="btn evid-btn report-btn">Report</button>
                  </div>
              </form>
              
          </div>
      </div>
  </div>
  </div>

  <!-- ********************* Resource Modal ********************** -->
  <div class="modal fade" id="resourceModal" tabindex="-1" aria-labelledby="resourceModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered">
           <div class="modal-content">
                <div class="modal-body rounded">
                    @php($linkCount=1)
                    @foreach($chaptersInfo as $course)
                        
                        @if(!empty($course['course_resources']))
                        <div class="text-left mt-3 mb-2">
                            <span>Resource link Chapter {{base64_decode(Request::segment(count(Request::segments())))}}</span>
                        </div>
                        <a href="{{$course['course_resources']}}" target="_blank">
                            {{$course['course_resources']}}
                        </a>
                        @endif
                                           
                     @endforeach
                     
                      
                     
                </div>
           </div>
      </div>
</div>

</div>

