@extends('homepages.homeheader')
 @section('page-contents')

 <div class="hero">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-7">
          <div class="hero-content-ctn">
            <h1 class="hero-header"><span class="primary-color">Bridging</span> the Gap Between <span class="primary-color">Education</span> and <span class="primary-color">Career</span></h1>
            <p class="support-text">
             Connect with industry professionals, curriculum experts, and potential employers to seamlessly integrate academic learning with career development. Enhance your skills, build your network, and prepare for a successful career journey.
            </p>
            <div class="hero-btn-ctn">
              <a href="javascript:;" class="custom-btn btn-primary mr-2">Start Learning  </a>
              <a href="javascript:;" class="custom-btn btn-primary-outline primary-color">Guide Students </a>
            </div>
            
            <p class="support-text1">
              Join us now to access our employment opportunities portal, pitch your projects, and discover the endless possibilities of talent and collaboration.
            </p>
          </div>
        </div>
        <div class="col-sm-12 d-none d-lg-block col-lg-5">
          <div>
            <img src="{{asset('main-asset/asset/img/home-hero-img.png')}}" alt="hero image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

<main>
  <section id="about">
    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="500" class="section-title text-center">What is <span class="primary-color">ProjKonnect?</span></h2>
      <p data-aos="fade-up" data-aos-delay="500">
        ProjKonnect is an innovative Edu-tech platform designed to connect university students across various institutions and academic programs. Our mission is to foster an integrated academic and career development experience by uniting students, industry professionals, curriculum experts, and potential employers.
        </p>

      <div class="row mb-5 pb-3">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
              <div class="unknown-ctn first">
                <div class="unknown">
                  <img src="{{asset('main-asset/asset/img/home-one.png')}}" class="img-flui" alt="">
                  <button class="btn start-btn">Get Started as a Student or a Proguide</button>
                </div>
              </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
              <div class="unknown-ctn last">
                <div class="unknown">
                  <img src="{{asset('main-asset/asset/img/home-two.png')}}" class="img-flui" alt="">
                  <button class="btn start-btn">Get Started as an Employer</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
    </div>
  </section>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mt-4 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="300">
          <div class="">
            <h2 class="section-sub-title about">Everything you can do in a physical classroom, <span class="primary-color"> you can do even more with ProjKonnect.</span></h2>
            <p class="p-describe about">
             We enhance traditional classroom experiences by offering interactive live tutorials and high-quality curated course contents, providing personalised learning and additional resources that extend beyond the limitations of a physical classroom. <a href="/aboutus" class="learn-more primary-color">Learn more</a>.
           </p>
          </div>
        </div>
        <div class="col-lg-5 mt-4 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="500">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/dWR7sOPhPKs?si=qh5VE6by2BFqW8Cl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
         
            {{-- <video id="player" controls playsinline data-poster="asset/img/video_thumbnail.jpg">
              <source src="{{asset('main-asset/asset/video/home-video.mp4')}}" class="h-100" type="video/mp4">
              </video> --}}
        </div>
      </div>
    </div>


  <section id="features">
    <div class="container">
      <div class="row mt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <h2 data-aos="fade-up" class="section-title text-center">Our <span class="primary-color">Features</span></h2>
          <p data-aos="fade-up" class="support-text text-center">
            These extraordinary features can make learning activities more efficient and enjoyable.
          </p>
          <div class="row mt-5">
            <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
              <img src="{{asset('main-asset/asset/img/home-img-2.png')}}" class="img-fluid w-100 pr" alt="">
            </div>
            <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="500">
              <h2 class="section-sub-title ">
                Live <span class="primary-color">academic tutorials</span> and curated course content
              </h2>
              <p class="p-describe ">
                With ProjKonnect, you can guide students globally through Student-Proguide connections. Undergraduates can host or attend live tutorials via LiveLearn and complete certified courses in essential 21st-century skills. Our advanced Artificial Intelligence (AI) tool, MindBridge AI, supports personal study, project research, and management. Parents can also find personalised support for their children's learning, homework, and exam preparation.
             </p>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>

      <div class="ctn-pt-5">
        <div class="row mt-5">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <div class="row mt-5">
              <div class="col-lg-5 mt-4 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-sub-title">
                  Tools to build <span class="primary-color">visual employability profiles</span> for students
                </h2>
                <p class="p-describe">
                  CredShow offers powerful tools to help you create compelling visual employability profiles. Showcase your skills, projects, and achievements in a professional and engaging way to stand out to employers and industry experts.
                </p>
              </div>
              <div class="col-lg-7 mt-4 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="500">
                <img src="{{asset('main-asset/asset/img/home-three.png')}}" class="img-fluid w-100 pl" alt="">
              </div>
            </div>
          </div>
          <div class="col-lg-1"></div>
        </div>
      </div>
     <div class="ctn-pt-5">
      <div class="row mt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="row mt-5">
            <div class="col-lg-7 mt-4" data-aos="fade-up" data-aos-delay="400">
              <img src="{{asset('main-asset/asset/img/home-four.png')}}" class="img-fluid w-100 pr" alt="">
            </div>
            <div class="col-lg-5 mt-4" data-aos="fade-up" data-aos-delay="500">
              <h2 class="section-sub-title">
                A space for students to <span class="primary-color">pitch projects</span> and get feedback
              </h2>
              <p class="p-describe">
                Pitch your ideas with confidence and creativity, showcasing your skills, innovations, and vision to a global audience of industry professionals and potential investors.
            </p>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
     </div>
     <div class="ctn-pt-5">
      <div class="row mt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="row mt-5">
            <div class="col-lg-5 mt-4 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="400">
              <h2 class="section-sub-title">
                Enabling industry professionals to <span class="primary-color">discover student talent</span>                  </h2>
              <p class="p-describe">
                As an employer, discover and connect emerging talents. Explore student projects, view their detailed profiles, and find the next generation of innovators and professionals for your team.
              </p>
            </div>
            <div class="col-lg-7 mt-4 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="500">
              <img src="{{asset('main-asset/asset/img/home-five.png')}}" class="img-fluid w-100 pl" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
     </div>
     <div class="ctn-pt-5">
      <div class="row mt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="row mt-5">
            <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
              <img src="{{asset('main-asset/asset/img/home-six.png')}}" class="img-fluid w-100 pr" alt="">
            </div>
            <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="500">
              <h2 class="section-sub-title">
                An <span class="primary-color">employment opportunities</span> portal integrated into the platform
              </h2>
              <p class="p-describe">
                Our integrated employment portal connects you with potential employers and helps you find the perfect opportunity to advance your career.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
     </div>
    </div>
  </section>

  <section id="ambassadors">
    <div class="container mt-5">
      <h2 data-aos="fade-up" class="section-title text-center">UniKonnect Ambassadors.</span></h2>
      <p data-aos="fade-up" class="support-text text-center mb-5">
       Prouldly introducing our UniKonnect Ambassadors. They fuel academic and digital entrepreneur bootcamps,
       connecting us to students.
      </p>
      <div class="row justify-content-center">
       
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/CHIDINMAUBANI.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Comfort Ubani<br>
            (Team Lead)<br>
            Enugu State University, Nigeria</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/ANUNOBISAMUEL.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Anunobi Samuel</p>
            <p class="card-address" style="font-size:14px">Michael Okpara University Of Agriculture, Nigeria</p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/INYAOZIOMA1.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Inya Ozioma</p>
            <p class="card-address" style="font-size:14px">Michael Okpara University Of Agriculture, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/MICHAELCHINONSO.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Michael Onwumere</p>
            <p class="card-address" style="font-size:14px"> Michael Okpara University Of Agriculture, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/NGENEFAVOUR.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Ngene Favour</p>
            <p class="card-address" style="font-size:14px">Enugu State University Of Science And Technology, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/NJOKUGODSON.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Njoku Godson</p>
            <p class="card-address" style="font-size:14px">Michael Okpara University Of Agriculture, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/NWABUISIFAITHC.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Nwabuisi Faith</p>
            <p class="card-address" style="font-size:14px">Enugu State University Of Science And Technology, Nigeria </p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/OFFORHAPPINESS.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Offor Happiness</p>
            <p class="card-address" style="font-size:14px">Abia State University, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/OLUSAIYECLEMENT.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Olusaiye Clement</p>
            <p class="card-address" style="font-size:14px">Prince Audu Abubakar University, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/SHITTUFARIDAT.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Shittu Faridat</p>
            <p class="card-address" style="font-size:14px">Al-Hikmah University Illorin, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/SUNDAYUSMAN.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Sunday Usman</p>
            <p class="card-address" style="font-size:14px"> Prince Audu Abubakar University, Nigeria</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-lg-3 mb-5" data-aos="fade-up">
          <div class="amba-card">
            <div class="img">
              <img src="{{asset('main-asset/asset/unikons/ULUNJOSHUA.jpg')}}" alt="ambassador image">
            </div>
            <p class="card-name">Ulu Joshua</p>
            <p class="card-address" style="font-size:14px">Michael Okpara University of Agriculture, Nigeria</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="testimonial">
    <div class="container mt-5">
      <h2 data-aos="fade-up" class="section-title text-center">Testimonials</span></h2>
      <p data-aos="fade-up" class="support-text text-center mb-5">
        Here are some testimonies from ProjKonnect users
      </p>
      <div class="cards mt-5" data-aos="fade-up" data-aos-delay="500">
        <div class="swiper testimonial-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testi-card">
                <p class="testimony">
                  "ProjKonnect's educational webinars and motivation has helped me discover solutions to 21st-century problems. Thanks to ProjKonnect, I've gained a competitive edge and transformed my business operations. I highly recommend ProjKonnect to anyone yearning for success"
                </p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                  <div class="img d-none">
                    <img src="{{asset('main-asset/asset/img/testimonial-img.png')}}" class="img-fluid" alt="">
                  </div>
                  <div>
                    <h4 class="testifier">Ulu Joshua</h4>
                    <h5 class="testifier-role">(Michael Okpara University Of Agriculture, Nigeria)</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testi-card">
                <p class="testimony">
                  "When I first joined ProjKonnect I didn't really see the need to improve in writing and interact with people. Thanks to ProjKonnect, I was able to break out of my comfort zone and recognize the importance of taking action to improve my life"
                </p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                  <div class="img d-none">
                    <img src="{{asset('main-asset/asset/img/testimonial-img.png')}}" class="img-fluid" alt="">
                  </div>
                  <div>
                    <h4 class="testifier">Offor Happiness</h4>
                    <h5 class="testifier-role">(Abia State University,Nigeria)</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testi-card">
                <p class="testimony">
                  "I joined the UniKonnect-Intern programme, and right from then it has been a journey of breaking limits, from having meetings with fellow young minds about self development, to organizing biweekly campus shoutouts to impactful training. It all was a novelty. Won't end without referring to the great amount of trust and faith our organizer Mr Paul Ojo has on the UniKonnectors and how the UniKonnect can change and bring about more development" 
                </p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                  <div class="img d-none">
                    <img src="{{asset('main-asset/asset/img/testimonial-img.png')}}" class="img-fluid" alt="">
                  </div>
                  <div>
                    <h4 class="testifier">Ngene Favour</h4>
                    <h5 class="testifier-role">(Enugu State University, Nigeria).</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testi-card">
                <p class="testimony">
                  "ProjKonnect  has helped to boost my ability to speak publicly from sharing opinions in meetings to leading the conversation in breakout rooms .The task given assisted me in creating my own narrative not just a copy and paste work. Getting to hear from individuals with a wealth of knowledge and applying the lesson learnt is a priceless opportunity  I'll forever appreciate"

                </p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                  <div class="img d-none">
                    <img src="{{asset('main-asset/asset/img/testimonial-img.png')}}" class="img-fluid" alt="">
                  </div>
                  <div>
                    <h4 class="testifier">Shittu Faridat</h4>
                    <h5 class="testifier-role">(Al-Hikmah University Illorin, Nigeria)</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testi-card">
                <p class="testimony">
                  "ProjKonnect has rewritten my stories, not with the ink of old beliefs, but with the vibrant colors of personal freedom and success. I embraced the challenge, leveraged the opportunities, and I'm emerging victorious in the self-fight for a life of fulfillment"
                </p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                  <div class="img d-none">
                    <img src="{{asset('main-asset/asset/img/testimonial-img.png')}}" class="img-fluid" alt="">
                  </div>
                  <div>
                    <h4 class="testifier">Sunday Usman</h4>
                    <h5 class="testifier-role">(Prince Audu Abubakar University, Nigeria) </h5>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="swiper-slide">
              <div class="testi-card">
                <p class="testimony">
                  "Lorem ipsum dolor sit amet consec tetur adipisicing elit. Quas voluptas
                 sumenda modi rep reh end"
                </p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                  <div class="img">
                    <img src="{{asset('main-asset/asset/img/testimonial-img.png')}}" class="img-fluid" alt="">
                  </div>
                  <div>
                    <h4 class="testifier">Ben Davis</h4>
                    <h5 class="testifier-role">ProjKonnect Student</h5>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="pagination mt-5">
                        <div class="testimonial-prev btn-prev-long"><i class="fa fa-arrow-left"></i></div>
                        <div class="testimonial-next btn-next-long"><i class="fa fa-arrow-right"></i></div>
                    </div>
      </div>

    </div>
  </section>
</main>
 @endsection