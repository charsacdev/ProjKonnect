<div>
    <div wire:ignore class="main-content">
        @if(session('error'))
            <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif
        <div class="row">
             <div class="col-12 mb-5 mt-3">
                  <a href="/student-create-pitch" class="new-discussion-btn"><img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt=""> &nbsp; New Pitch</a>
             </div>
              <div class="col-12">
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
                                              <span> Name</span>
                                          </div>
                                      </div>
                                  </th>
                                  <th>
                                      <span>Recent</span>
                                  </th>
                                  <th>
                                      <span>Status</span>
                                  </th>
                                  <th>
                                      <span></span>
                                  </th>
                            </thead>
                           <tbody>
                            @foreach ($allPitches as $item)
                               @php
                                  $data = json_decode($item->pitch_details, true) 
                               @endphp
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
                                            <div class="apt_nit dark">
                                                <span>P</span>
                                            </div>
                                            <div class="apt_ful">
                                                @if($item->pitch_status==="live")
                                                   <a href="/student-pitch-url/{{base64_encode($item->id)}}/{{base64_encode(auth()->guard('web')->user()->email)}}" target="_blank">
                                                    <span> {{$data['title']}}</span>
                                                </a>
                                                @else
                                                  <span> {{$data['title']}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}&nbsp;({{$item->created_at->diffForHumans()}})
                                    </td>
                                    <td>
                                        @if($item->pitch_status==="live")
                                          <span class="live-badge success">{{$item->pitch_status}}</span>
                                        @else
                                          <span class="live-badge secondary">{{$item->pitch_status}}</span>
                                        @endif
                                    </td>
                                    <td onclick="EditPitch({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#editModal"><span><i class="fa fa-ellipsis-h"></i></span></td>
                                </tr>
                                 @endforeach
                          </tbody>
                       </table>
                  </div>
                </div>
        </div>
  </div>

<!--EDIT PITCH-->
    @if(isset($PostId))
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body rounded">
                        <h5 class="text-center my-3">{{$title}}</h5>
                        <div class="d-flex align-items-center justify-content-center mb-3 mt-3">
                            <img src="{{asset('student-asset/asset/img/edit-pen.png')}}" width="30px" alt="icon">
                        </div>
                            <a href="/student-pitch-preview/{{base64_encode($PostId)}}"  class="new-discussion-btn d-block">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

<!--JS-->
<script>
    function EditPitch(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('EditPitch', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>


