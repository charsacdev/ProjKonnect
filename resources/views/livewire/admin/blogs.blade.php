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
                    <a href="create-blogs" class="new-discussion-btn bg-dark"><img src="{{asset('admin-asset/asset/img/plus-with-bg.png')}}" alt=""> &nbsp; New Post</a>
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
                                        <span> Title</span>
                                    </div>
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Views</th>
                            <th>Positve Reations</th>
                            <th>Negative Reactions</th>
                            <th></th>
                        </thead>
                    
                        <tbody>
                         @foreach($AllPosts as $item)
                            <tr style="white-space: nowrap">
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
                                            <span>{{$item->blog_title}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}&nbsp;({{$item->created_at->diffForHumans()}})</td>
                                <td>{{$item->author_name}}</td>
                                <td>{{number_format($item->blog_views)}}</td>
                                <td>{{number_format($item->positive)}}</td>
                                <td>{{number_format($item->negetive)}}</td>
                                <td data-bs-toggle="modal" data-bs-target="#editModal" class="cursor-p edit-post" onclick="EditBlog({{ $item->id }})">
                                    <i class="fa fa-ellipsis-h" ></i>
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
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body rounded">
                        <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                            <img src="{{asset('admin-asset/asset/img/edit-pen.png')}}" width="25px" alt="icon">
                        </div>
                        <h5 class="text-center my-3">{{$title}}</h5>
                            <a href="edit-blogs/{{base64_encode($PostId)}}" class="new-discussion-btn d-block text-center mb-2">Edit post</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
        
</div>


<!--JS-->
<script>
         function EditBlog(event) {
            //alert(event);
            if (event) {
                let postId = event;
                //console.log(postId);
                var myEvent = new CustomEvent('EditBlog', {
                   detail: { value: postId }
                });
                window.dispatchEvent(myEvent);
            }
        }
</script>


