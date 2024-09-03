<div>
    <div class="main-content">

        <!--error message-->
        @if(session('error'))
        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif
        
        <div class="row">
           <div class="col-12 mb-5 mt-2 d-none">
               <a href="create-author" class="new-discussion-btn bg-dark"><img src="{{asset('admin-asset/asset/img/plus-with-bg.png')}}" alt=""> &nbsp; New Author</a>
          </div>
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
                         <th>Gender</th>
                         <th>Total Post's</th>
                         <th>Total Page Visit's</th>
                         <th>Status</th>
                         <th>Email</th>
                         <th style="white-space:nowrap">Last active</th>
                         <th style="white-space:nowrap">Registered Date</th>
                         {{-- <th></th> --}}
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
                                <td>{{count($item->blogers)}}</td>
                                <td>
                                    @php
                                        $totalViews = 0;
                                    @endphp
                                    @foreach($item->blogers as $bloggers)
                                         @php
                                            $totalViews += $bloggers->blog_views;
                                        @endphp
                                    @endforeach
                                    {{$totalViews}}
                                </td>
                                <td>
                                    @if($item->status==='active')
                                    <span class="live-badge success">{{ucwords($item->status)}}</span>
                                    @else
                                    <span class="live-badge danger">{{ucwords($item->status)}}</span>
                                    @endif
                                </td>
                                <td>{{$item->email}}</td>
                                <td style="white-space:nowrap">{{Carbon\Carbon::parse($item->updated_at)->format('d F Y i A')}}&nbsp;({{$item->updated_at->diffForHumans()}})</td>
                                <td style="white-space:nowrap">{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}&nbsp;({{$item->updated_at->diffForHumans()}})</td>
                                {{-- <td data-bs-toggle="modal"
                                data-bs-target="#internModal"><i class="fa fa-ellipsis-h cursor-p"></i>
                            </td> --}}
                          </tr>
                        
                       @endforeach
                    </tbody>
               </table>
          </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
             <div class="modal-content">
                  <div class="modal-body rounded">
                    <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                        <img src="{{asset('admin-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
                    </div>
                       <h3 class="text-center mb-2">Success!</h3>
                      <div class="text-center mb-2">
                        You have successfully deactivated <h6 class="d-inline">Williams Michael</h6>
                      </div>
                        <button type="button" class="new-discussion-btn w-100 mb-2" data-bs-dismiss="modal">Go Back</button>
                  </div>
             </div>
        </div>
    </div>

    <div class="modal fade" id="internModal" tabindex="-1" aria-labelledby="internModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-body rounded">
                 <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                     <div class="student-img">
                         <img src="{{asset('admin-asset/asset/img/team3.png')}}" alt="icon">
                     </div>
                 </div>
                 <h6 class="text-center mb-2">Mary Williams</h6>
                 <h5 class="text-center mb-5">Author</h5>
                 <div class="d-flex align-items-center justify-content-between gap-4">
                     <button type="button" data-bs-toggle="modal"
                     data-bs-target="#successModal" class="new-discussion-btn w-100 outline-danger text-center d-block mb-2" >Deactivate</button>
                     <a href="javascript:;" type="button" class="new-discussion-btn text-center w-100 mb-2">View</a>
                 </div>
               </div>
          </div>
     </div>
 </div>
</div>
