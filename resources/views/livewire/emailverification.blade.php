<div>
    
    <div class="page-wrapper">
        <div class="auth-container">
             <div class="row">
                  <div class="col-12" data-aos="fade-left">
                       <div class="row">
                            <div class="col-sm-2 col-md-3 col-lg-4 col-1"></div>
                            <div class="col-sm-8 col-md-6 col-lg-4 col-10 auth-form-container">
                                 <div class="auth-ctn d-flex align-items-center justify-content-center flex-column mt-0">
                                      <div class="text-center mb-3">
                                           <img src="{{asset('main-asset/asset/img/logo-dark.png')}}" class="auth-logo" alt="logo">
                                      </div>
                                      <form action="" class="auth-form">
                                           <div class="text-center mb-2">
                                                <img src="{{asset('main-asset/asset/img/success-star-checked.png')}}" width="60px" alt="icon">
                                           </div>
                                           <h3 class="text-center auth-heading">Success!</h3>
                                           <p class="text-center auth-sub-heading mb-4">A verification link has been sent to your email address. Click on the link to verify your email address.</p>
                                          
                                           <a href="mailto:{{$lastSegment}}" class="btn auth-btn mt-4">Open Email App</a>
                                      </form>
                                 </div>
                            </div>
                            <div class="col-sm-2 col-md-3 col-lg-4 col-1"></div>
                       </div>

                  </div>
             </div>
        </div>
   </div>

</div>
