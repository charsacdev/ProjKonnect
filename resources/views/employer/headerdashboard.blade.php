<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer - Dashboard</title>

    <!--asset-->
    <link rel="shortcut icon" type="text/css" href="{{asset('employer-asset/asset/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('employer-asset/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('employer-asset/vendor/fontawesome/all.min.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('employer-asset/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('employer-asset/vendor/datatables/css/jquery.dataTables.min.css')}}">

    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" href="{{asset('employer-asset/vendor/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.8/plyr.js')}}"></script>

    <!--Custom CSS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <link rel="stylesheet" href="{{asset('employer-asset/asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('employer-asset/asset/css/employer.css')}}">
    <link rel="stylesheet" href="{{asset('employer-asset/asset/css/responsive.css')}}">

    @livewireScripts
    @livewireStyles
</head>


<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 sidebar">
                    <div class="sidebar-header">
                        <div class="sidebar-close d-lg-none"></div>
                        <div class="logo">
                            <img src="{{asset('employer-asset/asset/img/logo-light.png')}}" class="img-fluid mb-2 sidebar-logo" alt="">
                        </div>
                    </div>
                    <div class="sidebar-content">
                        <ul class="sidebar-nav-links">
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/dashboard" class="sidebar-link {{ Request::segment(2)==="dashboard" ? 'active' : '' }}">
                                    <img src="{{asset('employer-asset/asset/img/dashboard-img.png')}}" alt="">
                                    Dashboard
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/internship-connect" class="sidebar-link {{Request::segment(2)==="internship-contract" || Request::segment(2)==="internship-shortlisted" ||  Request::segment(2)==="internship-applicant" || Request::segment(2)==="create-internship" || Request::segment(2)==="internship-connect" ? 'active' : '' }}">
                                    <img src="{{asset('employer-asset/asset/img/intern-icon.png')}}" alt="">
                                    Internship Connect
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/internship-management" class="sidebar-link {{Request::segment(2)==="internship-management" || Request::segment(2)==="internship-management-progress" || Request::segment(2)==="internship-create-task" || Request::segment(2)==="internship-view-task" ? 'active' : '' }}">
                                    <img src="{{asset('employer-asset/asset/img/employee-icon.png')}}" alt="">
                                    Intern Management
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/employment" class="sidebar-link {{Request::segment(2)==="employment" || Request::segment(2)==="create-employment" || Request::segment(2)==="employment-applicant" || Request::segment(2)==="employment-applicant-shortlisted" || Request::segment(2)==="employment-applicant-contract"  ? 'active' : '' }}">
                                    <img src="{{asset('employer-asset/asset/img/briefcase-solid.png')}}" alt="">
                                    Employment Corner
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/employee-management" class="sidebar-link {{Request::segment(2)==="employee-management" || Request::segment(2)==="employee-management-details" || Request::segment(2)==="employee-management-task-view"  ? 'active' : '' }}">
                                    <img src="{{asset('employer-asset/asset/img/employee-icon.png')}}" alt="">
                                    Employee Management
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/schedules" class="sidebar-link {{Request::segment(2)==="schedules" || Request::segment(2)==="schedule-meeting" ? 'active' : '' }}">
                                    <img src="{{asset('employer-asset/asset/img/schedule_icon.png')}}" alt="">
                                    Schedules
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item">
                                <a href="/employer/message" class="sidebar-link {{Request::segment(2)==="message" ? 'active' : ''}}">
                                    <img src="{{asset('employer-asset/asset/img/konnect-icon.png')}}" alt="">
                                    Messages
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-footer">
                            <a href="/employer/profile" class="sidebar-link mb-5 {{Request::segment(2)==="profile" ? 'active' : ''}}">
                                <img src="{{asset('employer-asset/asset/img/setting-icon-light.png')}}" alt="">
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
                                    @elseif(Request::segment(2)==="internship-contract" || Request::segment(2)==="internship-shortlisted" || Request::segment(2)==="internship-connect" || Request::segment(2)==="create-internship" || Request::segment(2)==="internship-applicant")
                                      Internship Connect
                                    @elseif(Request::segment(2)==="internship-management" || Request::segment(2)==="internship-management-progress"  || Request::segment(2)==="internship-create-task" || Request::segment(2)==="internship-view-task")
                                       Intern Management
                                    @elseif(Request::segment(2)==="message")
                                      Messages
                                    @elseif(Request::segment(2)==="employment" || Request::segment(2)==="create-employment" || Request::segment(2)==="employment-applicant" || Request::segment(2)==="employment-applicant-shortlisted" || Request::segment(2)==="employment-applicant-contract")
                                        Employment Corner
                                    @elseif(Request::segment(2)==="employee-management" || Request::segment(2)==="employee-management-details" || Request::segment(2)==="employee-management-task-view")
                                        Employee Management
                                    @elseif(Request::segment(2)==="schedules" || Request::segment(2)==="schedule-meeting")
                                       Schedules
                                    @elseif(Request::segment(2)==="settings")
                                       Settings
                                    @elseif(Request::segment(2)==="mind-bridge")
                                       ProjKonnect AI
                                    @elseif(Request::segment(2)==="notification")
                                       Notification
                                    @elseif(Request::segment(2)==="profile")
                                       My Account
                                    @endif
                                </h1>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
    
                                <div class="profile-dropdown notify-dropdown">
                                    <div class="drop-now">
                                        <img src="{{asset('employer-asset/asset/img/notification-icon.png')}}" alt="">
                                    </div>
                                    <div class="profile-dropdown-items notify-dropdown-items d-none">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <h4 class="heading">Notifications</h4>
                                            <span>  <i class="fa fa-check-double"></i> Mark all as read</span>
                                        </div>
                                        <div class="notify-dropdown-item">
                                            <div class="notice-ctn">
                                                <div class="img">
                                                    <img src="{{asset('employer-asset/asset/img/user-picture.png')}}" alt="">
                                                </div>
                                                <div class="notice">
                                                    <p>
                                                        <b>John Does</b> added a new course, check this out!
                                                    </p>
                                                    <small class="time">23 mins ago</small>
                                                </div>
                                                <div class="resta"></div>
                                            </div>
                                            <div class="notice-ctn">
                                                <div class="img">
                                                    <img src="{{asset('employer-asset/asset/img/user-picture.png')}}" alt="">
                                                </div>
                                                <div class="notice">
                                                    <p>
                                                        <b>John Does</b> added a new course, check this out!
                                                    </p>
                                                    <small class="time">23 mins ago</small>
                                                </div>
                                                <!-- <div class="resta"></div> -->
                                            </div>
                                            <div class="text-center">
                                                <a href="/employer/notification" class="notify-btn">See all notifications</a>
                                            </div>
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
                                                <span class="role">Employer</span>
                                            </div>
                                        </div>
                                        <div class="directions close">
                                            <i class="fa fa-chevron-down"></i>
                                            <i class="fa fa-chevron-up"></i>
                                        </div>
                                    </div>
                                    <ul class="profile-dropdown-items profile-items d-none">
                                        <li class="dropdown-item">
                                            <a href="/employer/profile">
                                            <img src="{{asset('employer-asset/asset/img/user-icon-dark.png')}}" class="img-fluid" alt="icon">Profile</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="https://cassidyou.github.io/projkonnect/" target="_blank">
                                            <img src="{{asset('employer-asset/asset/img/globe-icon.svg')}}" class="img-fluid" alt="icon">Homepage</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/employer/mind-bridge">
                                            <img src="{{asset('employer-asset/asset/img/projkonnectai_icon.png')}}" class="img-fluid" alt="icon">MindBridge AI</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="help-center.html">
                                            <img src="{{asset('employer-asset/asset/img/message-question-icon.png')}}" class="img-fluid" alt="icon">Help center</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/employer/logout">
                                            <img src="{{asset('employer-asset/asset/img/login-icon.png')}}" class="img-fluid" alt="icon">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--YEILD-->
                        @yield('dashboard-content')

                        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                 <div class="modal-content">
                                      <div class="modal-body rounded">
                                        <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                                            <img src="{{asset('employer-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
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
                        <script src="{{asset('employer-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/popper/popper.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/fontawesome/all.min.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/jquery-validate/jquery.validate.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/moment/moment.min.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
                        <script src="{{asset('employer-asset/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script src="{{asset('employer-asset/asset/js/dashboard.js')}}"></script>
                        <script src="{{asset('employer-asset/asset/js/plugins_init.js')}}"></script>
                        <script src="{{asset('employer-asset/asset/js/main.js')}}"></script>
                        <script>
                            $(document).ready(function(){
                                //$('#livelearn-table_filter').addClass('d-none');
                                //$('#livelearn-table_paginate').addClass('d-none');
                               // $('#livelearn-table_info').addClass('d-none');

                               //create intern role js
                               $('.input-tag').on('keypress', function(event) {
                                    var _this = $(this);

                                    if (event.which === 13 || event.which === 44 || _this.val().indexOf(',') !== -1) { 
                                        event.preventDefault();
                                        var inputValue = $(this).val().trim();
                                        inputValue = inputValue.replace(/,/g, '');
                                        if (inputValue !== '') {
                                            var html = `
                                                <div class="tag" onclick="tagClose(event)">${inputValue} &nbsp;
                                                    <span class="cursor-p">
                                                        <i class="fa fa-times-circle"></i>
                                                    </span>
                                                        <input type="hidden" value="${inputValue}" wire:ignore wire:model="parent.tags">
                                                </div>
                                            `;
                                            _this.siblings('.tags').append(html);
                                        }
                                        _this.val('');
                                    }
                                });

                                //internship contract js
                                $('body').on('click', '.proj-label', function(){
                                    $(this).siblings('input[type="file"]').click();
                                })

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
                                                    _this.parent('.evid-ctn').find('.bar').css({backgroundColor: 'green'});
                                                }, 1000);
                                        }
                                    }
                                        
                                    increaseProgress();
                                });


                                //internship task
                                $('#add-task-btn').on('click', function(){
                                let html = `
                                <div class="task mb-4">
                                    <textarea placeholder="Enter task" id="" cols="30" rows="4" class="form-control custom"></textarea>
                                </div>
                                `;

                                $('#task-container').append(html);
                            });

                            //employment
                            $('.add-question').on('click', function(){
                            var html = `
                                <div class="form-group mb-4 question-ctn">
                                    <input type="text" name="" placeholder="Enter question" id="" class="form-control custom">
                                    <span class="remove-question cursor-p">
                                        <img src="{{asset('employer-asset/asset/img/times-close-circle.png')}}" alt="">
                                    </span>
                                </div>   
                            `;

                            $('#intv-questions').append(html);
                        })

                        $('body').on('click', '.remove-question', function(){
                            $(this).parent('.question-ctn').remove();
                        })


                        $('.input-tag').on('keypress', function(event) {
                            var _this = $(this);

                            if (event.which === 13 || event.which === 44 || _this.val().indexOf(',') !== -1) { 
                                event.preventDefault();
                                var inputValue = $(this).val().trim();
                                inputValue = inputValue.replace(/,/g, '');
                                if (inputValue !== '') {
                                    var html = `
                                        <div class="tag">${inputValue} &nbsp; <span class="delete-tag cursor-p"><i class="fa fa-times-circle"></i></span></div>
                                    `;
                                    _this.siblings('.tags').append(html);
                                }
                                _this.val('');
                            }
                        });

                        $('.delete-tag').on('click', function(){
                            $(this).parent('.tag').remove();
                        })

                });
        </script>
    </body>

    </html>