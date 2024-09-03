@extends('homepages.homeheader')
 @section('page-contents')

 <div class="breadcrumb">
    <h3 class="breadcrumb-title">Plans & Pricing</h3>
</div>
</header>

<main>
<div class="container">
    <section id="pricing">
         <div class="container">
          <h1 class="intro text-center">Explore a range of our service plans tailored to give you the best educational experience</h1>
          <div class="d-flex align-items-center justify-content-center gap-3 pricing-toggler">
               <label>Monthly</label>
               <div class="form-check form-switch d-flex align-items-center gap-3">
                    <input type="checkbox" name="" id="flexSwitchDefault" class="form-check-input">
                    <label class="form-check-label" for="flexSwitchDefault">Yearly</label>
               </div>
          </div>
          <div class="row mt-5 justify-content-center">
                   <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card plan-card">
                             <p class="plan-type"> <img src="{{asset('main-asset/asset/img/free_tier.png')}}" alt="">Free Tier</p>
                             <h2 class="plan-amount" id="free-container">$0/month</h2>
                             <h6 class="period">Billed yearly. <span>Pay monthly</span></h6>
                             <a href="#register" class="orange-btn">Create Account</a>
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
                             <a href="#register" class="orange-btn">Create Account</a>
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
                             <a href="#register" class="orange-btn">Create Account</a>
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
              <div class="row mt-5">
                   <div class="col-12">
                       <h3 class="text-center">Frequently asked questions</h3>
                        <div class="accordion" id="accordion-faq">
                             <div class="row">
                                 
                                  <div class="col-md-1 col-lg-2">
                                      
                                  </div>
                                  <div class="col-sm-12 col-md-10 col-lg-8">
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingOne1">
                                                 <a href="#" class="accordion-button"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseOne1"
                                                      aria-expanded="true"
                                                      aria-controls="collapseOne1">
                                                      How many plans are available on the ProjKonnect platform?
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseOne1"
                                                 class="accordion-collapse collapse show"
                                                 aria-labelledby="headingOne1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           There are four plans mentioned in the document: Freemium, Basic, Platinum, and Premium.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingThree1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseThree1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseThree1">
                                                      What features are included in the Freemium plan?
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseThree1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingThree1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           The Freemium plan offers access to live tutorials, the ability to purchase curated courses, and the ability to create one 'Konnect Me' link for an employability portfolio.</p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingFive1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseFive1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseFive1">
                                                      Can I access recorded tutorial videos with the Basic plan?
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseFive1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingFive1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">Lorem Ipsum
                                                           Yes, the Basic plan includes access to recorded tutorial videos in addition to the Freemium plan features.

                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingSix1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseSix1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseSix1">
                                                      How many 'Konnect Me' links can I create with the Platinum plan?
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseSix1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingSix1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           The Platinum plan offers unlimited access to create employment portfolio links using the 'Konnect Me' feature.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingSeven1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseSeven1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseSeven1">
                                                      What is the benefit of the Premium plan over other plans?
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseSeven1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingSeven1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           The Premium plan provides access to all features offered on the ProjKonnect web application.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingEight1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseEight1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseEight1">
                                                      Can Proguides create and publish new courses on the platform? 
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseEight1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingEight1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           Yes, Proguides can create courses by uploading video content, assessments, and learning resources using course authoring tools.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingNine1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseNine1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseNine1">
                                                      How can students submit their 'Project Pitch' for feedback? 
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseNine1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingNine1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           Students can publish their completed 'Project Pitches' to submit them for feedback.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingTen1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseTen1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseTen1">
                                                      Can employers post job openings on the ProjKonnect platform? 
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseTen1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingTen1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           Yes, the 'Employment Corner' feature allows employers who sign up to post job openings with details like role, responsibilities, required skills, and salary range.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="accordion-item" data-aos="fade-up">
                                            <h2 class="accordion-header" id="headingEleven1">
                                                 <a href="#" class="accordion-button collapsed"
                                                      data-bs-toggle="collapse"
                                                      data-bs-target="#collapseEleven1"
                                                      aria-expanded="false"
                                                      aria-controls="collapseEleven1">
                                                      What functionality is available for student dashboards?
                                                      <span class="toggle-close"></span>
                                                 </a>
                                            </h2>
                                            <div id="collapseEleven1"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="headingEleven1"
                                                 data-bs-parent="#accordion-faq">
                                                 <div class="accordion-body">
                                                      <p class="m-b0 accordion-content">
                                                           The student dashboard provides access to features like enrolled courses, upcoming live sessions, job applications, interviews, project pitches, and recommendations for relevant content.
                                                      </p>
                                                 </div>
                                            </div>
                                       </div>
                                  </div>
                                  <div class="col-md-1 col-lg-2"></div>
                             </div>
                        </div>
                   </div>
              </div>
         </div>
    </section>
</div>
</main>

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

 @endsection