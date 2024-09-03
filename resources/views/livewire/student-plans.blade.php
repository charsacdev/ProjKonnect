<div>
    
    <div class="main-content">
        <section id="pricing">
             <div class="container">
               @if(session('error'))
                  <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
               @elseif(session('success'))
                 <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
              @endif
             <div class="d-flex align-items-center justify-content-center gap-3 pricing-toggler">
                   <label>Monthly</label>
                   <div class="form-check form-switch d-flex align-items-center gap-3">
                        <input type="checkbox" wire:model="duration" id="flexSwitchDefault" class="form-check-input">
                        <label class="form-check-label" for="flexSwitchDefault">Yearly</label>
                   </div>
              </div>
              <div class="row mt-5 justify-content-center">
                       <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card plan-card">
                                 <p class="plan-type"> <img src="{{asset('main-asset/asset/img/free_tier.png')}}" alt="">Free Tier</p>
                                 <h2 class="plan-amount" id="free-container">$0/month</h2>
                                 <h6 class="period">Billed yearly. <span>Pay monthly</span></h6>
                                 <!--Checking Plans Subscription-->
                                 @if($activePlan==="Free")
                                   <a href="#" disabled class="pch-btn">
                                        <span wire:loading.remove> Subscribed Plan</span>
                                         <span class="text-light bg-success px-2 rounded">
                                             Active
                                        </span>
                                   
                                        <!-- Loading indicator -->
                                        <div wire:loading  class="loading-indicator">
                                             <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                        </div>
                                   </a>
                               @else
                                   <a href="#" disabled class="pch-btn" wire:click="Subscriptions(0,'Free')">
                                        <span wire:loading.remove> Subscribe Now</span>
                                        <!-- Loading indicator -->
                                        <div wire:loading  class="loading-indicator">
                                             <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                        </div>
                                   </a>
                               @endif
                                 <small>Includes:</small>
                                 <ul>
                                      <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt=""> Free sign up.</li>
                                       <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">View LiveLearn sessions and courses.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">View listed jobs and internships.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">3 free CredShow links per month.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Free Network opportunity with other ProjKonnect users.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Access to free information webinars.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Make 3 CredShow links per month.</li>
    
                                 </ul>
                            </div>
                       </div>
                       <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card plan-card">
                                 <p class="plan-type"><img src="{{asset('main-asset/asset/img/premium_tier.png')}}" alt="">Premium Tier</p>
                                 <h2 class="plan-amount" id="premium-container">$22/month</h2>
                                 <h6 class="period">Billed yearly. <span>Pay monthly</span></h6>
                                 <!--Checking Plans Subscription-->
                                 @if($activePlan==="Premium")
                                   <a href="#" disabled class="pch-btn">
                                        <span wire:loading.remove> Subscribed Plan</span>
                                         <span class="text-light bg-success px-2 rounded">
                                             Active
                                        </span>
                                   
                                        <!-- Loading indicator -->
                                        <div wire:loading  class="loading-indicator">
                                             <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                        </div>
                                   </a>
                               @else
                                   <a href="#" disabled class="pch-btn" wire:click="Subscriptions(22,'Premium')">
                                        <span wire:loading.remove> Subscribe Now</span>
                                        <!-- Loading indicator -->
                                        <div wire:loading  class="loading-indicator">
                                             <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                        </div>
                                   </a>
                               @endif
                                 <small>Includes:</small>
                                  <ul>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Free sign up.</li>
                                         <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">View LiveLearn sessions and courses.</li>
                                         <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">View listed jobs and internships.</li>
                                         <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Network opportunity with other ProjKonnect users.</li>
                                         <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">10 CredShow links per month.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Access to MindBridge AI.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Take quizzes and assignments.</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Get ranked on assessment points</li>
                                        <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Access to exclusive webinars.</li>
                                    </ul>
                            </div>
                       </div>
                       <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card plan-card">
                                 <p class="plan-type"><img src="{{asset('main-asset/asset/img/premium_plus_tier.png')}}" alt=""> Premium Plus Tier</p>
                                 <h2 class="plan-amount" id="premium-plus-container">$60/month</h2>
                                 <h6 class="period">Billed yearly. <span>Pay monthly</span></h6>
                                 <!--Checking Plans Subscription-->
                                 @if($activePlan==="Premium Plus")
                                   <a href="#" disabled class="pch-btn">
                                        <span wire:loading.remove> Subscribed Plan</span>
                                         <span class="text-light bg-success px-2 rounded">
                                             Active
                                        </span>
                                   
                                        <!-- Loading indicator -->
                                        <div wire:loading  class="loading-indicator">
                                             <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                        </div>
                                   </a>
                               @else
                                   <a href="#" disabled class="pch-btn" wire:click="Subscriptions(60,'Premium Plus')">
                                        <span wire:loading.remove> Subscribe Now</span>
                                        <!-- Loading indicator -->
                                        <div wire:loading  class="loading-indicator">
                                             <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                        </div>
                                   </a>
                               @endif
                                 <small>Includes:</small>
                                 <ul>
                                     <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Free sign up.</li>
                                     <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">View LiveLearn sessions and courses.</li>
                                     <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">View listed jobs and internships.</li>
                                     <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Network opportunity with other ProjKonnect users.</li>
                                     <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Unlimmited CredShow links per month.</li> 
                                    <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Unlimited MindBridge AI.</li>
                                    <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Take quizzes and assignments.</li>
                                    <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Get ranked on assessment points.</li>
                                    <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Access to exclusive webinars.</li>
                                    <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Access to collaboration and project pitch creation.</li>
                                    <li><img src="{{asset('main-asset/asset/img/tick-circle.png')}}" width="20px" alt="">Access to innovation rooms.</li>
    
                                 </ul>
                            </div>
                       </div>
                  </div>
                 
             </div>
        </section>
    </div>
    <script>
     var premium_monthly_plan = 22;
      var premium_yearly_plan = 22 * 12;
      var premium_plus_monthly_plan = 60;
      var premium_plus_yearly_plan = 60 * 12;

      var premium_container = document.getElementById("premium-container");
      var premium_plus_container = document.getElementById("premium-plus-container");
      var free_container = document.getElementById('free-container');

      premium_container.textContent = `$${premium_monthly_plan}/month`;
      premium_plus_container.textContent = `$${premium_plus_monthly_plan}/month`;
      free_container.textContent = '$0/month';

      document.querySelector(".pricing-toggler .form-check.form-switch").addEventListener("click", function() {
      var isChecked = document.getElementById('flexSwitchDefault').checked;

      if (isChecked) {
           premium_container.textContent = `$${premium_yearly_plan}/year`;
           premium_plus_container.textContent = `$${premium_plus_yearly_plan}/year`;
           free_container.textContent = '$0/year';
      } else {
           premium_container.textContent = `$${premium_monthly_plan}/month`;
           premium_plus_container.textContent = `$${premium_plus_monthly_plan}/month`;
           free_container.textContent = '$0/month';
      }
});

</script>

</div>
