<div>
    <div class="main-content" wire:ignore>
        
        <!--message response-->
        @if(session('error'))
        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif

        <div class="row">
             <div class="col-12 mb-5 mt-2">
                  <a href="bulk-email" class="new-discussion-btn bg-dark"><img src="{{asset('admin-asset/asset/img/plus-with-bg.png')}}" alt=""> &nbsp; New Bulk Email</a>
             </div>
         <div class="col-lg-12 mb-4">
          <div class="table-responsive">
               <table class="table" id="livelearn-table">
                    <thead style="white-space: nowrap">
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
                                      <span> Name</span>
                                  </div>
                              </div>
                         </th>
                         <th>Date Published</th>
                         <th>Email </th>
                         <th>Phone Number</th>
                         <th>Type of Inquiry</th>
                         <th></th>
                    </thead>
                   <tbody>
                    @foreach ($allcontactMessage as $item)
                        <tr>
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
                                    <div class="apt_ful">
                                        <span> {{$item->name}}</span>
                                    </div>
                                </div>

                            </td>
                            <td>{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}&nbsp;({{$item->created_at->diffForHumans()}})</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->inquiry}}</td>
                            <td onclick="MessagePopUp({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#internModal">
                                <i class="fa fa-ellipsis-h cursor-p"></i>
                            </td>
                        </tr>
                    @endforeach
                   </tbody>
               </table>
          </div>
          </div>
        </div>
    </div>

    <!--MODAL-->
    @if($MessegeTitle)
    <div wire:ignore.self class="modal fade" id="internModal" tabindex="-1" aria-labelledby="internModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-body rounded">
                 <h4 class="text-center mb-5">{{$MessegeTitle->inquiry}}</h4>
                 <div class="d-flex align-items-center justify-content-between gap-2 flex-column">
                      <a href="contact-us-message/{{base64_encode($MessegeTitle->id)}}" type="button" class="new-discussion-btn text-center w-100 mb-2">View</a>
                      <button type="button" data-bs-dismiss="modal"  class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >Back</button>
                 </div>
               </div>
          </div>
     </div>
    </div>
    @endif


</div>
<!--JS-->
<script>
    function MessagePopUp(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('MessagePopUp', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>
