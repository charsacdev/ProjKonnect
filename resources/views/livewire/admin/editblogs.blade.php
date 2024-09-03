<div wire:ignore>
    <div class="main-content">

        @if(session('error'))
        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
            @elseif(session('success'))
            <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
        @endif

        <div class="row">
             <div class="col-12 mb-4">
              <form action="" wire:submit.prevent="EditBlog">
                  <div class="row align-items-baseline">
                   <div class="col-sm-4 mb-4 overflow-hidden rounded">
                       <h6>Current thumbnail</h6>
                       <div class="form-group">
                           <img src="{{$BlogDetails->blog_photo}}" class="thumbnail-img" alt="">
                       </div>
                   </div>
                      <div class="col-sm-8 mb-4">
                            <h6>New thumbnail</h6>
                          <div class="form-group course-dropify-ctn">
                              <input type="file" wire:model="thumbnail_photo" class="dropify"  id="" required>
                          </div>
                      </div>
                      <div class="col-12 mb-4">
                          <div class="form-group">
                              <h6>Title</h6>
                              <input type="text" wire:model="title"  id="" class="form-control custom" required>
                          </div>
                      </div>
                  </div>
                  <div class="form-group mb-4">
                      <h6>Description</h6>
                      <textarea wire:model="description" class="form-control custom summernote" required></textarea>
                  </div>
                  <div class="form-group mb-4">
                    <h6>Tags</h6>
                    
                    <div class="tag-container">
                        <div class="tags">
                         @foreach($parent['tags'] as $index => $tag)
                             <div class="tag" data-index="{{ $index }}">
                                 {{ $tag }} &nbsp;
                                 <span class="delete-tag cursor-p">
                                     <i class="fa fa-times-circle"></i>
                                 </span>
                             </div>
                         @endforeach
                        </div>
                        <input type="text" class="input-tag" placeholder="Enter tag" wire:keydown.enter="addTag($event.target.value)" wire:keydown.comma="addTag($event.target.value)" />
                    </div>
                </div>
                  <div class="d-flex align-items-center justify-content-between mt-5 mb-5">
                     <!--ID of Blog to Edit-->
                     <input type="hidden" wire:model="blog_id">
                      <a href="/admin-projkonnect/blogs" class="new-discussion-btn btn-danger">Discard</a>
                      <button type="submit" data-bs-toggle="modal" 
                      data-bs-target="#successModall" class="new-discussion-btn" id="publishCourseBtn"> 
                        <span wire:loading.remove>Save Changes</span>
                        <span wire:loading wire:target="EditBlog" style="cursor: not-allowed">
                            Processing...
                        </span>
                    </button>
                  </div>
              </form>
             </div>
        </div>
  </div>
  
</div>

<!--summer note jquery-->
<script src="{{asset('admin-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
<script>
   $(document).ready(function () {
        //alert("yes sir");
        if($('.summernote').length > 0){

            $('.summernote').summernote({
            height: 300, // Set the height of the editor
            placeholder: 'Start typing...',
            toolbar: [
                // Full toolbar options
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['misc', ['undo', 'redo']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('description', contents);
                    
                  }
                }
            });
        }
    });

     //Hide the Tag if not needed
     function tagClose(event) {
        const target = event.currentTarget; 
        const parentTag = target.closest('.tag'); 
        if (parentTag) {
            parentTag.remove();
        }
    }
  </script>
