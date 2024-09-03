<div>
     
    <div class="page-wrapper">
        <div class="auth-container">
             <div class="row">
                  <div class="col-lg-6" data-aos="fade-left" wire:ignore.self>
                       <div class="row">
                            <div class="col-sm-2 col-md-3 col-lg-1 col-xl-2 col-1"></div>
                            <div class="col-sm-8 col-md-6 col-lg-10 col-xl-8 col-10 auth-form-container">
                                 <div class="auth-ctn">
                                      <div class="text-center mb-3">
                                           <img src="{{asset('main-asset/asset/img/logo-dark.png')}}" class="auth-logo" alt="logo">
                                      </div>
                                      <form action="" class="auth-form" wire:submit.prevent="login">
                                        <p class="alert alert-warning" wire:offline>
                                             Whoops, your device has lost connection. The web page you are viewing is offline.
                                           </p>
                                           <h3 class="text-center auth-heading">Welcome back!</h3>
                                           <p class="text-center auth-sub-heading mb-4">Sign in to your ProjKonnect
                                                account to
                                                contiue</p>
                                                @if(session('error'))
                                                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                                                 @elseif(session('success'))
                                                 <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                                             @endif
                                           <div class="mb-4">
                                                <div class="form-group">
                                                     <input type="text" wire:model="email" placeholder="Email address"
                                                          class="form-control @error('email') border border-danger @enderror">
                                                          @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                       @enderror
                                                </div>
                                           </div>
                                           <div class="mb-4">
                                             <div class="input-group mb-4 i-group-div">
                                                  <input type="password" wire:model="password" placeholder="Password" class="form-control shadow-none psw_input @error('password') border border-danger @enderror" placeholder="Password">
                                                  <div class="input-group-text rlf-hd">
                                                       <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                                                       <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                                                  </div>
                                             </div>
                                             @error('password')
                                               <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                           <div class="d-flex ckd-pswd align-items-center justify-content-between">
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                     <div
                                                          class="form-check custom-checkbox checkbox-success check-lg">
                                                          <input type="checkbox" class="form-check-input"
                                                               id="customCheckBox8">
                                                          <label class="form-check-label"
                                                               for="customCheckBox8">Remember password</label>
                                                     </div>
                                                </div>
                                                <div>
                                                     <a class="forgot-text" href="/forgotpassword">Forgot password?</a>
                                                </div>
                                           </div>
                                           <button wire:loading.attr='disabled' wire:target="login" wire:submit.prevent="login" class="btn  auth-btn mt-4">
                                              <span wire:loading.remove>Sign in</span>
                                                  <!-- Loading indicator -->
                                             <div wire:loading wire:target="login" class="loading-indicator">
                                                  <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                             </div>
                                        </button>
                                                  
                                      </form>
                                      <div style="padding: 30px; margin-bottom: 50px;">
                                           <fieldset>
                                                <legend><span>&nbsp; or &nbsp;</span></legend>
                                           </fieldset>
                                           <a href="login/google">
                                           <button class="btn custom-btn-outline">
                                                <span>
                                                     <img src="{{asset('main-asset/asset/img/google-icon.png')}}" class="img-fluid">&nbsp;
                                                     &nbsp;
                                                     Continue with
                                                     Google
                                                </span>
                                           </button>
                                           </a>
                                           <div class="new-account-ctn"><span>Don't have an account?</span> <a
                                                     href="/register">Create an
                                                     account</a></div>
                                      </div>
                                 </div>
                            </div>
                            <div class="col-sm-2 col-md-3 col-lg-1 col-xl-2 col-1"></div>
                       </div>

                  </div>
                  <div class="col-lg-6 d-none d-lg-block" data-aos="fade-down" wire:ignore>
                       <div class="auth-bg">
                            <div class="auth-img-overlay"></div>
                            <img src="{{asset('main-asset/asset/img/auth-bg-img.jpg')}}"  alt="">
                       </div>
                  </div>
             </div>
        </div>
   </div>
</div>
