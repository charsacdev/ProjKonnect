<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>

    <!--asset-->
    <link rel="shortcut icon" type="text/css" href="{{asset('admin-asset/asset/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin-asset/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin-asset/vendor/fontawesome/all.min.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('admin-asset/vendor/swiper/swiper-bundle.min.css')}}">
     <link rel="stylesheet" href="{{asset('admin-asset/vendor/datatables/css/jquery.dataTables.min.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 

    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" href="{{asset('admin-asset/vendor/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css"/>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

    <!--Custom CSS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <link rel="stylesheet" href="{{asset('admin-asset/asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-asset/asset/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('admin-asset/asset/css/responsive.css')}}">

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
                            <img src="{{asset('admin-asset/asset/img/logo-light.png')}}" class="img-fluid mb-2 sidebar-logo" alt="">
                        </div>
                    </div>
                    
                    <div class="sidebar-content">
                        <ul class="sidebar-nav-links">
                            <li class="adm-sidebar-link-item">
                                <a href="/admin-projkonnect/dashboard" class="sidebar-link {{ Request::segment(2)==="dashboard" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/dashboard-img.png')}}" alt="">
                                    Dashboard
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin"  ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/admins" class="sidebar-link {{ Request::segment(2)==="admins" || Request::segment(2)==="create-admin" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/users-icon.png')}}" alt="">
                                      Admins
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{auth()->guard('admin')->user()->role==="admin" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/author" class="sidebar-link {{ Request::segment(2)==="author" || Request::segment(2)==="create-author" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/users-icon.png')}}" alt="">
                                    Authors
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="author" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/blogs" class="sidebar-link {{ Request::segment(2)==="blogs" || Request::segment(2)==="create-blogs" || Request::segment(2)==="edit-blogs" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/users-icon.png')}}" alt="">
                                   Blog
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="manager" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/user-management" class="sidebar-link {{ Request::segment(2)==="user-management" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/users-icon.png')}}" alt="">
                                    User Management
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="manager" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/subscription-plan" class="sidebar-link {{ Request::segment(2)==="subscription-plan" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/dollar-sub-icon.png')}}" alt="">
                                    Subscription Plans
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="manager" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/course-management" class="sidebar-link {{ Request::segment(2)==="course-management-review" || Request::segment(2)==="course-management" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/book_icon.png')}}" alt="">
                                    Course Management
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="manager" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/content-management" class="sidebar-link {{ Request::segment(2)==="content-management" || Request::segment(2)==="create-faq" || Request::segment(2)==="edit-faq" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/paper-pen-icon.png')}}" alt="">
                                    Content Management
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="finance" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/withdrawal-request" class="sidebar-link {{ Request::segment(2)==="withdrawal-request" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/dollar-sub-icon.png')}}" alt="">
                                    Withdrawal Requests
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="manager" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/contact-us" class="sidebar-link {{ Request::segment(2)==="contact-us" || Request::segment(2)==="contact-us-message" || Request::segment(2)==="bulk-email" ? 'active' : '' }}">
                                    <i class="fa fa-phone-alt" style="margin-right: 5px;"></i>
                                    Contact Us
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="manager" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/reports" class="sidebar-link {{ Request::segment(2)==="reports" || Request::segment(2)==="report-details" ? 'active' : '' }}">
                                    <img src="{{asset('admin-asset/asset/img/report-icon.png')}}" style="width: 15px!important;" alt="">
                                    Reports
                                </a>
                            </li>
                            <li class="adm-sidebar-link-item {{ auth()->guard('admin')->user()->role==="admin" || auth()->guard('admin')->user()->role==="finance" ? '' : 'd-none' }}">
                                <a href="/admin-projkonnect/settings" class="sidebar-link {{ Request::segment(2)==="settings" ? 'active' : '' }}">
                                    <i class="fa fa-cog" style="margin-right: 5px;"></i>
                                    Settings
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-footer">
                            <a href="/admin-projkonnect/profile" class="sidebar-link mb-5 {{ Request::segment(2)==="profile" ? 'active' : '' }}">
                                <img src="{{asset('admin-asset/asset/img/setting-icon-light.png')}}" alt="">
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
                                    @elseif(Request::segment(2)==="admins" || Request::segment(2)==="create-admin")
                                      Admins
                                    @elseif(Request::segment(2)==="author" || Request::segment(2)==="create-author")
                                      Authors
                                    @elseif(Request::segment(2)==="blogs" || Request::segment(2)==="create-blogs" || Request::segment(2)==="edit-blogs")
                                      Blog
                                    @elseif(Request::segment(2)==="user-management")
                                      User Management
                                    @elseif(Request::segment(2)==="subscription-plan")
                                       Subscription Plans
                                    @elseif(Request::segment(2)==="course-management" || Request::segment(2)==="course-management-review")
                                       Course Management
                                    @elseif(Request::segment(2)==="content-management" || Request::segment(2)==="create-faq" || Request::segment(2)==="edit-faq")
                                       Content Management
                                    @elseif(Request::segment(2)==="withdrawal-request")
                                       Withdrawal Requests
                                    @elseif(Request::segment(2)==="contact-us" || Request::segment(2)==="contact-us-message" || Request::segment(2)==="bulk-email")
                                      Contact Us
                                    @elseif(Request::segment(2)==="reports" || Request::segment(2)==="report-details")
                                      Reports
                                    @elseif(Request::segment(2)==="settings")
                                       Settings
                                    @elseif(Request::segment(2)==="projkonnect-ai")
                                       ProjKonnect AI
                                    @elseif(Request::segment(2)==="profile")
                                       My Account
                                    @endif
                                </h1>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
    
                                <div class="profile-dropdown notify-dropdown">
                                    <div class="drop-now">
                                        <img src="{{asset('admin-asset/asset/img/notification-icon.png')}}" alt="">
                                    </div>
                                    <div class="profile-dropdown-items notify-dropdown-items d-none">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <h4 class="heading">Notifications</h4>
                                            <span>  <i class="fa fa-check-double"></i> Mark all as read</span>
                                        </div>
                                        <div class="notify-dropdown-item">
                                            <div class="notice-ctn">
                                                <div class="img">
                                                    <img src="{{asset('admin-asset/asset/img/user-picture.png')}}" alt="">
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
                                                    <img src="{{asset('admin-asset/asset/img/user-picture.png')}}" alt="">
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
                                                <a href="notifications.html" class="notify-btn">See all notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="profile-dropdown">
                                    <div class="drop-now d-flex align-items-center justify-content-between gap-4">
                                        <div class="d-flex align-items-center align-items-start gap-3">
                                            <div class="img">
                                                @if(auth()->guard('admin')->user()->profile_photo=='')
                                                <img src="{{asset('student-asset/asset/img/user-picture.png')}}" class="img-fluid" alt="">
                                                @else
                                                <img src="{{auth()->guard('admin')->user()->profile_photo}}" class="img-fluid" alt="">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="name">
                                                    {{ucwords(auth()->guard('admin')->user()->first_name)}}&nbsp;
                                                    {{ucwords(auth()->guard('admin')->user()->last_name)}}
                                                </span>
                                                <span class="role">{{ucwords(auth()->guard('admin')->user()->role)}}</span>
                                            </div>
                                        </div>
                                        <div class="directions close">
                                            <i class="fa fa-chevron-down"></i>
                                            <i class="fa fa-chevron-up"></i>
                                        </div>
                                    </div>
                                    <ul class="profile-dropdown-items profile-items d-none">
                                        <li class="dropdown-item">
                                            <a href="profile">
                                            <img src="{{asset('admin-asset/asset/img/user-icon-dark.png')}}" class="img-fluid" alt="icon">Profile</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/" target="_blank">
                                            <img src="{{asset('admin-asset/asset/img/globe-icon.svg')}}" class="img-fluid" alt="icon">Homepage</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/admin-projkonnect/projkonnect-ai">
                                            <img src="{{asset('admin-asset/asset/img/projkonnectai_icon.png')}}" class="img-fluid" alt="icon">MindBridge AI</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="/admin/logout">
                                            <img src="{{asset('admin-asset/asset/img/login-icon.png')}}" class="img-fluid" alt="icon">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--YEILD-->
                        @yield('admin-content')

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
                        <img src="{{asset('admin-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
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
    <script src="{{asset('admin-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/popper/popper.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/jquery-validate/jquery.validate.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admin-asset/vendor/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin-asset/vendor/fileuploads/js/file-upload.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admin-asset/asset/js/dashboard.js')}}"></script>
    <script src="{{asset('admin-asset/asset/js/plugins_init.js')}}"></script>
    <script src="{{asset('admin-asset/asset/js/main.js')}}"></script>

    <script>
     $(document).ready(function(){

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
    
     });
   </script>
   @livewireScripts    
</body>
</html>