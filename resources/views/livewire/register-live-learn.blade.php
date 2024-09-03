<div>
    <div class="main-content">
        <div class="row">
             <div class="col-md-8 mb-4">
                  <div class="row">
                       <div class="col-sm-6 mb-4 co-dlt">
                            <div class="img">
                                 <img src="{{$meeting->meeting_banner}}" alt="">
                            </div>
                       </div>
                       <div class="col-sm-6 mb-4">
                            <div>
                                {{-- {{$meeting}} --}}
                                 <h4 class="g-heading">{{$meeting->meeting_title}}</h4>
                            <p class="op-6">Curated by {{$meeting->proguide->full_name}}</p>
                            </div>
                       </div>
                  </div>
                  <p class="mb-2">Use available points to get a discount</p>
                  <div class="row">
                       <div class="col-sm-6 col-md-5 col-lg-5">
                            <div class="input-group point-input-group mb-1">
                                 <input type="text" class="form-control" value="160">
                                 <button class="btn sub-btn" type="button" id="button-addon"><i class="fa fa-arrow-right"></i></button>
                            </div>
                            <p>Available Points &nbsp; &nbsp; <span class="primary-color"><b>200</b></span></p>
                       </div>
                  </div>
                  <hr>
                  <div class="row card-payment d-none">
                       <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                 <label for="">Name on Card</label>
                                 <input type="text" name="" placeholder="John Doe" class="form-control">
                            </div>
                       </div>
                       <div class="col-sm-6 mt-4">
                            <div class="form-group">
                                 <label for="">Card Number</label>
                                 <input type="text" name="" placeholder="251-475-5425-85-632" class="form-control">
                            </div>
                       </div>
                       <div class="col-sm-4 col-7 mt-4">
                            <div class="form-group">
                                 <label for="">Expiration Date</label>
                                 <input type="text" name="" placeholder="05/01" class="form-control">
                            </div>
                       </div>
                       <div class="col-sm-2 col-5 mt-4">
                            <div class="form-group">
                                 <label for="">CVV</label>
                                 <input type="text" name="" placeholder="238" class="form-control">
                            </div>
                       </div>
                       <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                 <label for="">Currency</label>
                                 <select name="" id="" class="form-control">
                                      <option value="">Select</option>
                                      <option value="naira">Naira</option>
                                      <option value="dollar" selected>Dollar</option>
                                 </select>
                            </div>
                       </div>
                       <div class="col-sm-6 col-lg-5 mt-5">
                            <button href="javascript:;" class="pch-btn pay-btn w-100">Pay $139.86</button>
                       </div>
                  </div>
             </div>
             <div class="col-md-4 mb-4">
                  <div class="ckt-card">
                       <h3 class="g-sm-heading mb-4">Billing Summary</h3>
                       <div class="d-flex align-items-center justify-content-between mb-3">
                            <p class="mb-0">
                                 Price
                            </p>
                            <script src="{{asset('student-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
                            <script>
                              $(document).ready(function(){
                                   let key="{{env('CURRENCY_API')}}"
                                   $.getJSON('https://api.fastforex.io/convert?from=USD&to=NGN&amount='+{{$meeting->meeting_price}}+'&api_key='+key, function(data) {
                                        //alert(data)
                                        let text=data['result']['NGN'];
                                        let result=(text).toLocaleString();
                                        $(".ngn-usd").html(result);
                                   });
                              });
                           </script>
                            <p class="mb-0">
                                 @if($meeting->meeting_price<=0)
                                   <span class="badge text-bg-success">Free</span>
                                 @else
                                   ${{$meeting->meeting_price}}
                                  
                                @endif  
                            </p>
                       </div>
                       <div class="d-flex align-items-center justify-content-between mb-3 d-none">
                            <p class="mb-0">
                                 Discount
                            </p>
                            <p class="mb-0">
                                 $20.00
                            </p>
                       </div>
                       <div class="bb-dotted"></div>
                       <div class="d-flex align-items-center justify-content-between my-3">
                            <p class="mb-0">
                                 Amount to be paid
                            </p>
                            <p class="mb-0">
                              @if($meeting->meeting_price<=0)
                              <span class="">$0</span>
                              @else
                                <p class="d-block">${{$meeting->meeting_price}}</p>
                                
                             @endif  
                         </p>
                       </div>
                       <p class="d-block">Payable NGN : <span class="float-end">₦<span class="ngn-usd"></span></span></p>
                       <h3 class="g-sm-heading mt-5 mb-4">Proceed to Payment</h3>
                       <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <button wire:click="MeetRegister" wire:loading.attr="disabled" class="btn pmt-btn active w-100">Proceed</button>
                            {{-- <button class="btn pmt-btn">Credit Card</button>
                            <button class="btn pmt-btn">Net Banking</button> --}}
                       </div>
                       <div class="text-center mt-4">
                            <img src="{{asset('student-asset/asset/img/lock-icon.png')}}" alt=""> <span>Secure Checkout</span>
                       </div>
                  </div>
             </div>
        </div>
  </div>

  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"><i class="fa fa-times"></i></button>
                <div class="form-group">
                    <input type="text" name="keyword" value="Programming" id="keyword" class="form-control">
                </div>
            </div>

            <div class="modal-body rounded">
                <div class="result-ctn">
                    <h2 class="heading">Search result</h2>

                    <div class="results">
                        <div class="result">
                            <h3 class="title">Organization of programming</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur, fugiat provident temporibus quas molestias similique?...
                            </p>
                        </div>
                        <div class="result">
                            <h3 class="title">Python programming</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur, fugiat provident temporibus quas molestias similique?...
                            </p>
                        </div>
                        <div class="result">
                            <h3 class="title">Web programming</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur, fugiat provident temporibus quas molestias similique?...
                            </p>
                        </div>
                        <div class="result">
                            <h3 class="title">Computer programming</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur, fugiat provident temporibus quas molestias similique?...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body rounded">
                    <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                        <img src="{{asset('student-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
                    </div>
                    <h3 class="text-center mb-2">Success!</h3>
                    <div class="text-center mb-2">
                        You have successfully registered for a LiveLearn Session.
                    </div>
                        <button type="button" id="goto-livepage" class="new-discussion-btn w-100 mb-2">Go Back</button>
                </div>
            </div>
        </div>
    </div>

</div>
