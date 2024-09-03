<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiveLearn - Session</title>

     <!--Agora SDK-->
     <script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>

    <!--asset-->
    <link rel="shortcut icon" type="text/css" href="{{asset('proguide-asset/asset/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('proguide-asset/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('proguide-asset/asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('proguide-asset/asset/css/proguide.css')}}">
    <link rel="stylesheet" href="{{asset('proguide-asset/asset/css/responsive.css')}}">

    @livewireStyles
    @livewireScripts
</head>

<body>
     
  @livewire('lives-session-meeting-general')


<script src="{{asset('student-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
<script src="{{asset('student-asset/asset/js/main.js')}}"></script>
</body>
</html>