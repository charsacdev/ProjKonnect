<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@php
    $blogPost = session('blogPost');
@endphp
  <link rel="shortcut icon" type="text/css" href="{{asset('main-asset/asset/img/favicon.png')}}">
  @php
    $segment = Request::segment(1);

    switch ($segment) {
        case 'blogpost':
            $title = "{$blogPost->blog_title} - ProjKonnect";
            $description = $blogPost->blog_content;
            $imagelink = $blogPost->blog_photo;
            break;
            
        case 'blog':
            $title = "ProjKonnect - Blog";
            $description = " ";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/favicon.png";
            break;
    
        case 'aboutus':
            $title = "ProjKonnect - About Us";
            $description = "Our supportive community nurtures your growth, ensuring seamless transitions from classroom to career. Embrace excellence with ProjKonnect's comprehensive ecosystem designed for your success.";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/about-hero-bg-img.png";
            break;
    
        case 'pricing':
            $title = "ProjKonnect - Plans & Pricing";
            $description = "Explore a range of our service plans tailored to give you the best educational experience";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/favicon.png";
            break;
    
        case 'contact':
            $title = "ProjKonnect - Contact Us";
            $description = "Unlock the power of seamless collaboration and unlock your full potential by staying connected with the dedicated ProjKonnect team, who are committed to providing unparalleled support and guidance every step of the way. ";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/favicon.png"; 
            break;
            
        case 'faq':
            $title = "ProjKonnect - Faq";
            $description = "Frequently asked questions";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/favicon.png";
            break;
            
        case 'terms':
            $title = "ProjKonnect - Terms and Conditions";
            $description = "This Privacy Policy governs the manner in which Proj-Konnect Integrated Systems Ltd (ProjKonnect, we, us, or our) collects, uses, maintains, and discloses information collected from users (each, a User) of the website www.projkonnect.com (the Site) and the ProjKonnect App.";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/favicon.png";
            break;
            
        case 'privacy':
            $title = "ProjKonnect - Privacy";
            $description = "This Privacy Policy governs the manner in which Proj-Konnect Integrated Systems Ltd (ProjKonnect, we, us, or our) collects, uses, maintains, and discloses information collected from users (each, a User) of the website www.projectkonnect.com (the Site) and the ProjKonnect App.";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/favicon.png";
            break;
            
            
    
        default:
            $title = "ProjKonnect - Home";
            $description = "Bridging the Gap Between Education and Career Connect with industry professionals, curriculum experts, and potential employers to seamlessly integrate academic learning with career development. Enhance your skills, build your network, and prepare for a successful career journey. ";
            $imagelink = "https://projkonnect.com/main-asset/asset/img/home-hero-img.png";
            break;
    }
    
    $descriptionWords = explode(' ', $description);
    $limitedDescription = substr(implode(' ', $descriptionWords), 0, 150);
    
  @endphp

         
      <title>{{$title}}</title>
      <meta property="og:description" content="{{ strip_tags($limitedDescription) }}">
      <meta property="og:image" content="{{$imagelink}}">
      <meta property="og:url" content="{{ url()->current() }}">
      <meta property="og:type" content="article">
      <!-- Optional: Twitter Card meta tags -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:description" content="{{ strip_tags($limitedDescription) }}">
      <meta name="twitter:image" content="{{$imagelink}}">
      <meta name="twitter:url" content="{{ url()->current() }}">
     
      

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('main-asset/vendor/bootstrap/bootstrap.min.css')}}">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{asset('main-asset/vendor/fontawesome/all.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-pzjw8+u7LVHuX7HR/TaJK1z4pQD5U6DY2P2WxI7tXDAe7MWI4VjxCt/dZRtF+l5fw" crossorigin="anonymous">

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="{{asset('main-asset/vendor/datatables/css/jquery.dataTables.min.css')}}">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="{{asset('main-asset/vendor/swiper/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{asset('main-asset/asset/css/aos.css')}}">

  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

  <!--Custom CSS-->
  <link rel="stylesheet" href="{{asset('main-asset/asset/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('main-asset/asset/css/responsive.css')}}">
</head>
<body>

  <div class="page-wrapper">
    <header class="header1 header-index">
      <nav class="navbar navbar-expand-lg">
        <div class="container cosynav">
          <a class="navbar-brand" href="/">
            <img src="{{asset('main-asset/asset/img/logo-dark.png')}}" class="img-fluid" id="logo" alt="logo">
          </a>

          <!-- Nav Item -->
          <ul class="navbar-nav ma-auto  nav-sm">
            <!-- Logo on small screen -->
            <div class="sm-logo-ctn d-lg-none ">
              <img src="{{asset('main-asset/asset/img/logo-light.png')}}" class="img-fluid mb-2" alt="">
            </div>
            <!-- <span class="close d-lg-none d-sm-block">&times;</span> -->
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1)==="" ? 'active' : '' }}" href="/">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1)==="aboutus" ? 'active' : '' }}" href="/aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1)==="pricing" ? 'active' : '' }}" href="/pricing">Plans & Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link getstarted-btn {{ Request::segment(1)==="contact" ? 'active' : '' }}" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link getstarted-btn {{ Request::segment(2)==="blogpost" || Request::segment(1)==="blog" ? 'active' : '' }}" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
              <a href="/login" class="nav-link custom-btn btn-primary-outline">
                Login
              </a>
            </li>
            <li class="nav-item">
              <a href="/register" class="nav-link custom-btn btn-primary white-color">
                Sign Up
              </a>
            </li>
            <li class="nav-item d-none">
              <a href="https://mailchi.mp/5f329d8d3c53/projkonnect-webapp-waitlist" target="_blank" class="nav-link custom-btn btn-primary white-color">
                Join Waitlist
              </a>
            </li>
          </ul>
          <!-- Harmburger menu icon -->
          <div class="menu-btn d-lg-none d-sm-block">
            <div class="menu-btn-burger"></div>
          </div>
        </div>
        <span class="progress-bar d-none">
          <span class="progress"></span>
        </span>
      </nav>
    </header>
  </div>

      <!-------CONTENTS------>
      @yield('page-contents')


      <!--footer-->
      <footer>
        <div class="container">
          <div class="row mb-4">
           <div class="col-md-4 mb-4">
            <div class="footer-logo">
              <img src="{{asset('main-asset/asset/img/logo-light.png')}}" alt="logo">
            </div>
            <h2 class="footer-intro">Getting You Ready for Excellence</h2>
           </div>
           <div class="col-md-1 d-none d-md-block"></div>
           <div class="col-md-7 mb-4">
            <form action="">
                <h5 class="text-light mb-3" style="font-size:16px">Let's keep you updated with education and technology news around the world.</h5>
              <div class="custom-input-group">
                <img src="{{asset('main-asset/asset/img/envelope_img.png')}}" alt="icon">
                <input type="text" placeholder="Email Address">
                <button>Subscribe</button>
              </div>
            </form>
           </div>
          </div>
          <div class="row align-items-start">
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-4 mb-4">
                  <h6 class="link-heading">Quick links</h6>
                  <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/aboutus">About Us</a></li>
                    <li><a href="/pricing">Plans & Pricing</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/faq">Faq</a></li>
                    <li><a href="/terms">Terms <span style="text-transform:lowercase">a</span>nd <span style="text-transform:lowercase">c</span>onditions</a></li>
                    <li><a href="/privacy">Privacy policy</a></li>
                  </ul>
                </div>
                <div class="col-sm-4 mb-4">
                  <h6 class="link-heading">company</h6>
                  <ul class="footer-links">
                    <li><a href="javascript:;">Education</a></li>
                    <li><a href="javascript:;">Innovation</a></li>
                    <li><a href="javascript:;">Career</a></li>
                    
                    
                  </ul>
                </div>
                <div class="col-sm-4 mb-4">
                  <h6 class="link-heading">products</h6>
                  <ul class="footer-links">
                    <li><a href="javascript:;">LiveLearn</a></li>
                    <li><a href="javascript:;">CredShow</a></li>
                    <li><a href="javascript:;">Hire Talents</a></li>
                    <li><a href="javascript:;">MindBridge AI</a></li>
                    <li><a href="javascript:;">Project Pitch</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="socials">
                <a href="https://www.facebook.com/ProKonnectInc?mibextid=LQQJ4d" target="_blank"><img src="{{asset('main-asset/asset/img/social-facebook-icon.png')}}" alt="Facebook logo"></a>
                <a href="https://instagram.com/projkonnect?igshid=MmIzYWVlNDQ5Yg==" target="_blank"><img src="{{asset('main-asset/asset/img/social-instagram-icon.png')}}" alt="Instagram logo"></a>
                <a href="https://twitter.com/pro4u2konnect?s=21&t=HDwVMUEqua1hc27I81e0tw" target="_blank"><img src="{{asset('main-asset/asset/img/social-twitter-icon.png')}}" alt="Twitter logo"></a>
                <a href="javascript:;"><img src="{{asset('main-asset/asset/img/social-linkedin-icon.png')}}" alt="Linkedin logo"></a>
              </div>
            </div>
          </div>
        </div>
      </footer>
  
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
      const player = new Plyr('#player', {
          controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
          debug: false
      });
  </script>

   <!--javascript-->
   <script>
    var currentURL = window.location.href;
    var urlSegments = currentURL.split('/');

    var lastValue = urlSegments[urlSegments.length - 1];

      var cookieName = 'Projkonnect';

        //generate code
        function generatecookieValue(length) {
          var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
          var cookieValue = '';
        
          for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
              cookieValue += characters.charAt(randomIndex);
          }
        
          return cookieValue;
        }
        
        var cookieValue = "PRJ"+generatecookieValue(20);
        var days="30";
        
        function getCookie(cname) {
              let name = cname + "=";
              let ca = document.cookie.split(';');
              for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                  c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                  return c.substring(name.length, c.length);
                }
              }
              return "";
          }
          
          var CheckCookie=getCookie('Projkonnect');
         
         //set cookie
         if(CheckCookie){
             
         }
         else{
             
             var MainCookie;
             //cookie value
             if(lastValue===''){
                 
                 MainCookie = cookieValue;
             }
             else{
                 
                MainCookie = lastValue; 
             }
             
              const d = new Date();
              d.setTime(d.getTime() + (days*24*60*60*1000));
              var expires = "expires="+ d.toUTCString();
              document.cookie = cookieName + "=" + MainCookie + ";" + expires + ";path=/";

         }
       
  </script>
  
  </body>
 
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/61c0608680b2296cfdd2915b/1fnbni3ns';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
</html>