<div>
     <main>
         <div class="container" wire:ignore>
              <section>
                   <div class="row">
                        <div class="col-md-8 mb-5">
                             <div class="git-ctn">
                                  <h2 data-aos="fade-up" class="cu-title">get in touch</h2>
                                  <div id="contact-intro-ctn" data-aos="fade-up">
                                       <h3 class="sub-cu-title">Contact ProjKonnect</h3>
                                       <p class="support-text">
                                         Unlock the power of seamless collaboration and unlock your full potential by staying connected with the dedicated ProjKonnect team, who are committed to providing unparalleled support and guidance every step of the way.
                                       </p>
                                  </div>
                                  
                                  <!--message response-->
                                    @if(session('error'))
                                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                                         @elseif(session('success'))
                                         <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                                    @endif
 
                                  <form action="#" class="contact-form" wire:submit.prevent="SendMessage">
                                       <div class="row mb-5">
                                            <div class="col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                                                <label>Your Name</label>
                                                 <input type="text" wire:model="name" required class="form-control mt-0" placeholder="Your Name">
                                            </div>
                                            <div class="col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                                                <label>Email Address</label>
                                                 <input type="text" wire:model="email" required class="form-control mt-0" placeholder="Email Address">
                                            </div>
                                            <div class="col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                                                <label>Phone</label>
                                                 <input type="text" wire:model="phone" required class="form-control mt-0" placeholder="Phone">
                                            </div>
                                            <div class="col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                                                <label>Type of Enquiry</label>
                                                 <select wire:model="inquiry" required class="form-control mt-0">
                                                  <option>Type of Enquiry</option>
                                                  <option>Enquiry </option>
                                                  <option>Refund request</option>
                                                  <option>Feedback </option>
                                                  <option>Technical support</option>
                                                  </select>
                                            </div>
                                            <div class="col-12 mb-4" data-aos="fade-up" data-aos-delay="300">
                                                <label>Message</label>
                                                 <textarea name="" class="form-control mt-0" wire:model="message" required  rows="10" placeholder="Write Message"></textarea>
                                            </div>
                                       </div>
                                       <button class="btn btn-inq" data-aos="fade-up">
                                            <span wire:loading.remove>Send Message</span>
                                                   <span wire:loading wire:target="SendMessage" style="cursor: not-allowed">
                                                        <i class="fa fa-spin fa-spinner"></i>&nbsp;Sending...
                                                   </span>
                                         </button>
                                  </form>
                             </div>
                        </div>
                        <div class="col-md-4">
                             <h2 data-aos="fade-up" class="cu-title">contact details</h2>
                             <div id="contact-info-intro-ctn"></div>
                             <div class="contact-details">
                                  <div class="cd-ctn" data-aos="fade-up">
                                       <h3>Address</h3>
                                       <p>1 Ndoni street, New GRA Port Harcourt - Rivers, Nigeria</p>
                                  </div>
                                  <div class="cd-ctn" data-aos="fade-up">
                                       <h3>Phone</h3>
                                       <p><a class="text-decoration-none text-dark" href="tel:2348032195635">+2348032195635</a></p>
                                  </div>
                                  <div class="cd-ctn" data-aos="fade-up">
                                       <h3>Help Desk</h3>
                                       <p>Visit our help desk to find solutions for every problem you may encounter</p>
                                  </div>
                                  <div class="cd-ctn" data-aos="fade-up">
                                       <h3>Social</h3>
                                       <ul class="social-links">
                                            <li><a href="https://www.facebook.com/ProKonnectInc?mibextid=LQQJ4d" target="_blank" class="link"><i class="fab fa-facebook"></i></a></li>
                                            <li><a href="https://instagram.com/projkonnect?igshid=MmIzYWVlNDQ5Yg==" target="_blank" class="link"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://twitter.com/pro4u2konnect?s=21&t=HDwVMUEqua1hc27I81e0tw" target="_blank" class="link"><img src="{{asset('main-asset/asset/img/social-twitter-icon.png')}}" alt="Twitter logo"></a></li>
                                       </ul>
                                  </div>
                             </div>
                        </div>
                   </div>
              </section>
 
         </div>
   </main>
 </div>
 