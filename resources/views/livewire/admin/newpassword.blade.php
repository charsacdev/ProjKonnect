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
                                      <form action="" class="auth-form" wire:submit.prevent="NewPassword">
                                           <h3 class="text-center auth-heading">New Password!</h3>
                                           <p class="text-center auth-sub-heading mb-4">Enter a new password for you ProjKonnect <span class="fw-bold">Admin</span>
                                                account.</p>
                                                @if(session('error'))
                                                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                                                 @elseif(session('success'))
                                                 <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                                             @endif
                                             <div class="mb-4">
                                                  <div class="input-group mb-4 i-group-div">
                                                       <input type="password" wire:model="newpassword" placeholder="Password" class="form-control shadow-none psw_input @error('password') border border-danger @enderror" placeholder="Password">
                                                       <div class="input-group-text rlf-hd">
                                                            <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                                                            <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                                                       </div>
                                                  </div>
                                           </div>
                                           <div class="mb-4">
                                              <div class="input-group mb-4 i-group-div">
                                                  <input type="password" wire:model="oldpassword" placeholder="Password" class="form-control shadow-none psw_input @error('password') border border-danger @enderror" placeholder="Password">
                                                  <div class="input-group-text rlf-hd">
                                                       <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                                                       <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                                                  </div>
                                             </div>
                                           </div>
                                           <button type="submit" wire:target="NewPassword" class="btn auth-btn mt-4">
                                             <span wire:loading.remove>Continue</span>
                                             <span wire:loading style="cursor: not-allowed">
                                                 <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                                             </span>
                                            </button>
                                           <div>
                                                <div class="new-account-ctn">
                                                      <a href="admin-projkonnect/login">
                                                         <i class="fa fa-arrow-left"></i> &nbsp;
                                                         Back to login
                                                     </a>
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
                            <img src="{{asset('main-asset/asset/img/auth-bg-img.jpg')}}"  alt="">
                       </div>
                  </div>
             </div>
        </div>
   </div>
</div>