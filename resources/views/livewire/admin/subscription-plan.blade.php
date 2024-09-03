<div>
    <div class="main-content" wire:ignore>
         <!--error message-->
         @if(session('error'))
         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
             @elseif(session('success'))
             <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
         @endif

        <div class="row">
         <div class="col-lg-12 mb-4">
          <div class="table-responsive">
               <table class="table" id="livelearn-table">
                    <thead style="white-space: nowrap">
                         <th style="white-space: nowrap">
                              <div class="d-flex align-items-center gap-2">
                                  <div
                                      class="form-check custom-checkbox checkbox-success check-lg">
                                      <input type="checkbox" class="form-check-input"
                                          id="customCheckBox8">
                                      <label class="form-check-label"
                                          for="customCheckBox8"></label>
                                  </div>
                                  <div class="apt_ful">
                                      <span> Name</span>
                                  </div>
                              </div>
                         </th>
                         <th>Email</th>
                         <th>Type</th>
                         <th>Subscription Plan</th>
                         <th>Plan Duration</th>
                         <th>Subscription Date</th>
                    </thead>
                   <tbody>
                    @foreach($allUsers as $activeusers)
                        <tr style="white-space: nowrap">
                            <td  data-bs-toggle="modal"
                                data-bs-target="#internModal" class="cursor-p">
                                 <div class="d-flex align-items-center gap-2">
                                     <div
                                         class="form-check custom-checkbox checkbox-success check-lg">
                                         <input type="checkbox" class="form-check-input"
                                             id="customCheckBox8">
                                         <label class="form-check-label"
                                             for="customCheckBox8"></label>
                                     </div>
                                     <div class="td-img">
                                        @if(empty($activeusers->users->profile_image))
                                         <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="">
                                       @else
                                         <img src="{{$activeusers->users->profile_image}}" alt="">
                                       @endif
                                     </div>
                                     <div class="apt_ful">
                                         <span> {{$activeusers->users->full_name}}</span>
                                     </div>
                                 </div>
                        
                            </td>
                            <td>{{$activeusers->users->email}}</td>
                            <td>
                               @if($activeusers->users->user_type==="student")
                                <span class="live-badge primary">{{$activeusers->users->user_type}}</span>
                               @elseif($activeusers->users->user_type==="proguide")
                                 <span class="live-badge warning">{{$activeusers->users->user_type}}</span>
                               @else
                                 <span class="live-badge danger">{{$activeusers->users->user_type}}</span>
                               @endif
                        
                           </td>
                          
                            <td>
                               @if(empty($activeusers->plan_name))
                                  <span>No Subscription</span>
                                 @else
                                  {{$activeusers->plan_name}}
                               @endif
                           </td>
                           <td>{{$activeusers->plan_duration}}Days</td>
                           <td style="white-space:nowrap">{{Carbon\Carbon::parse($activeusers->created_at)->format('d F Y i A')}}&nbsp;({{$activeusers->created_at->diffForHumans()}})</td>
                        </tr>
                       
                    @endforeach
                 </tbody>
               </table>
          </div>
          </div>
        </div>
    </div>


    <!--MODALS-->
    @if($userInfo)
    <div wire:ignore.self class="modal fade" id="internModal" tabindex="-1" aria-labelledby="internModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-body rounded">
                 <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                     <div class="student-img">
                        @if(empty($userInfo->profile_image))
                         <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="">
                       @else
                         <img src="{{$userInfo->profile_image}}" alt="">
                      @endif
                     </div>
                 </div>
                 <h6 class="text-center mb-2">{{ucwords($userInfo->full_name)}}</h6>
                 <h5 class="text-center mb-5">{{ucwords($userInfo->user_type)}}</h5>
                 <div class="d-flex align-items-center justify-content-between gap-4">
                     @if($userInfo->status=="active")
                        <button wire:click="BlockUser({{$userInfo->id}})" type="button"  class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >
                            <span wire:loading.remove>Dectivate</span>
                            <span wire:loading style="cursor: not-allowed">
                                <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                            </span>
                        </button>
                     @else
                      <a wire:click="ActivateUser({{$userInfo->id}})" href="javascript:;" type="button" class="new-discussion-btn text-center w-100 mb-2">
                        <span wire:loading.remove>Activate</span>
                        <span wire:loading style="cursor: not-allowed">
                            <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                        </span>
                    </a>
                    @endif
                    </div>
               </div>
          </div>
     </div>
 </div>
 @endif

</div>

<!--JS-->
<script>
    function UserUpdate(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('UserUpdate', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>

