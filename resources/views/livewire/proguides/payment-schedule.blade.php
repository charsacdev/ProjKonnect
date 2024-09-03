<div>
    
    <div class="main-content">
        <div class="row" wire:ignore>
             <!--message-->
             @if(session('error'))
                <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
              @elseif(session('success'))
                <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
            @endif

          <div class="col-12 mb-5 mt-2">
              <button data-bs-toggle="modal"
              data-bs-target="#paymentModal" class="new-discussion-btn"> Withdraw</button>
         </div>
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Earnings</p>
                          <h1 class="card-body">
                            @if($totalEarnings>1)
                             ${{number_format($totalEarnings)}}
                            @else
                               ${{$totalEarnings}}
                            @endif
                        </h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Wallet Balance</p>
                          <h1 class="card-body">${{number_format($walletBalance->wallet_balance)}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Withdrawals</p>
                          <h1 class="card-body">
                            @if($totalWithdrawal>1)
                            ${{number_format($totalWithdrawal)}}
                           @else
                              ${{$totalWithdrawal}}
                           @endif
                        </h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Total Purchases</p>
                          <h1 class="card-body">
                            @if($totalPurchase>1)
                              {{number_format($totalPurchase)}}
                           @else
                              {{$totalPurchase}}
                           @endif
                        </h1>
                      </div>
                  </div>
              </div>
          </div>
         </div>
         
         <div class="col-lg-12 mb-4">
          <div class="table-responsive">
               <table class="table" id="livelearn-table">
                    <thead>
                         <th>
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="apt_ful">
                                      <span>Payment Details</span>
                                  </div>
                              </div>
                         </th>
                         <th>Details</th>
                         <th>Amount</th>
                         <th>Date</th>
                         <th>Status</th>
                    </thead>
                   <tbody>
                    @foreach($paymentHistory as $details)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div
                                        class="form-check custom-checkbox checkbox-success check-lg">
                                        <input type="checkbox" class="form-check-input"
                                            id="customCheckBox8">
                                        <label class="form-check-label"
                                            for="customCheckBox8"></label>
                                    </div>
                                    <div class="apt_ful">
                                        <span>
                                            {{$details->bankdetails->account_number}}, 
                                            {{$details->bankdetails->account_name}},
                                            {{$details->bankdetails->bank_name}}
                                        </span>
                                    </div>
                                </div>

                            </td>
                            <td>Withdrawal</td>
                            <td>${{$details->amount}}</td>
                            <td>{{Carbon\Carbon::parse($details->created_at)->format('d F Y g:ia')}}</td>
                            <td>
                                @if($details->status=="pending")
                                   <span class="live-badge secondary">{{ucwords($details->status)}}</span>
                                @else
                                   <span class="live-badge success">{{ucwords($details->status)}}</span>
                                @endif
                            </td>
                        </tr>
                      @endforeach
                    
                   </tbody>
               </table>
          </div>
          </div>
        </div>
  </div>


 <!-- Payment Modal -->
 <div wire:ignore.self class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                  <!--message-->
                    @if(session('error-details'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error-details')}}</p>
                    @endif
                    <form action="" id="withdrawal-form" wire:submit.prevent="Withdrawal">
                        <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                            <img src="{{asset('proguide-asset/asset/img/withdrawal-icon.png')}}" width="50px" alt="icon">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Bank Details</label>
                            <select wire:model="bankinfo" id="" class="form-control">
                                <option value="">Select</option>
                                <option value="{{$bankDetails->id}}">{{$bankDetails->account_number}}, {{$bankDetails->account_name}}, {{$bankDetails->bank_name}}</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Amount to Widthraw</label>
                            <input type="text" wire:model="amount" placeholder="Enter amount" class="form-control custom" required>
                        </div>
                        <button type="submit" class="new-discussion-btn bg-primary w-100 mb-3">
                            <span wire:loading.remove>Withdraw</span>
                            <!-- Loading indicator -->
                                <div wire:loading wire:target="Withdrawal" class="loading-indicator">
                                    <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                </div>
                        </button>
                        <div>
                            <small class="text-orange"><img src="{{asset('proguide-asset/asset/img/info-circle.png')}}" width="20px" alt="icon"> &nbsp; This will take up to 24 houres.</small>
                        </div>
                    </form>
               </div>
         </div>
    </div>
</div>


</div>
