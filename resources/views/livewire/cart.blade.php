<div>
    <div class="main-content">
        <div class="row">
             <div class="col-lg-8 mb-4" wire:ignore>
                <div class="row">
                    @if($carted)
                    @foreach ($carted as $item)
                         @if($item->course_cart)
                              <div class="col-md-6 cart-item mb-3">
                                   <div class="card border-radius-15">
                                        <div class="card-body">
                                        <div class="course-card course-card-sm border-radius-10">
                                             <a href="course-details.html">
                                                  <div class="img-ctn">
                                                       <img src="{{$item->course_cart->course_banner}}" alt="">
                                                  </div>
                                             </a>
                                             <h3 class="course-category d-none">Programming</h3>
                                             <h3 class="course-title"><a href="course-details.html">{{$item->course_cart->course_title}}</a></h3>
                                             <small class="author">from {{$item->course_cart->proguide->full_name}}</small>
                                             <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                                  <div class="course-details">
                                                       <img src="asset/img/user-icon-dark.png" alt="">
                                                       <span>40</span>
                                                  </div>
                                                  <div class="course-details">
                                                       <img src="asset/img/book-icon.png" alt="">
                                                       <span>{{count($item->course_cart->chapters)}} Chapters</span>
                                                  </div>
                                             </div>
                                        </div>
                                        <button class="pch-btn w-100 my-3">$ <span class="course-price">{{$item->course_cart->course_price}}</span></button>
                                        <button wire:click="DeleteCart({{$item->id}})" class="pch-btn-outline w-100 remove-item-btn">Remove</button>
                                        </div>
                                   </div>
                              </div>
                         @endif
                    @endforeach
                    @endif
                </div>  
             </div>
             <div class="col-lg-4 mb-4">
              <div class="ckt-card">
                  <h3 class="g-sm-heading mb-4">Billing Summary</h3>
                  <div class="d-flex align-items-center justify-content-between mb-3">
                       <p class="mb-0">
                            Price
                       </p>
                       <p class="mb-0">
                          $<span id="payable-price">{{$sumCart}}</span>
                       </p>
                  </div>
                  <div class="bb-dotted"></div>
                  <div class="d-flex align-items-center justify-content-between my-3 mb-4">
                       <p class="mb-0">
                            Amount to be paid
                       </p>
                       <p class="mb-0">
                            $<span id="payable-amount">{{$sumCart}}</span>
                       </p>
                  </div>
                  <div class="mt-5">
                       <a href="javascript:;" wire:loading.attr="disabled" wire:click="EnrollCourse({{auth()->guard('web')->user()->id}})" class="btn pmt-btn active w-100">Proceed to checkout</a>
                  </div>
                  <div class="text-center mt-4">
                       <img src="asset/img/lock-icon.png" alt=""> <span>Secure Checkout</span>
                  </div>
                  @if(session('error'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                   @endif
             </div>
             </div>
        </div>
  </div>
</div>
