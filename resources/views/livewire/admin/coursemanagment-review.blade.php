<div>
    <div class="main-content">
         <!--error message-->
         @if(session('error'))
         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
             @elseif(session('success'))
             <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
         @endif
         
        <div class="tab-content mb-5">

            <div class="tab-pane fade show active course-overview" id="overview" role="tabpanel">
                <h3 class="g-sm-heading mt-4 mb-3">{{$allcoursereview->course_title}}</h3>
                <p>
                   {{$allcoursereview->course_description}}
                </p>
                <h2 class="g-sm-heading mt-4 mb-3">Course Chapters</h2>
                @php
                   $i=1;
                @endphp
                @foreach ($allcoursereview->chapters as $item)
                  
                    <div class="course-chapters" style="overflow:hidden;height:auto">
                        <h4 class="text-muted fw-bold p-2">Chapter {{$i++}}</h4>
                        <div class="chapter border p-3 rounded mb-2">
                            <video style="width:100%" class="mb-3" id="player" controls playsinline data-poster="{{asset('student-asset/asset/img/course-img.png')}}">
                                <source src="{{$item->course_video}}" class="h-100 w-100" type="video/mp4" style="object-fit: cover">
                            </video>
                            <h2 class="g-sm-heading">{{$item->course_chapter}}</h2>
                            <p class="mb-0 pb-0">
                                {{$item->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
                    <button type="submit" data-bs-toggle="modal"  wire:click="DeclineCourse({{$allcoursereview->id}})"
                        data-bs-target="#successModall" class="new-discussion-btn btn-danger" id="publishCourseBtn"> 
                          <span wire:loading.remove>Decline Course</span>
                          <span wire:loading wire:target="DeclineCourse" style="cursor: not-allowed">
                              Processing...
                          </span>
                      </button>
                    <button type="submit" data-bs-toggle="modal"  wire:click="ConfirmCourse({{$allcoursereview->id}})"
                    data-bs-target="#successModall" class="new-discussion-btn" id="publishCourseBtn"> 
                      <span wire:loading.remove>Approve Course</span>
                      <span wire:loading wire:target="ConfirmCourse" style="cursor: not-allowed">
                          Processing...
                      </span>
                  </button>
                </div>
               
            </div>
        </div>
    </div>

</div>
