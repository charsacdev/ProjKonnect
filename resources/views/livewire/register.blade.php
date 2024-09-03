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
          
                                        <form action=""  class="auth-form" wire:submit.prevent="Registerations">
                                             <h3 class="text-center auth-heading">Sign Up</h3>
                                             <p class="text-center auth-sub-heading mb-4">
                                                  Explore the world of endless learning with ProjKonnect
                                             </p>
                                             <div class="reg-tab">
                                                  @if(session('error'))
                                                    <p class="text-danger fw-bold" style="font-size:18px">{{session('error')}}</p>
                                                  @endif
                                                  <div class="mb-4">
                                                       <div class="form-group">
                                                            <input type="text"  wire:model="fullname" placeholder="Full Name"
                                                                 class="form-control text-capitalize @error('fullname') border border-danger @enderror">
                                                                 @error('fullname')
                                                                      <div class="text-danger">{{ $message }}</div>
                                                                 @enderror
                                                       </div>
                                                  </div>
                                                  <div class="mb-4">
                                                       <div class="form-group">
                                                            <input type="email"  wire:model="email" placeholder="Email Address"
                                                                 class="form-control @error('email') border border-danger @enderror">
                                                                 @error('email')
                                                                      <div class="text-danger">{{ $message }}</div>
                                                                 @enderror
                                                       </div>
                                                  </div>
                                                 
                                                  <p class="terms-text">
                                                       <span>By creating an account, you acknowledge you have read and agree to our</span> <a href="/terms" target="_blank">Terms of use</a>  and <a href="/privacy" target="_blank">Privacy Policy.</a></span>
                                                  </p>
                                                  <button wire:loading.attr='disabled' wire:target="Registerations" wire:submit.prevent="Registerations" class="btn  auth-btn mt-4">
                                                        
                                                       <span wire:loading.remove>Continue with Email</span>
                                                       <!-- Loading indicator -->
                                                       <div wire:loading wire:target="Registerations" class="loading-indicator">
                                                            <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                                       </div>
                                                  </button>
                                                  
                                                  
                                                  <div style="padding: 30px; margin-bottom: 50px;">
                                                       <fieldset>
                                                            <legend><span>&nbsp; or &nbsp;</span></legend>
                                                       </fieldset>
                                                       <button class="btn custom-btn-outline">
                                                            <span>
                                                            <img src="{{asset('main-asset/asset/img/google-icon.png')}}" class="img-fluid">&nbsp; &nbsp; Continue with
                                                            Google
                                                            </span>
                                                       </button>
                                                       <div class="new-account-ctn"><span>Already have an account?</span> <a href="/login">Login</a></div>
                                                  </div>
                                             </div>
                                        </form>
                                        
                                   </div>
                              </div>
                              <div class="col-sm-2 col-md-3 col-lg-1 col-xl-2 col-1"></div>
                         </div>

                    </div>
                    <div class="col-lg-6 d-none d-lg-block" data-aos="fade-down" wire:ignore>
                         <div class="auth-bg">
                              <div class="auth-img-overlay"></div>
                              <img src="{{asset('main-asset/asset/img/sign-up-bg.jpg')}}"  alt="">
                         </div>
                    </div>
               </div>
          </div>
     </div>
     
</div>
