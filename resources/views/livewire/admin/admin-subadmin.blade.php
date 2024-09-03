<div>
    <div wire:ignore class="main-content">

        <!--error message-->
        @if(session('error'))
        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif
        
        <div class="row">
           <div class="col-12 mb-5 mt-2">
               <a href="create-admin" class="new-discussion-btn bg-dark"><img src="{{asset('admin-asset/asset/img/plus-with-bg.png')}}" alt=""> &nbsp; New Admin</a>
          </div>
         <div class="col-lg-12 mb-4">
          <div class="table-responsive">
               <table class="table" id="livelearn-table">
                    <thead>
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
                         <th>Gender</th>
                         <th>Role</th>
                         <th>Status</th>
                         <th>Email</th>
                         <th style="white-space:nowrap">Last active</th>
                         <th style="white-space:nowrap">Registered Date</th>
                         <th></th>
                    </thead>
                    <tbody>
                        @foreach ($allAdmins as $item)
                        <tr style="white-space:no-wrap">
                            <td data-bs-toggle="modal"
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
                                        @if(empty($item->profile_photo))
                                          <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="">
                                        @else
                                          <img src="{{$item->profile_photo}}" alt="">
                                        @endif
                                        </div>
                                     <div class="apt_ful">
                                         <span> {{ucwords($item->first_name)}}&nbsp;{{ucwords($item->last_name)}}</span>
                                     </div>
                                 </div>
   
                            </td>
                            <td>{{ucwords($item->gender)}}</td>
                            <td><span class="live-badge success">{{ucwords($item->role)}}</span></td>
                            <td>
                                @if($item->status==='active')
                                 <span class="live-badge success">{{ucwords($item->status)}}</span>
                                @else
                                 <span class="live-badge danger">{{ucwords($item->status)}}</span>
                                @endif
                            </td>
                            <td>{{$item->email}}</td>
                            <td style="white-space:nowrap">{{Carbon\Carbon::parse($item->updated_at)->format('d F Y i A')}}&nbsp;({{$item->updated_at->diffForHumans()}})</td>
                            <td style="white-space:nowrap">{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}&nbsp;({{$item->created_at->diffForHumans()}})</td>
                            <td onclick="UpdateAdmin({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#internModal"><i class="fa fa-ellipsis-h cursor-p"></i></td>
                       </tr>
                       @endforeach
                    </tbody>
               </table>
          </div>
          </div>
        </div>
    </div>

@if($adminInfo)
    <div wire:ignore.self class="modal fade" id="internModal" tabindex="-1" aria-labelledby="internModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-body rounded">
                 <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                     <div class="student-img">
                        @if(empty($adminInfo->profile_photo))
                            <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="">
                        @else
                            <img src="{{$adminInfo->profile_photo}}" alt="">
                        @endif
                     </div>
                 </div>
                 <h6 class="text-center mb-2">{{ucwords($adminInfo->first_name)}}&nbsp;{{ucwords($adminInfo->last_name)}}</h6>
                 <h5 class="text-center mb-5">{{ucwords($adminInfo->role)}}</h5>
                 <div class="d-flex align-items-center justify-content-between gap-4">
                    @if($adminInfo->status=="active")
                     <button wire:click="BlockAdmin({{$adminInfo->id}})" type="button" class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >
                        <span wire:loading.remove>Deactivate</span>
                        <span wire:loading style="cursor: not-allowed">
                            <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                        </span>
                     </button>
                    @else
                     <a href="javascript:;" wire:click="ActivateAdmin({{$adminInfo->id}})" type="button" class="new-discussion-btn text-center w-100 mb-2">
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
    function UpdateAdmin(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('UpdateAdmin', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>
