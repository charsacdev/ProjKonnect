<div>
    
    <div class="main-content">
        <div class="swiper dashboard-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Upcoming Live Sessions</p>
                        <h1 class="card-body">{{$upcomingsession}}</h1>
                        <a href="/livelearn" class="card-foot">Click here to view more >>></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Job Applications</p>
                        <h1 class="card-body">0</h1>
                        <a href="javascript:;" class="card-foot">Click here to view more >>></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Pitches</p>
                        <h1 class="card-body">0</h1>
                        <a href="/student-pitch" class="card-foot">Click here to view more >>></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Interviews</p>
                        <h1 class="card-body">0</h1>
                        <a href="javascript:;" class="card-foot">Click here to view more >>></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Enrolled Courses</p>
                        <h1 class="card-body">{{$enrolled}}</h1>
                        <a href="/student-courses" class="card-foot">Click here to view more >>></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="std-dsb-card">
                        <p class="card-head">Completed Courses</p>
                        <h1 class="card-body">{{$completed}}</h1>
                        <a href="/student-courses" class="card-foot">Click here to view more >>></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card p-3 px-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="content-heading">featured courses</h2>
                        <a href="/student-courses" class="view-all-blue">View All</a>
                    </div>
                    @foreach($featuredCourse as $course)
                    <div class="d-flex flex-wrap align-items-start justify-content-between">
                        <div class="feat-cs d-flex align-items-center justify-content-start gap-3 mt-3">
                            <div class="fc-img">
                                <img src="{{$course->course_banner}}"  alt="">
                            </div>
                            <div class="fc-details">
                                <h3>{{$course->course_title}}</h3>
                                <p>By - {{$course->proguide->full_name}}</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/course-preview/{{base64_encode($course->id)}}" class="btn btn-outline-blue">enroll now</a>
                        </div>
                    </div>
                    @endforeach
                   

                </div>
                <div class="card p-3 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="content-heading">suggested jobs</h2>
                        <a href="javascript:;" class="view-all-blue">View All</a>
                    </div>
                    <div class="d-flex flex-wrap align-items-start justify-content-between">
                        <div class="feat-cs d-flex align-items-center justify-content-start gap-3 mt-3">
                            <div class="fs-img">
                                <img src="{{asset('student-asset/asset/img/briefcase-icon.png')}}"  alt="">
                            </div>
                            <div class="fc-details">
                                <h3>Software Developer</h3>
                                <p>Rinovate Technologies</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-outline-blue">apply now</button>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-start justify-content-between">
                        <div class="feat-cs d-flex align-items-center justify-content-start gap-3 mt-3">
                            <div class="fs-img">
                                <img src="{{asset('student-asset/asset/img/briefcase-icon.png')}}"  alt="">
                            </div>
                            <div class="fc-details">
                                <h3>Data Entry Clerk</h3>
                                <p>Skylies Enterprises</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-outline-blue">apply now</button>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-start justify-content-between">
                        <div class="feat-cs d-flex align-items-center justify-content-start gap-3 mt-3">
                            <div class="fs-img">
                                <img src="{{asset('student-asset/asset/img/briefcase-icon.png')}}"  alt="">
                            </div>
                            <div class="fc-details">
                                <h3>Human Resourse Manager</h3>
                                <p>Skylies Enterprises</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-outline-blue">apply now</button>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-start justify-content-between">
                        <div class="feat-cs d-flex align-items-center justify-content-start gap-3 mt-3">
                            <div class="fs-img">
                                <img src="{{asset('student-asset/asset/img/briefcase-icon.png')}}"  alt="">
                            </div>
                            <div class="fc-details">
                                <h3>SEO Specialist</h3>
                                <p>Skylies Enterprises</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-outline-blue">apply now</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="card p-3 mt-4">
                    <h3 class="content-heading mb-4"><strong>Shortcuts</strong></h3>
                    <div class="card px-3 py-2 mt-4">
                        <div class="d-flex align-items-center justify-content-between short-cut">
                            <div class="d-flex align-items-center justify-content-start gap-3">
                                <div class="fs-img">
                                    <img src="{{asset('student-asset/asset/img/pitch-icon.png')}}" alt="">
                                </div>
                                <h5 class="content-heading">Create Pitch</h5>
                            </div>
                            <div>
                                <a href="/student-pitch"><i class="fa fa-chevron-right"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card px-3 py-2 mt-4">
                        <div class="d-flex align-items-center justify-content-between short-cut">
                            <div class="d-flex align-items-center justify-content-start gap-3">
                                <div class="fs-img">
                                    <img src="{{asset('student-asset/asset/img/briefcase-icon.png')}}" alt="">
                                </div>
                                <h5 class="content-heading">Apply to Job</h5>
                            </div>
                            <div>
                                <a href="javascript:;"><i class="fa fa-chevron-right"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card px-3 py-2 mt-4">
                        <div class="d-flex align-items-center justify-content-between short-cut">
                            <div class="d-flex align-items-center justify-content-start gap-3">
                                <div class="fs-img">
                                    <img src="{{asset('student-asset/asset/img/resume-icon.png')}}" alt="">
                                </div>
                                <h5 class="content-heading">Resume Builder</h5>
                            </div>
                            <div>
                                <a href="/create-cred-show"><i class="fa fa-chevron-right"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3 mt-4">
                    <h3 class="content-heading mb-4"><strong>Proguides</strong></h3>
                    @foreach($proguides as $proguide)
                    <div class="card px-3 py-2 mt-4">
                        <div class="d-flex align-items-center justify-content-start gap-4 short-cut">
                            <div class="fs-img pro-g">
                                @if($proguide->proguideStudent->profile_image)
                                  <img src="{{$proguide->proguideStudent->profile_image}}" alt="">
                               @else
                                 <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                               @endif
                                
                            </div>
                            <h5 class="content-heading">{{$proguide->proguideStudent->full_name}}</h5>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        //Handle Plan Redirect
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.hash === "#upgrade") {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                var modalText = document.getElementById('modalText');
                modalText.innerHTML = "Kindly Upgrade to Premium plan to get access to this feature in our plans and pricing.";
                successModal.show();
            } else if (window.location.hash === "#premium-feature") {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                var modalText = document.getElementById('modalText');
                modalText.innerHTML = "This feature is exclusive to Premium plans. Upgrade now to enjoy all features!";
                successModal.show();
            } else if (window.location.hash === "#premiumplus-feature") {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                var modalText = document.getElementById('modalText');
                modalText.innerHTML = "Unlock even more with Premium Plus! Upgrade today and access all premium features.";
                successModal.show();
            }
        });
    </script>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body rounded">
                        <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                            <img src="{{ asset('student-asset/asset/img/success-star-checked.png') }}" width="50px" alt="icon">
                        </div>
                        <h4 class="text-center mb-2">Feature Unavailable!</h4>
                        <br>
                        <div class="text-center mb-2 px-2" id="modalText">
                            <!-- This text will be dynamically updated -->
                            Kindly Upgrade to get access to this feature in our plans and pricing.
                        </div>
                        <a href="/plans-and-pricing" class="new-discussion-btn d-block mb-2">Proceed Now</a>
                    </div>
                </div>
            </div>
        </div>

    

</div>
