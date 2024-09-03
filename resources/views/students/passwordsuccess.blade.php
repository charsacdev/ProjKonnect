@extends('students.accountheader')
 @section('account-content')
 <div class="page-wrapper">
    <div class="auth-container">
         <div class="row">
              <div class="col-lg-6" data-aos="fade-left">
                   <div class="row">
                        <div class="col-sm-2 col-md-3 col-lg-1 col-xl-2 col-1"></div>
                        <div class="col-sm-8 col-md-6 col-lg-10 col-xl-8 col-10 auth-form-container">
                             <div class="auth-ctn d-flex align-items-center justify-content-center flex-column mt-0">
                                  <div class="text-center mb-3">
                                       <img src="{{asset('main-asset/asset/img/logo-dark.png')}}" class="auth-logo" alt="logo">
                                  </div>

                                  <form action="" class="auth-form">
                                       <div class="text-center my-4">
                                            <img src="{{asset('main-asset/asset/img/success-icon.png')}}" class="img-fluid" alt="">
                                       </div>
                                       <h3 class="text-center auth-heading">Success!</h3>
                                       <p class="text-center auth-sub-heading mb-4">
                                          Hoo! Your password has been changed successfully. 
                                       </p>
                                       <a href="/login" class="btn auth-btn mt-4">
                                            <i class="fa fa-arrow-left"></i> &nbsp;
                                            Back to login
                                       </a>
                                  </form>
                             </div>
                        </div>
                        <div class="col-sm-2 col-md-3 col-lg-1 col-xl-2 col-1"></div>
                   </div>

              </div>
              <div class="col-lg-6 d-none d-lg-block" data-aos="fade-down">
                   <div class="auth-bg">
                        <div class="auth-img-overlay"></div>
                        <img src="{{asset('main-asset/asset/img/auth-bg-img.jpg')}}"  alt="">
                   </div>
              </div>
         </div>
    </div>
</div>
 @endsection