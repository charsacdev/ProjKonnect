<div>
    <div class="breadcrumb">
        <h3 class="breadcrumb-title">Frequently asked questions</h3>
   </div>
    <main>
        <div class="container">
             <section id="faq">
                  <div class="container">
                       <div class="row mt-5">
                            <div class="col-12">
                                 <div class="accordion" id="accordion-faq">
                                      <div class="row">
                                           <div class="col-md-1 col-lg-2"></div>
                                           <div class="col-sm-12 col-md-10 col-lg-8">
                                             @foreach ($faqhome as $item)
                                                    <div class="accordion-item" data-aos="fade-up">
                                                        <h2 class="accordion-header" id="headingOne1">
                                                            <a href="#" class="accordion-button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseOne1"
                                                                aria-expanded="true"
                                                                aria-controls="collapseOne1">
                                                                {{$item->title}}
                                                                <span class="toggle-close"></span>
                                                            </a>
                                                        </h2>
                                                        <div id="collapseOne1"
                                                            class="accordion-collapse collapse show"
                                                            aria-labelledby="headingOne1"
                                                            data-bs-parent="#accordion-faq">
                                                            <div class="accordion-body">
                                                                <p class="m-b0 accordion-content">
                                                                   {{$item->content}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                </div>
                                           
                                             @endforeach
                                                
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
</div>
