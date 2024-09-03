<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Dashboard</title>

    <!--Agora SDK-->
    <script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>

    <!--asset-->
    <link rel="shortcut icon" type="text/css" href="{{asset('student-asset/asset/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('student-asset/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('student-asset/vendor/fontawesome/all.min.css')}}">

    <!--Toaster Css-->
    <link rel="stylesheet" href="{{asset('student-asset/vendor/toastr/css/toastr.min.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('student-asset/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('student-asset/vendor/datatables/css/jquery.dataTables.min.css')}}">

    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" href="{{asset('student-asset/vendor/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('student-asset/asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('student-asset/asset/css/responsive.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <!--Mutiple select-->
    <link rel="stylesheet" href="{{asset('student-asset/asset/css/select2.css')}}"/>

    @livewireStyles

    @livewireScripts
</head>

<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 sidebar">
                    <div class="sidebar-header">
                        <div class="sidebar-close d-lg-none"></div>
                        <div class="logo">
                            <img src="{{asset('student-asset/asset/img/logo-light.png')}}" class="img-fluid mb-2 sidebar-logo" alt="">
                        </div>
                    </div>
                    <div class="sidebar-content">
                        <ul class="sidebar-nav-links">
                            <li class="adm-sidebar-link-item">
                                <a href="/dashboard" class="sidebar-link {{Request::segment(1)==="dashboard" ? 'active' : '' }}">
                                    <img src="{{asset('student-asset/asset/img/dashboard-img.png')}}" alt="">
                                    Dashboard
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/course" class="sidebar-link {{Request::segment(1)==="course" || Request::segment(1)==="student-courses" || Request::segment(1)==="course-preview" || Request::segment(1)==="course-learn" || Request::segment(1)==="cart" || Request::segment(1)==="quiz" ? 'active' : '' }}">
                                    <img src="{{asset('student-asset/asset/img/book_icon.png')}}" alt="">
                                    Courses
                                </a>
                            </li>
                            
                            <li class="adm-sidebar-link-item">
                                <a href="/livelearn" class="sidebar-link {{Request::segment(1)==="livelearn" || Request::segment(1)==="ongoinglivelearn" || Request::segment(1)==="registerlivelearn" ? 'active' : '' }}">
                                    <img src="{{asset('student-asset/asset/img/video_icon.png')}}" alt="">
                                    LiveLearn Sessions
                                </a>
                            </li>
                            <li>
                                <div class="sidebar-link-dropdown closed">
                                    <h6>Career Hub</h6><span class="fa fa-chevron-down"></span>
                                </div>
                                <ul class="sidebar-dropdown-items">
                                    <li class="adm-sidebar-link-item d-none d-lg-block">
                                        <a href="javascript:;" class="sidebar-link">
                                            <img src="{{asset('student-asset/asset/img/briefcase.png')}}" alt="">
                                            Jobs
                                        </a>
                                    </li>
                                   
                                    <li class="adm-sidebar-link-item d-none d-lg-block">
                                        <a href="/student-internship" class="sidebar-link">
                                            <img src="{{asset('student-asset/asset/img/internship_icon.png')}}" alt="">
                                            Internships
                                        </a>
                                    </li>
                                    <li class="adm-sidebar-link-item d-none d-lg-block">
                                        <a href="/create-cred-show" class="sidebar-link {{Request::segment(1)==="create-cred-show" || Request::segment(1)==="create-cred-show-step1" || Request::segment(1)==="create-cred-show-step2" || Request::segment(1)==="create-cred-show-step3" || Request::segment(1)==="create-cred-show-step4" || Request::segment(1)==="create-cred-show-final" ? 'active' : '' }}">
                                            <img src="{{asset('student-asset/asset/img/credshow_icon.png')}}" alt="">
                                            CredShow
                                        </a>
                                    </li>
                                    <li class="adm-sidebar-link-item d-none d-lg-block">
                                        <a href="/student-pitch" class="sidebar-link {{Request::segment(1)==="student-pitch" || Request::segment(1)==="student-create-pitch" || Request::segment(1)==="student-pitch-preview" ? 'active' : '' }}">
                                            <img src="{{asset('student-asset/asset/img/project_pitch_icon.png')}}" alt="">
                                            Project Pitch
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="sidebar-link-dropdown closed">
                                    <h6>Community Connect</h6><span class="fa fa-chevron-down"></span>
                                </div>
                                <ul class="sidebar-dropdown-items">
                                    <li class="adm-sidebar-link-item">
                                        <a href="/message-chat" class="sidebar-link {{Request::segment(1)==="message-chat" ? 'active' : '' }}">
                                            <img src="{{asset('student-asset/asset/img/konnect-icon.png')}}" alt="">
                                            Messages
                                        </a>
                                    </li>
                                    <li class="adm-sidebar-link-item">
                                        <a href="/student-forum" class="sidebar-link {{Request::segment(1)==="student-forum" ? 'active' : '' }}">
                                            <img src="{{asset('student-asset/asset/img/forum_icon.png')}}" alt="">
                                            Forum
                                        </a>
                                    </li>
                                </ul>
                            </li>
                           
                         
                            <li class="adm-sidebar-link-item">
                                <a href="/student-schedule" class="sidebar-link {{Request::segment(1)==="student-schedule" ? 'active' : '' }}">
                                    <img src="{{asset('student-asset/asset/img/schedule_icon.png')}}" alt="">
                                    Schedules
                                </a>
                            </li>

                            <li class="adm-sidebar-link-item">
                                <a href="/plans-and-pricing" class="sidebar-link {{Request::segment(1)==="plans-and-pricing" ? 'active' : '' }}">
                                    <img src="{{asset('student-asset/asset/img/konnect-icon.png')}}" alt="">
                                    Plans & Pricing
                                </a>
                            </li>

                        </ul>
                        <div class="sidebar-footer">
                            <a href="/student-profile" class="sidebar-link mb-5 {{Request::segment(1)==="student-profile" ? 'active' : '' }}">
                                <img src="{{asset('student-asset/asset/img/setting-icon-light.png')}}" alt="">
                                My Account
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 main">
                    <div class="container-fluid px-4">
                        <div class="main-header">
                            <div class="d-flex align-items-start gap-3">
                                <div class="menu harmburger-menu d-lg-none">
                                   <div class="menu"></div>
                                </div>
                                <h1 class="heading">
                                    @if(Request::segment(1)==="dashboard")
                                      @php
                                        #Set the default time zone
                                        date_default_timezone_set('UTC');

                                        #Get the current hour in 24-hour format
                                        $currentHour = (int)date("G");

                                        // Define the greetings based on the time of day
                                        if ($currentHour >= 5 && $currentHour < 12) {
                                            $greeting = "Good morning,";
                                        } elseif ($currentHour >= 12 && $currentHour < 18) {
                                            $greeting = "Good afternoon,";
                                        } elseif ($currentHour >= 18 && $currentHour < 24) {
                                            $greeting = "Good evening,";
                                        } else {
                                            $greeting = "Good night,";
                                        }
                                        #Output the greeting
                                        echo $greeting;
                                      @endphp
                                        {{auth()->guard('web')->user()->full_name}}!
                                      @elseif(Request::segment(1)==="course" || Request::segment(1)==="course-preview" || Request::segment(1)==="course-learn")
                                        <span>Courses</span>
                                      @elseif(Request::segment(1)==="livelearn" || Request::segment(1)==="registerlivelearn")
                                        <span>LiveLearn Sessions</span>
                                      @elseif(Request::segment(1)==="cart")
                                        <span>Cart</span>
                                      @elseif(Request::segment(1)==="student-jobs")
                                        <span>Jobs</span>
                                      @elseif(Request::segment(1)==="student-internship")
                                        <span>Internships</span>
                                      @elseif(Request::segment(1)==="create-cred-show" || Request::segment(1)==="create-cred-show-step1" || Request::segment(1)==="create-cred-show-step2" || Request::segment(1)==="create-cred-show-step3" || Request::segment(1)==="create-cred-show-step4" || Request::segment(1)==="create-cred-show-final")
                                        <span>CredShow</span>
                                      @elseif(Request::segment(1)==="student-pitch" || Request::segment(1)==="student-create-pitch" || Request::segment(1)==="student-pitch-preview" )
                                        <span>Project Pitch</span>
                                      @elseif(Request::segment(1)==="message-chat")
                                        <span>Messages</span>
                                      @elseif(Request::segment(1)==="student-forum")
                                        <span>Forum</span>
                                      @elseif(Request::segment(1)==="student-schedule")
                                        <span>Schedules</span>
                                    @elseif(Request::segment(1)==="plans-and-pricing")
                                        <span>Plans & Pricing</span>
                                      @elseif(Request::segment(1)==="student-profile")
                                        <span>My Account</span>
                                      @elseif(Request::segment(1)==="student-ai")
                                        <span>MindBridge AI</span>
                                     @elseif(Request::segment(1)==="student-referal")
                                        <span>Referrals</span>
                                     @elseif(Request::segment(1)==="student-helpcenter")
                                        <span>Help Center</span>
                                    @endif
                                    
                                    
                                </h1>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-nav-search" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                    <img src="{{asset('student-asset/asset/img/search-icon.png')}}" alt="">
                                </button>
    
                                <div class="profile-dropdown notify-dropdown">
                                    <div class="drop-now mx-2">
                                        <img src="{{asset('student-asset/asset/img/notification-icon.png')}}" alt="">
                                        <span class="position-absolute top-0 start-30 translate-middle badge rounded-pill bg-danger notify-count">0</span>   
                                    </div>
                                    <div class="profile-dropdown-items notify-dropdown-items d-none">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <h4 class="heading">Notifications</h4>
                                            <span>  <i class="fa fa-check-double"></i> Mark all as read</span>
                                        </div>
                                        <div class="notify-dropdown-item">
                                            
                                        </div>
                                        <div class="text-center">
                                            <a href="/student-notifications" class="notify-btn">See all notifications</a>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="profile-dropdown">
                                    <div class="drop-now d-flex align-items-center justify-content-between gap-4">
                                        <div class="d-flex align-items-center align-items-start gap-3">
                                            <div class="img">
                                                @if(auth()->guard('web')->user()->profile_image=='')
                                                 <img src="{{asset('student-asset/asset/img/user-picture.png')}}" class="img-flui" alt="">
                                                 @else
                                                 <img src="{{auth()->guard('web')->user()->profile_image}}" class="img-flui" alt="">
                                                 @endif
                                             </div>
                                            <div class="d-flex flex-column">
                                                <span class="name">{{auth()->guard('web')->user()->full_name}}</span>
                                                <span class="role">Student</span>
                                            </div>
                                        </div>
                                        <div class="directions close">
                                            <i class="fa fa-chevron-down"></i>
                                            <i class="fa fa-chevron-up"></i>
                                        </div>
                                    </div>
                                    <ul class="profile-dropdown-items profile-items d-none">
                                        <li class="dropdown-item">
                                            <a href="/student-profile">
                                            <img src="{{asset('student-asset/asset/img/user-icon-dark.png')}}" class="img-fluid" alt="icon">Profile</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/cart">
                                            <img src="{{asset('student-asset/asset/img/shopping-cart.png')}}" class="img-fluid" alt="icon">Cart 
                                            <span class="cart-count carted">
                                               0
                                              </span>
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="javascript:;">
                                            <img src="{{asset('student-asset/asset/img/points-icon.png')}}" class="img-fluid" alt="icon">Points 
                                            <span class="cart-count point-count primary-color">0</span></a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/student-referal">
                                            <img src="{{asset('student-asset/asset/img/referral-icon.png')}}" class="img-fluid" alt="icon">Refer a Friend</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/student-ai">
                                            <img src="{{asset('student-asset/asset/img/projkonnectai_icon.png')}}" class="img-fluid" alt="icon">MindBridge AI</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/student-profile">
                                            <img src="{{asset('student-asset/asset/img/setting-icon-dark.png')}}" class="img-fluid" alt="icon">Settings</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/student-certificate">
                                            <img src="{{asset('student-asset/asset/img/certificate_icon.png')}}" class="img-fluid" alt="icon">Certificates</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/student-helpcenter">
                                            <img src="{{asset('student-asset/asset/img/message-question-icon.png')}}" class="img-fluid" alt="icon">Help center</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/logout">
                                            <img src="{{asset('student-asset/asset/img/login-icon.png')}}" class="img-fluid" alt="icon">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <!---DASHBOARD YEILD--->
                        @yield('dasboard-content')


                <!--********************** Search Modal *****************************-->
                <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                               <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"><i class="fa fa-times"></i>
                              </button>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Keyword eg. Data science" id="course-search" name="keyword" class="form-control">
                                </div>
                            </div>
            
                            <div class="modal-body rounded">
                                <div class="result-ctn">
                                        <h2 class="heading">Search result</h2>
                                        <div class="results" id="search-results">
                                            
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
              

                   <!-- JS FILES -->
                    <script src="{{asset('student-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/popper/popper.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/fontawesome/all.min.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/jquery-validate/jquery.validate.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/moment/moment.min.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
                    <script src="{{asset('student-asset/asset/js/plugins_init.js')}}"></script>
                    <script src="{{asset('student-asset/asset/js/main.js')}}"></script>
                    <script src="{{asset('student-asset/vendor/toastr/js/toastr.min.js')}}"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script src="{{asset('student-asset/asset/js/quiz.js')}}"></script>
                    <script src="{{asset('student-asset/asset/js/credshow.js')}}"></script>
                    <script src="{{asset('student-asset/asset/js/singleCalender.js')}}"></script>
                    <script src="{{asset('student-asset/asset/js/select2.js')}}"></script>

                    <script src="https://download.agora.io/sdk/release/AgoraRTC_N-4.2.1.js"></script>
                    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.1007.0.min.js"></script>
                
                <script>
                    $(document).ready(function(){

                        //Search Course
                        $('#course-search').on('keyup', function() {
                            let query = $(this).val();

                            if(query.length > 2) { 
                                $.ajax({
                                    url: '{{ route("search.courses") }}',
                                    type: 'GET',
                                    data: {query: query},
                                    success: function(response) {
                                        $('#search-results').html(response.html);
                                    }
                                });
                            } else {
                                $('#search-results').empty();
                            }
                        });

                        //course points
                        $.ajax({
                                url: '/getpoints',
                                method: 'GET',
                                success: function(response) {
                                    //alert(response.html.points);
                                    $('.point-count').html(response.html.points);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error fetching cart summary:', error);
                                }
                            });
                        
                        //Notifications Students
                        $.ajax({
                                url: '/notification-student',
                                method: 'GET',
                                success: function(response) {
                                    //alert(response.count);
                                    $('.notify-dropdown-item').html(response.notification);
                                    $(".notify-count").html(response.count);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error fetching cart summary:', error);
                                }
                            });

                        //header
                        $('.header-md-ctn').on('click', function(){
                            $('.header-md-ctn').removeClass('active');
                            $(this).addClass('active');
                        })



                        //Award and Honor cred show 
                        let html = `
                            <div class="report-evid">
                                <div class="d-flex align-items-center justify-content-between">
                                        <small style="opacity: 0.6"><i>Uploading...</i></small>
                                        <div id='percent' class="percent">20%</div>
                                </div>
                                <div class="progress" id="progress">
                                        <div class="bar" id="bar"></div>
                                </div>
                            </div>
                        `;


                        $('#pocFile1').on('change', () => {
                            progressUploader('1');
                        });
                        $('#pocFile2').on('change', () => {
                            progressUploader('2');
                        });
                        $('#pocFile3').on('change', () => {
                            progressUploader('3');
                        });


                        function progressUploader(id)
                        {
                            $(`#pocFile-ctn${id}`).html(html);

                            var initialWidth = 0;
                            var targetWidth = parseInt($(`#pocFile-ctn${id}`).find('.report-evid:first-child').find('.progress').innerWidth());

                            function increaseProgress() {

                            var newWidth = (initialWidth / targetWidth) * 100;
                            $(`#pocFile-ctn${id} #progress #bar`).css('width', newWidth + '%');
                            initialWidth += 1;

                            $(`#pocFile-ctn${id} .report-evid #percent`).text(parseInt(newWidth) + '%');

                            if (initialWidth <= targetWidth) {
                                    // Repeat the process after a short delay
                                    setTimeout(increaseProgress, 10);
                            }

                                    if(newWidth == 100){
                                        setTimeout(() => {
                                            $(`#pocFile-ctn${id} .report-evid small`).text(`Uploaded`);
                                            $(`#pocFile-ctn${id} #progress #bar`).css('background', 'green');
                                        }, 1000);
                                    }
                            }
                                    
                            increaseProgress();
                            
                        }
            
                      
            
                        //file upload
                        $('body').on('click', '.proj-label', function(){
                         $(this).siblings('input[type="file"]').click();
                        })
            
                     //progress bar
                     $('body').on('change', '.proj-file', function() {
                         let _this = $(this);
                         let html = `
                                     <div class="report-evid">
                                         <div class="d-flex align-items-center justify-content-between">
                                             <small style="opacity: 0.6"><i>Uploading...</i></small>
                                             <div id='percent' class="percent">0%</div>
                                         </div>
                                         <div class="progress" id="progress">
                                             <div class="bar" id="bar"></div>
                                         </div>
                                     </div>
                                     `;
            
                         var container = $(this).parent('.evid-ctn').find('.proj-file-ctn');
                         container.html(html);
            
                         var initialWidth = 0;
                         var targetWidth = parseInt(_this.parent('.evid-ctn').children('.proj-file-ctn').find('.progress').innerWidth());
            
                         function increaseProgress() {
                         
                         var newWidth = (initialWidth / targetWidth) * 100;
                         _this.parent('.evid-ctn').children('.proj-file-ctn').find(`.bar`).css('width', newWidth + '%');
                         initialWidth += 1;
            
                         _this.parent('.evid-ctn').children('.proj-file-ctn').find(`.percent`).text(parseInt(newWidth) + '%');
            
                         if (initialWidth <= targetWidth) {
                             // Repeat the process after a short delay
                             setTimeout(increaseProgress, 10);
                         }
                         
                             if(newWidth == 100){
                                     setTimeout(() => {
                                         _this.parent('.evid-ctn').children('.proj-file-ctn').find(`small`).text(`Uploaded`);
                                     }, 1000);
                             }
                         }
                             
                         increaseProgress();
                     });

                     //copy function
                     $("#btnCopy").on('click', function() {
                            var _this = $(this);
                            var input = $(this).siblings('input');
                            input.select();
                            document.execCommand("copy");
                            
                            $(this).siblings('.custom-tooltip').animate({right: '0'});

                            setTimeout(() => {
                                    _this.siblings('.custom-tooltip').animate({right: '-200px'});
                            }, 3000);
                        });


                       //Internship modal
                        $('#intern-app-btn').on('click', function(){
                                $('body').click();
                                $('#intern-app-success-btn').click();
                        });

                        

                            //copy referal code
                            $("#copy-ref-code").on('click', function() {
                                var _this = $(this);
                                var textToCopy = $(this).siblings('span').text();
                                var tempInput = $("<input>");
                                $("body").append(tempInput);
                                tempInput.attr('value', textToCopy).select();
                                document.execCommand("copy");
                                tempInput.remove();

                                $(this).siblings('span').css({backgroundColor: 'skyblue'})
                                
                                $(this).siblings('.custom-tooltip').fadeIn();
                
                                setTimeout(() => {
                                    _this.siblings('.custom-tooltip').fadeOut();
                                    _this.siblings('span').css({backgroundColor: 'transparent'});
                                }, 2000);
                            });


                            //add to cart animation
                            $('.add-to-cart').on('click', function(e){
                                var _this = $(this);
                                $(this).html(`<i class="fa fa-spin fa-spinner"></i>`);
                                setTimeout(() => {
                                    toastr.success("Added to cart!");
                                    _this.text(`Add to cart`);
                                    _this.addClass('d-none');

                                    var countCart=$('.cart-count').html();
                                    countCart++;
                                }, 1000);
                                
                            });

                            //purchase course
                            $(".pch-btn",".pmt-btn").on('click', function(e){
                                var _this = $(this);
                                $(this).html(`<i class="fa fa-spin fa-spinner"></i>`);
                                setTimeout(() => {
                                    $(this).css('cursor', 'not-allowed');
                                }, 1000);
                                
                            });

                            //checkout course
                            $(".pmt-btn").on('click', function(e){
                                var _this = $(this);
                                $(this).html(`<i class="fa fa-spin fa-spinner"></i>`);
                                setTimeout(() => {
                                    $(this).css('cursor', 'not-allowed');
                                }, 1000);
                                
                            });


                            //count cart
                            $.ajax({
                                url: '/cartcount',
                                method: 'GET',
                                success: function(data) {
                                    //alert(data);
                                    $('.carted').html(data);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error fetching cart summary:', error);
                                }
                            });

                            //remove cart and fetch response
                            $('.remove-item-btn').on('click', function() {
                                setTimeout(() => {
                                    $.ajax({
                                        url: '/cart-total',
                                        method: 'GET',
                                        success: function(data) {
                                            //alert(data);
                                            $('#payable-price').html(data);
                                            $('#payable-amount').html(data);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Error fetching cart summary:', error);
                                        }
                                    });

                                    $(this).parents('.cart-item').remove();
                                    calSum();
                                    
                                }, 3000); // 3000 milliseconds = 3 seconds
                            });


                            //Proof of Concept
                            $('#pocFile').on('change', () => {

                                $('#pocFile-ctn').html(html);

                                var initialWidth = 0;
                                var targetWidth = parseInt($('#pocFile-ctn').find('.report-evid:first-child').find('.progress').innerWidth());

                                function increaseProgress() {

                                var newWidth = (initialWidth / targetWidth) * 100;
                                $(`#pocFile-ctn #progress #bar`).css('width', newWidth + '%');
                                initialWidth += 1;

                                $(`#pocFile-ctn .report-evid #percent`).text(parseInt(newWidth) + '%');

                                if (initialWidth <= targetWidth) {
                                    // Repeat the process after a short delay
                                    setTimeout(increaseProgress, 10);
                                }

                                    if(newWidth == 100){
                                        setTimeout(() => {
                                            $(`#pocFile-ctn .report-evid small`).text(`Uploaded`);
                                            $(`#pocFile-ctn #progress #bar`).css('background', 'green');
                                        }, 1000);
                                    }
                                }
                                    
                                increaseProgress();
                                });



                            //Attach File Pitch
                            $('body').on('click', '.attaFileLabel', function() {
              
                                var fileInput = $(this).siblings('input[type="file"]');
                                fileInput.click();
                            });

                            $('body').on('change', '.attaFile', function() {
                                var _this = $(this);
                                $(this).siblings('.attaFileLabel').addClass('d-none');
                                $(this).parent('.evid-ctn').prepend(html);


                                var initialWidth = 0;
                                var targetWidth = parseInt($(this).parent('.evid-ctn').find('.progress').innerWidth());


                                function increaseProgress() {
                                
                                    var newWidth = (initialWidth / targetWidth) * 100;
                                    
                                    _this.parent('.evid-ctn').find(`.bar`).css('width', newWidth + '%');
                                    initialWidth += 1;

                                    _this.parent('.evid-ctn').find(`.percent`).text(parseInt(newWidth) + '%');

                                    if (initialWidth <= targetWidth) {
                                            // Repeat the process after a short delay
                                            setTimeout(increaseProgress, 10);
                                    }
                                    
                                            if(newWidth == 100){
                                                setTimeout(() => {
                                                    _this.parent('.evid-ctn').find(`small`).text(`Uploaded`);
                                                    _this.parent('.evid-ctn').find(`.bar`).css('background', 'green');
                                                }, 1000);
                                            }
                                }
                                    
                                increaseProgress();
                                
                            })

                            
                            
                    })
                </script>
                </body>
                
           </html>