<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Project Pitch</title>

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
    <div class="header-lg-ctn mb-5">
        <h2>Project Pitch</h2>
        <div class="cred-progress-ctn">
         <div class="cred-bar"></div>
        </div>
    </div>
    
    <div class="px-3 py-3">
       @livewire('student-pitch-preview')
    </div>
 
    <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body rounded overflow-hidden">
                        <h5>Share</h5>
                        <div class="sharer-ctn">
                            <div class="sharer  whatsapp">
                                <div class="img">
                                    <img src="{{asset('student-asset/asset/img/whatsapp-icon.png')}}" alt="icon">
                                </div>
                                <span>Whatsapp</span>
                            </div>
                            <div class="sharer facebook">
                                <div class="img">
                                    <img src="{{asset('student-asset/asset/img/facebook-icon-alt.png')}}" alt="icon">
                                </div>
                                <span>Facebook</span>
                            </div>
                            <div class="sharer email">
                                <div class="img">
                                    <img src="{{asset('student-asset/asset/img/email-icon.png')}}" alt="icon">
                                </div>
                                <span>Email</span>
                            </div>
                        </div>
                        <div class="share-link-ctn">
                            <div class="custom-tooltip">
                                Copied!
                            </div>
                            <input type="text" id="sharelink" value="https://credshow.projkonnect.com/johndoe343">
                            <button class="copy-btn" id="btnCopy">Copy</button>
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


    })
</script>
</body>

</html>