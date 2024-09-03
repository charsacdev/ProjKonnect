<div>
    <div class="main-content">
        <div class="row">
          <h4>Referral Code</h4>
             <div class="col-12 mb-5 mt-3">
                  <div class="referral-code-ctn">
                      <div class="custom-tooltip">
                          Copied!
                     </div>
                      <span class="p-2">{{env('URL_LINK')}}/register/ref/{{auth()->guard('web')->user()->referal_code}}</span>
                      <img src="{{asset('proguide-asset/asset/img/copy-icon.png')}}" id="copy-ref-code" class="cursor-p" alt="icon">
                  </div>
             </div>
              <div class="col-md-8">
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
                                              <span>Referral Name</span>
                                          </div>
                                      </div>
                                  </th>
                                  <th>
                                    <span>Account Type</span>
                                </th>
                                  <th>
                                      <span>Date Referred</span>
                                  </th>
                            </thead>
                           <tbody>
                            @foreach ($referals as $item)
                                <tr>
                                    <td>
                                        <div
                                            class="d-flex align-items-center justify-content-start gap-2">
                                            <div
                                                class="form-check custom-checkbox checkbox-success check-lg">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customCheckBox8">
                                                <label class="form-check-label"
                                                    for="customCheckBox8"></label>
                                            </div>
                                            {{-- <div class="img">
                                                @if(empty($item->referee->profile_image))
                                                 <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="">
                                               @else
                                                 <img src="{{$users->referee->profile_image}}" alt="">
                                               @endif
                                            </div> --}}
                                            <div class="apt_ful">
                                                <span>{{$item->referee->full_name}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($item->referee->user_type=="proguide")
                                           <span class="live-badge success">{{ucwords($item->referee->user_type)}}</span>
                                        @elseif($item->referee->user_type=="student")
                                           <span class="live-badge warning">{{ucwords($item->referee->user_type)}}</span>
                                        @else
                                           <span class="live-badge secondary">{{ucwords($item->referee->user_type)}}</span>
                                        @endif
                                    </td>
                                    <td>
                                    Mar 23, 2024 12:00PM
                                    </td>
                                </tr>
                            
                            @endforeach
                            
                           </tbody>
                       </table>
                  </div>
                

             </div>
        </div>
  </div>

</div>
