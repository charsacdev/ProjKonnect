@extends('homepages.homeheader')
 @section('page-contents')

 <header class="header1 header-index" style="overflow:hidden">
 <div class="about-hero">
    <div class="container">
      <div class="inner">
        <div class="content">
          <small>Welcome to ProjKonnect</small>
          <h3 class="d-none">Getting You Ready for Excellence</h3>
          <p>
            Our supportive community nurtures your growth, ensuring seamless transitions from classroom to career. Embrace excellence with ProjKonnect's comprehensive ecosystem designed for your success.
          </p>
        </div>
        <img src="{{asset('main-asset/asset/img/about-hero-bg-img.png')}}"  alt="">
       </div>
    </div>
  </div>
 </header>

 <main>
  <section id="mission">
    <div class="container">
      <h3 data-aos="fade-up"  class="ab-title">
        We ACTED, Now Act
      </h3>
      <p data-aos="fade-up" class="intro">
        At ProjKonnect, we are integrating ACTED—Academic Career Technology for Education and Development. This initiative enhances our mission by embedding advanced educational technology to support both academic excellence and career readiness. With ACTED, we provide tailored resources and hands-on experiences that bridge the gap between learning and real-world application, empowering our community for success in today's dynamic environment.
       </p>
      <div class="row mt-5 align-items-center">
        <div class="col-md-6 col-lg-5 content-mission" data-aos="fade-up" data-aos-delay="400">
            <img src="{{asset('main-asset/asset/img/about-img.png')}}" class="img-fluid mission-img" alt="">
        </div>
        <div class="col-md-6 col-lg-7" data-aos="fade-up" data-aos-delay="500">
          <div class="content-mission-content">
            <h3 class="ab-sub-title">
              Mission
            </h3>
            <p class="text-start">
             ProjKonnect's mission is to empower learners and professionals by connecting them with transformative educational and career opportunities, bridging the gap between academic knowledge and practical applications for sustainable success.
             </p>
          </div>
        </div>
      </div>
      <div class="row align-items-center mt-5">
        <div class="col-md-6 col-lg-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="400">
          <div class="content-mission-content">
            <h3 class="ab-sub-title">
              Vision
            </h3>
            <p class="text-start">
             Our vision is to lead in educational innovation, creating a global network where learners access tailored content and opportunities, fostering a community of skilled professionals ready to impact their industries and societies positively.
             </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 content-vision order-1 order-md-2" data-aos="fade-up" data-aos-delay="500">
          <img src="{{asset('main-asset/asset/img/about-img-2.png')}}" class="img-fluid vision-img" alt="">
      </div>
      </div>
    </div>
</section>

 <section id="wuan-container">
        <div class="container">
          <div class="row">
            <div class="col-4">
              <h4 class="wuan-stats">
                5096
              </h4>
              <span class="wuan-type">
                Students
              </span>
            </div>
            <div class="col-4">
              <h4 class="wuan-stats">
                3200
              </h4>
              <span class="wuan-type">
                Proguides
              </span>
            </div>
            <div class="col-4">
              <h4 class="wuan-stats">
                1024
              </h4>
              <span class="wuan-type">
                Employers
              </span>
            </div>
          </div>
        </div>
      </section>
      <section id="partners">
        <div class="container">
          <h2 data-aos="fade-up" class="section-title text-center">Our Partners</span></h2>
          <div class="partners-container mt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="swiper partner-swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide text-center">
                   <img src="{{asset('main-asset/asset/img/partner-1.png')}}" class="partner-logo" alt="">
                </div>
                <div class="swiper-slide text-center">
                   <img src="{{asset('main-asset/asset/img/partner-2.png')}}" class="partner-logo" alt="">
                </div>
                <div class="swiper-slide text-center">
                   <img src="{{asset('main-asset/asset/img/partner-3.png')}}" class="partner-logo" alt="">
                </div>
                <div class="swiper-slide text-center">
                   <img src="{{asset('main-asset/asset/img/partner-4.png')}}" class="partner-logo" alt="">
                </div>
                <div class="swiper-slide text-center">
                   <img src="{{asset('main-asset/asset/img/partner-5.png')}}" class="partner-logo" alt="">
                </div>
                <div class="swiper-slide text-center">
                   <img src="{{asset('main-asset/asset/img/partner-1.png')}}" class="partner-logo" alt="">
                </div>
              </div>
            </div>
            <div class="partner-pagination">
							<div class="partner-prev"><i class="fa fa-chevron-left"></i></div>
							<div class="partner-next"><i class="fa fa-chevron-right"></i></div>
						</div>
          </div>
        </div>
      </section>
      <section id="story">
        <div class="container">
          <h2 data-aos="fade-up" class="section-title text-center">Our Story</span></h2>
          <div class="row mt-5">
            <div class="col-md-6 mb-4 mb-md-0" data-aos="fadeup">
              <img src="{{asset('main-asset/asset/img/story-img.png')}}" class="img-fluid" alt="image">
            </div>
            <div class="col-md-6" data-aos="fadeup">
              <div style="text-align: justify;">
                <span class="d-block d-md-none d-lg-block">
                  ProjKonnect began with a clear mission: to bridge the significant gap between academic learning and practical application that many students and recent graduates face across Africa. Founded by visionaries who recognized the untapped potential within educational systems, ProjKonnect has grown into a dynamic platform that connects students from various universities to collaborate, learn, and innovate together. By integrating cutting-edge technology and a user-centric approach, we aim to transform traditional education into a more engaging and impactful experience that aligns with global standards and local needs.
                  </span>
                 <span class="d-block d-md-none d-lg-block">
                   From its inception, ProjKonnect has been more than just an educational platform; it's a movement towards empowering the youth with tools for innovation and employment. By offering interactive tutorials, live sessions, and real-time collaboration projects, we provide a structured yet flexible learning environment that encourages not only academic excellence but also practical skill development. Each feature of ProjKonnect is designed to foster a community where learning is continuous, accessible, and adapted to the evolving demands of the global job market. Our commitment to enhancing educational accessibility and career readiness reflects our belief in the power of education to change lives and communities for the better.
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>

  <section id="team">
    <div class="container">
      <h3 data-aos="fade-up" class="ab-title">Our Team</h3>
      <span data-aos="fade-up" class="ab-sub-title">Nothing great is ever built alone.</span>
      <div class="row mt-5 justify-content-center">
       
        <div class="col-sm-6 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="500">
          <div class="team-img">
            <img src="{{asset('main-asset/asset/team/Paul O. Ojo .jpeg')}}" class="img-fluid" alt="">
          </div>
          <h3 class="team-name text-capitalize">Paul O. Ojo</h3>
          <h4 class="team-position text-capitalize">Project Lead/Founder</h4>
        </div>
       
        <div class="col-sm-6 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="700">
          <div class="team-img">
            <img src="{{asset('main-asset/asset/team/Tope Onigbinde.jpeg')}}" class="img-fluid" alt="">
          </div>
          <h3 class="team-name text-capitalize">Tope Onigbinde</h3>
          <h4 class="team-position text-capitalize">Product Manager</h4>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="400">
          <div class="team-img">
            <img src="{{asset('main-asset/asset/team/Kashim Yusuf.jpeg')}}" class="img-fluid" alt="">
          </div>
          <h3 class="team-name text-capitalize">Kashim Yusuf</h3>
          <h4 class="team-position text-capitalize">Program Manager</h4>
        </div>
        <div class="col-sm-6 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="400">
          <div class="team-img">
            <img src="{{asset('main-asset/asset/team/Habeeb Onisabi.jpeg')}}" class="img-fluid" alt="">
          </div>
          <h3 class="team-name text-capitalize">Habeeb Onisabi</h3>
          <h4 class="team-position text-capitalize">Operations Manager</h4>
        </div>
         <div class="col-sm-6 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="600">
          <div class="team-img">
            <img src="{{asset('main-asset/asset/team/Samuel Dike.jpg')}}" class="img-fluid" alt="">
          </div>
          <h3 class="team-name text-capitalize">Samuel Dike</h3>
          <h4 class="team-position text-capitalize">IT Advisor</h4>
        </div>

        
      </div>
    </div>
  </section>
</main>

@endsection