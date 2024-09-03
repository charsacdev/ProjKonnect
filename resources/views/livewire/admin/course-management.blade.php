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
                         <th>Date Published</th>
                         <th>Proguide</th>
                         <th>Chapters</th>
                         <th>No of Enrolls</th>
                         <th>Price($)</th>
                         <th>Course Status</th>
                         <th></th>
                    </thead>
                   <tbody>
                    @if(!$courses->isEmpty())
                        @foreach ($courses as $item)
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
                                        <span>{{$item->course_title}}</span>
                                    </div>
                                </div>

                            </td>
                            <td>{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}&nbsp;({{$item->updated_at->diffForHumans()}})</td>
                            <td>{{$item->proguide->full_name}}</td>
                            <td>{{count($item->chapters)}}</td>
                            <td>{{$item->course_students}}</td>
                            <td>${{$item->course_price}}</td>
                            <td>
                                @if($item->course_status==="approved")
                                 <span class="live-badge success">{{ucwords($item->course_status)}}</span>
                                @else
                                 <span class="live-badge danger">{{ucwords($item->course_status)}}</span>
                                @endif
                            </td>
                            <td data-bs-toggle="modal" data-bs-target="#internModal" onclick="CoursePreview({{ $item->id }})">
                                <i class="fa fa-ellipsis-h"></i>
                            </td>
                    </tr>
                    
                        @endforeach
                    @endif
                   
                   </tbody>
               </table>
          </div>
          </div>
        </div>
    </div>

    <!--MODAL-->
    
    <div wire:ignore.self class="modal fade" id="internModal" tabindex="-1" aria-labelledby="internModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-body rounded">
                 <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                     <div class="student-img">
                         <img src="{{$courseBanner}}" alt="icon">
                     </div>
                 </div>
                 
                 <h5 class="text-center mb-5">{{$courseTitle}}</h5>
                 <div class="d-flex align-items-center justify-content-between gap-4">
                     
                     <a href="/admin-projkonnect/course-management-review/{{base64_encode($coursesreviewCheck)}}" type="button" class="new-discussion-btn text-center w-100 mb-2">View</a>
                 </div>
               </div>
          </div>
     </div>
 </div>
</div>

<!--JS-->
<script>
    function CoursePreview(event) {
       //alert(event);
       if (event) {
           let postId = event;
           //console.log(postId);
           var myEvent = new CustomEvent('CoursePreview', {
              detail: { value: postId }
           });
           window.dispatchEvent(myEvent);
       }
   }
</script>
