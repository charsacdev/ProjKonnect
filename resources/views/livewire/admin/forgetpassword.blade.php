<div>
    <div class="page-wrapper">
        <div class="auth-container">
             <div class="row">
                  <div class="col-lg-6" data-aos="fade-left" wire:ignore.self>
                       <div class="row">
                            <div class="col-sm-2 col-md-3 col-lg-1 col-xl-2 col-1"></div>
                            <div class="col-sm-8 col-md-6 col-lg-10 col-xl-10 col-10 auth-form-container">
                                 <div class="auth-ctn">
                                      <div class="text-center mb-3">
                                           <img src="{{asset('main-asset/asset/img/logo-dark.png')}}" class="auth-logo" alt="logo">
                                      </div>
                                      <form action="" class="auth-form" wire:submit.prevent="ResetPassword">
                                           <h3 class="text-center auth-heading">Forgot Passord ?</h3>
                                           <p class="text-center auth-sub-heading mb-4">Reset the password for your ProjKonnect <span class="fw-bold">Admin</span>
                                                account.</p>
                                                @if(session('error'))
                                                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                                                 @elseif(session('success'))
                                                 <p class="text-success text-center fw-bold" style="font-size:18px;color:green !important">{{session('success')}}</p>
                                             @endif
                                           <div class="mb-4">
                                                <div class="form-group">
                                                     <input type="email" wire:model="email" placeholder="Email address"
                                                          class="form-control" required>
                                                         
                                                </div>
                                           </div>
                                           <div>
                                             <a class="forgot-text" href="login">Back to Login </a>
                                        </div>
                                          
                                           <button wire:loading.attr='disabled' wire:target="ResetPassword" wire:submit.prevent="ResetPassword" class="btn  auth-btn mt-4">
                                             <span wire:loading.remove>Proceed</span>
                                             <span wire:loading style="cursor: not-allowed">
                                                 <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                                             </span>
                                           </button>
                                                  
                                      </form>
                                      
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
