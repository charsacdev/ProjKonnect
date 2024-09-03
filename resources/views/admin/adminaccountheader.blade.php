<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ProjKonnect - Admin</title>
     <link rel="shortcut icon" type="text/css" href="{{asset('main-asset/asset/img/favicon.ico')}}">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{asset('main-asset/vendor/bootstrap/bootstrap.min.css')}}">

     <!-- Fontawesome CSS -->
     <link rel="stylesheet" href="{{asset('main-asset/vendor/fontawesome/all.min.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha384-pzjw8+u7LVHuX7HR/TaJK1z4pQD5U6DY2P2WxI7tXDAe7MWI4VjxCt/dZRtF+l5fw" crossorigin="anonymous">


     <!-- Datatables CSS -->
     <link rel="stylesheet" href="{{asset('main-asset/vendor/datatables/css/jquery.dataTables.min.css')}}">

     <!-- Swiper CSS -->
     <link rel="stylesheet" href="{{asset('main-asset/vendor/swiper/swiper-bundle.min.css')}}">
     <link rel="stylesheet" href="{{asset('main-asset/asset/css/aos.css')}}">

     <!--Custom CSS-->
     <link rel="stylesheet" href="{{asset('main-asset/asset/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('main-asset/asset/css/responsive.css')}}">
     @livewireStyles
</head>

 <!--YIELD-->
 @yield('account-content')

  <!-- JS FILES -->
  <script src="{{asset('main-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
  <script src="{{asset('main-asset/vendor/popper/popper.js')}}"></script>
  <script src="{{asset('main-asset/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('main-asset/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('main-asset/vendor/fontawesome/all.min.js')}}"></script>
  <script src="{{asset('main-asset/vendor/jquery-validate/jquery.validate.js')}}"></script>
  <script src="{{asset('main-asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('main-asset/asset/js/aos.js')}}"></script>
  <script src="{{asset('main-asset/asset/js/plugins_init.js')}}"></script>
  <script src="{{asset('main-asset/asset/js/main.js')}}"></script>

  <script>
       $(document).ready(function(){
            $('.crt-btn').on('click', function(){
                 $(this).parent('.reg-tab').fadeOut();
                 $(this).parent('.reg-tab').siblings('.reg-tab').delay(300).fadeIn();
            });

            $('.reg-user-label').on('click', function(){
                    $('.reg-user-label').removeClass('active');
                    $(this).addClass('active');
               });
       })
  </script>
</body>
@livewireScripts
</html>