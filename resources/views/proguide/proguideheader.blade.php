<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proguide - Dashbaord</title>

     <!--Agora SDK-->
     <script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>

    <!--asset-->
    <link rel="shortcut icon" type="text/css" href="{{asset('proguide-asset/asset/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('proguide-asset/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('proguide-asset/vendor/fontawesome/all.min.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('proguide-asset/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('proguide-asset/vendor/datatables/css/jquery.dataTables.min.css')}}">

    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" href="{{asset('proguide-asset/vendor/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.8/plyr.js'"></script>

    <!--dropify upload css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

    <!--Custom CSS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <link rel="stylesheet" href="{{asset('proguide-asset/asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('proguide-asset/asset/css/proguide.css')}}">
    <link rel="stylesheet" href="{{asset('proguide-asset/asset/css/responsive.css')}}">

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
                            <img src="{{asset('proguide-asset/asset/img/logo-light.png')}}" class="img-fluid mb-2 sidebar-logo" alt="">
                        </div>
                    </div>
                    <div class="sidebar-content">
                        <ul class="sidebar-nav-links">
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/dashboard" class="sidebar-link {{ Request::segment(2)==="dashboard" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/dashboard-img.png')}}" alt="">
                                    Dashboard
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/livelearn" class="sidebar-link {{Request::segment(2)==="create-livelearn" || Request::segment(2)==="livesession" || Request::segment(2)==="livelearn" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/video_icon.png')}}" alt="icon">
                                    LiveLearn Sessions
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/course" class="sidebar-link {{Request::segment(2)==="create-course" || Request::segment(2)==="course" || Request::segment(2)==="edit-course" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/book_icon.png')}}" alt="">
                                    Courses
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/message" class="sidebar-link {{ Request::segment(2)==="message" || Request::segment(2)==="messages" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/konnect-icon.png')}}" alt="">
                                    Messages
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/student-progress" class="sidebar-link {{ Request::segment(2)==="student-progress" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/users-icon.png')}}" alt="">
                                    Student Progress
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/student-assessment" class="sidebar-link {{Request::segment(2)==="assessment-grading" || Request::segment(2)==="student-assessment" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/users-icon.png')}}" alt="">
                                    Student Assessment
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/payments" class="sidebar-link {{ Request::segment(2)==="payments" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/wallet-icon.svg')}}" alt="">
                                    payments & Revenue
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/proguide/schedule" class="sidebar-link {{ Request::segment(2)==="schedule" ? 'active' : '' }}">
                                    <img src="{{asset('proguide-asset/asset/img/schedule_icon.png')}}" alt="">
                                    Schedules
                                </a>
                            </li>

                        </ul>
                        <div class="sidebar-footer">
                            <a href="/proguide/profile" class="sidebar-link mb-5 {{ Request::segment(2)==="profile" ? 'active' : '' }}">
                                <img src="{{asset('proguide-asset/asset/img/setting-icon-light.png')}}" alt="">
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
                                    @if(Request::segment(2)==="dashboard")
                                      Welcome back!
                                    @elseif(Request::segment(2)==="livelearn" || Request::segment(2)==="create-livelearn" || Request::segment(2)==="livesession")
                                      LiveLearn Session
                                    @elseif(Request::segment(2)==="course" || Request::segment(2)==="create-course" || Request::segment(2)==="edit-course")
                                      Courses
                                    @elseif(Request::segment(2)==="message" || Request::segment(2)==="messages")
                                      Messages
                                    @elseif(Request::segment(2)==="student-progress")
                                      Student Progress
                                    @elseif(Request::segment(2)==="student-assessment" || Request::segment(2)==="assessment-grading")
                                       Student Assessment
                                    @elseif(Request::segment(2)==="payments")
                                      Payments & Revenue
                                    @elseif(Request::segment(2)==="schedule")
                                      Schedules
                                    @elseif(Request::segment(2)==="referal")
                                      Referrals
                                    @elseif(Request::segment(2)==="help-center")
                                      Help Center
                                    @elseif(Request::segment(2)==="reports" || Request::segment(2)==="report-details")
                                      Reports
                                    @elseif(Request::segment(2)==="settings")
                                       Settings
                                    @elseif(Request::segment(2)==="mainbridge-ai")
                                       ProjKonnect AI
                                    @elseif(Request::segment(2)==="profile")
                                       My Account
                                    @endif
                                </h1>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
    
                                <div class="profile-dropdown notify-dropdown">
                                    <div class="drop-now">
                                        <img src="{{asset('proguide-asset/asset/img/notification-icon.png')}}" alt="">
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
                                            <a href="/proguide/notifications" class="notify-btn">See all notifications</a>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="profile-dropdown">
                                    <div class="drop-now d-flex align-items-center justify-content-between gap-4">
                                        <div class="d-flex align-items-center align-items-start gap-3">
                                            <div class="img">
                                                @if(auth()->guard('web')->user()->profile_image=='')
                                                 <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" class="img-flui" alt="">
                                                @else
                                                <img src="{{auth()->guard('web')->user()->profile_image}}" class="img-flui" alt="">
                                                @endif
                                               
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="name">{{auth()->guard('web')->user()->full_name}}</span>
                                                <span class="role">Proguide</span>
                                            </div>
                                        </div>
                                        <div class="directions close">
                                            <i class="fa fa-chevron-down"></i>
                                            <i class="fa fa-chevron-up"></i>
                                        </div>
                                    </div>
                                    <ul class="profile-dropdown-items profile-items d-none">
                                        <li class="dropdown-item">
                                            <a href="/proguide/profile">
                                            <img src="{{asset('proguide-asset/asset/img/user-icon-dark.png')}}" class="img-fluid" alt="icon">Profile</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/" target="_blank">
                                                <img src="{{asset('proguide-asset/asset/img/globe-icon.svg')}}" class="img-fluid" alt="icon">Homepage </a>
                                        </li>
                                      
                                        <li class="dropdown-item">
                                            <a href="/proguide/referal">
                                            <img src="{{asset('proguide-asset/asset/img/referral-icon.png')}}" class="img-fluid" alt="icon">Refer a Friend</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/proguide/mainbridge-ai">
                                            <img src="{{asset('proguide-asset/asset/img/projkonnectai_icon.png')}}" class="img-fluid" alt="icon">MindBridge AI</a>
                                        </li>
                                       
                                        <li class="dropdown-item">
                                            <a href="/proguide/help-center">
                                            <img src="{{asset('proguide-asset/asset/img/message-question-icon.png')}}" class="img-fluid" alt="icon">Help center</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/proguide/logout">
                                            <img src="{{asset('proguide-asset/asset/img/login-icon.png')}}" class="img-fluid" alt="icon">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--dashboard yield-->
                        @yield('dashboard-content')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
             <div class="modal-content">
                  <div class="modal-body rounded">
                    <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                        <img src="{{asset('proguide-asset/asset//img/success-star-checked.png')}}" width="50px" alt="icon">
                    </div>
                       <h3 class="text-center mb-2">Success!</h3>
                      <div class="text-center mb-2">
                        You have successfully registered for a LiveLearn Session.
                      </div>
                        <button type="button" class="new-discussion-btn w-100 mb-2">Go Back</button>
                  </div>
             </div>
        </div>
    </div>


    <!-- JS FILES -->
    <script src="{{asset('proguide-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/popper/popper.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/jquery-validate/jquery.validate.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('proguide-asset/asset/js/dashboard.js')}}"></script>
    <script src="{{asset('proguide-asset/asset/js/plugins_init.js')}}"></script>
    <script src="{{asset('proguide-asset/asset/js/main.js')}}"></script>

    <script src="{{asset('proguide-asset/vendor/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('proguide-asset/vendor/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('proguide-asset/asset/js/singleCalender.js')}}"></script>
   
    <script>
        $(document).ready(function(){

            //Notification
             $.ajax({
                url: '/notification',
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

            //Input File Handling
            $('body').on('click', '.proj-label', function(){
                $(this).siblings('input[type="file"]').click();
            })

            //file upload progress
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

                var container = $(this).parent('.evid-ctn').siblings('.proj-file-ctn');
                container.html(html);

                var initialWidth = 0;
                var targetWidth = parseInt(_this.parent('.evid-ctn').siblings('.proj-file-ctn').find('.progress').innerWidth());

                function increaseProgress() {
                
                var newWidth = (initialWidth / targetWidth) * 100;
                _this.parent('.evid-ctn').siblings('.proj-file-ctn').find(`.bar`).css('width', newWidth + '%');
                initialWidth += 1;

                _this.parent('.evid-ctn').siblings('.proj-file-ctn').find(`.percent`).text(parseInt(newWidth) + '%');

                if (initialWidth <= targetWidth) {
                    // Repeat the process after a short delay
                    setTimeout(increaseProgress, 10);
                }
                
                    if(newWidth == 100){
                            setTimeout(() => {
                                _this.parent('.evid-ctn').siblings('.proj-file-ctn').find(`small`).text(`Uploaded`);
                                _this.parent('.evid-ctn').siblings('.proj-file-ctn').find('.bar').css({backgroundColor: 'green'});
                            }, 1000);
                    }
                }
                    
                increaseProgress();
            });

            //create element for course adding js
            $('#add-chapter-btn').on('click', function(){
                let html = `
                    <div class="course-chapter mb-4">
                        <div class="form-group mb-3">
                            <h6>Chapter Title</h6>
                            <input type="text" wire:model="chapter_title" value="1. Introduction to Programming Languages" class="form-control custom">
                        </div>
                        <div class="form-group mb-4">
                            <h6>Chapter Short Description</h6>
                            <textarea wire:model="description" id="" rows="3" class="form-control custom">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure sapiente sequi inventore, facilis molestias placeat sunt error veniam nemo nobis.</textarea>
                        </div>
                        <div class="form-control custom mb-4 p-3">
                            <h6 class="mb-3">Video Content</h6>
                            <div class="proj-file-ctn mb-3"></div>
                            <span class="evid-ctn evid-ctn-sm">
                                <label class="proj-label" > <img src="asset/img/plus-dark-icon.png" width="20px" alt="icon"> <span>Upload files</span></label>
                                <input type="file"  wire:model="files" class="form-control default-input off-screen proj-file" multiple>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-control custom p-3">
                                    <h6 class="mb-3">Quiz Questions</h6>

                                    <div class="proj-file-ctn mb-3"></div>
                                    <span class="evid-ctn evid-ctn-sm">
                                        <label class="proj-label" > <img src="asset/img/plus-dark-icon.png" width="20px" alt="icon"> <span>Upload files</span></label>
                                        <input type="file"  name="files" class="form-control default-input off-screen proj-file" multiple>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="form-control custom p-3">
                                    <h6 class="mb-3">Assignment Questions</h6>

                                    <div class="proj-file-ctn mb-3"></div>
                                    <span class="evid-ctn evid-ctn-sm">
                                        <label class="proj-label" > <img src="asset/img/plus-dark-icon.png" width="20px" alt="icon"> <span>Upload files</span></label>
                                        <input type="file"  name="files" class="form-control default-input off-screen proj-file" multiple>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('#course-chapters').append(html);
            });


            //calender js
            var activeDays = [
                "2024:04:05", 
                "2024:04:10", 
                "2024:04:15", 
                "2024:04:25", 
                "2024:04:30", 
                "2024:05:01", 
                "2024:05:10", 
                "2024:05:25", 
                "2024:05:30", 
                "2024:06:20", 
                "2024:07:20"

            ];

            $("#calendar").simpleCalendar({ activeDays: activeDays });
        });

        //change profile pics js
        // document.addEventListener('DOMContentLoaded', function(){
        //     document.getElementById('profile_picture').addEventListener('change', function(){
        //         var input = this;
        //         if (input.files && input.files[0]){
        //             var reader = new FileReader();
        //             reader.onload = function(e) {
        //                 document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" width="200" height="200" />';
        //             }
   
        //             reader.readAsDataURL(input.files[0]);
        //         }
        //     })
        // });

       //referral js
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


             //code for course paid drop down
             $("#paid").on('click',function(){
                   if($("#paid").attr('checked',true)){
                        $(".course-price").removeClass('d-none');
                        $(".course-price").fadeIn(3000);
                    }
                    else{
                        $(".course-price").addClass('d-none');
                    }
               })
               $("#free").on('click',function(){
                   $(".course-price").addClass('d-none');
             })


             //Participant
             $(".participant").on('change',function(e){
                 let particpate=$(this).val();
                 if(particpate==1){
                    $(".one-to-one").removeClass('d-none');
                    $(".course-interest").addClass('d-none');
                 }
                 else if(particpate==2){
                    $(".one-to-one").addClass('d-none');
                    $(".course-interest").addClass('d-none');

                 }
                 else if(particpate==3){
                    $(".one-to-one").addClass('d-none');
                    $(".course-interest").removeClass('d-none');

                 }
                 else{
                    //do nothing
                 }
             })
            
    </script>
     
</body>

</html>