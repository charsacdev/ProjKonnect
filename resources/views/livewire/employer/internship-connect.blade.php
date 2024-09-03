<div>
    <div wire:ignore class="main-content">
         <!--message-->
         @if(session('error'))
         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
             @elseif(session('success'))
             <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
         @endif

        <div class="row">
          <div class="col-12 mb-5 mt-2">
              <a href="/employer/create-internship" class="new-discussion-btn"><img src="{{asset('employer-asset/asset/img/plus-with-bg.png')}}" alt=""> &nbsp; New Intern Role</a>
         </div>
         <div class="col-12 mb-5">
          <div class="swiper dashboard-swiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Interns Role Created</p>
                          <h1 class="card-body">{{$internRoles}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Processed Applications</p>
                          <h1 class="card-body">{{$internSelected}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Shortlisted Applicants</p>
                          <h1 class="card-body">{{$internShortlisted}}</h1>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="std-dsb-card">
                          <p class="card-head">Rejected Applications</p>
                          <h1 class="card-body">{{$internRejected}}</h1>
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
                                      <span> Title</span>
                                  </div>
                              </div>
                         </th>
                         <th>Date Created</th>
                         <th>Received Applications</th>
                         <th>Processed Applications</th>
                         <th></th>
                    </thead>
                   <tbody>
                    @foreach($InterTable as $interndata)
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
                                        <span>{{$interndata->role}}</span>
                                    </div>
                                </div>

                            </td>
                            <td>{{Carbon\Carbon::parse($interndata->created_at)->format('d F Y i A')}}</td>
                            <td>{{$interndata->intern_application_count}}</td>
                            <td>{{$interndata->intern_selected_count}}</td>
                            <td data-bs-toggle="modal"
                            data-bs-target="#internRoleModal" onclick="InternPopup({{ $interndata->id }})"><i class="fa fa-ellipsis-h cursor-p"></i>
                           </td>
                        </tr>
                      @endforeach
                   </tbody>
               </table>
          </div>
          </div>
        </div>
    </div>

    @if(isset($PostId))
        <div wire:ignore.self class="modal fade" id="internRoleModal" tabindex="-1" aria-labelledby="internRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body rounded">
                        <div class="intern-img">
                        <img src="{{asset('employer-asset/asset/img/briefcase-lg.png')}}" alt="">
                        </div>
                        <span class="d-block text-center text-orange mb-2">Intern Role</span>
                        <h5 class="text-center mb-4">{{$role}}</h5>
                        <div class="d-flex align-items-center justify-content-between gap-3 gap-md-5">
                            <a href="/employer/internship-applicant" class="new-discussion-btn light d-block text-center w-100 mb-2">View</a>
                            <button wire:click="DeleteIntern({{$PostId}})" type="button" class="new-discussion-btn danger w-100 mb-2">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @endif


</div>


<!--JS-->
<script>
    function InternPopup(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('InternPopup', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>
