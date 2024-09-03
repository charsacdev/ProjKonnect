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
         
                                       <form action=""  class="auth-form" wire:submit.prevent="Register2">
                                            <h3 class="text-center auth-heading">Sign Up</h3>
                                            <p class="text-center auth-sub-heading mb-4">
                                                 Explore the world of endless learning with ProjKonnect
                                            </p>
                                           
                                            <div class="reg-tab" style="display:block">
                                               
                                                 <div class="form-group position-relative overflow-hidden mb-4">
                                                      <label for="student" class="reg-user-label @error('type') border border-danger @enderror"> Student
                                                           <input type="radio" class="reg-user-type" value="student" wire:model="type" name="user-type" id="student">
                                                      </label>
                                                 </div>
                                                 <div class="form-group position-relative overflow-hidden mb-4">
                                                      <label for="proguide" class="reg-user-label @error('type') border border-danger @enderror"> Proguide
                                                           <input type="radio" class="reg-user-type" value="proguide" wire:model="type" name="user-type" id="proguide">
                                                      </label>
                                                 </div>
                                                 <div class="form-group position-relative overflow-hidden mb-4">
                                                      <label for="employer" class="reg-user-label @error('type') border border-danger @enderror"> Employer
                                                           <input type="radio" class="reg-user-type" value="employer" wire:model="type" name="user-type" id="employer">
                                                      </label>
                                                      @error('type')
                                                       <div class="text-danger">{{ $message }}</div>
                                                      @enderror
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
                                                 <div class="mb-4">
                                                      <div class="input-group mb-4 i-group-div">
                                                       <input type="password" wire:model="password_confirmation" placeholder="Confirm Password" class="form-control shadow-none psw_input @error('password') border border-danger @enderror" placeholder="Password">
                                                       <div class="input-group-text rlf-hd">
                                                            <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                                                            <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                                                       </div>
                                                  </div>
                                                 </div>
                                                 <p class="terms-text">
                                                      <span>By creating an account, you acknowledge you have read and agree to our</span> <a href="/terms" target="_blank">Terms of use</a>  and <a href="/privacy" target="_blank">Privacy Policy.</a></span>
                                                 </p>
                                                 <button wire:loading.attr='disabled' wire:target="Register2" wire:submit.prevent="Register2" class="btn auth-btn mt-4">
                                                  <span wire:loading.remove>Create Account</span>
                                                       <!-- Loading indicator -->
                                                       <div wire:loading wire:target="Register2" class="loading-indicator">
                                                            <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                                       </div>
                                             </button>
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
    <script>
         $(document).ready(function(){
              $('.crt-btn').on('click', function(){
                   $(this).parent('.reg-tab').fadeOut();
                   $(this).parent('.reg-tab').siblings('.reg-tab').delay(300).fadeIn();
              });
         })
    </script>

  
</div>
