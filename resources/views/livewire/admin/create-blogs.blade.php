<div wire:ignore id="myComponent">
    <div class="main-content">

         <!--error message-->
         @if(session('error'))
         <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
             @elseif(session('success'))
             <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
         @endif

        <div class="row">
             <div class="col-12 mb-4">
              <form action="" wire:submit.prevent="AddBlog">
                  <div class="row align-items-baseline">
                      <div class="col-12 mb-4">
                            <h6>Thumbnail</h6>
                          <div class="form-group course-dropify-ctn">
                              <input type="file" required  wire:model="thumbnail" name="" class="dropify"  id="">
                          </div>
                      </div>
                      <div class="col-12 mb-4">
                          <div class="form-group">
                              <h6>Title</h6>
                              <input type="text" required wire:model="title" placeholder="Title" id="" class="form-control custom">
                          </div>
                      </div>
                  </div>
                  <div class="form-group mb-4">
                      <h6>Description</h6>
                      <textarea wire:model="content" required  class="form-control custom summernote"></textarea>
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
                      <a href="blogs" class="new-discussion-btn btn-danger">Discard</a>
                      <button type="submit" data-bs-toggle="modal" 
                      data-bs-target="#successModall" class="new-discussion-btn" id="publishCourseBtn"> 
                        <span wire:loading.remove>Add Publish</span>
                        <span wire:loading wire:target="AddBlog" style="cursor: not-allowed">
                            <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                        </span>
                    </button>
                  </div>
              </form>
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
                    Blog post successfully published.
                  </div>
                    <button type="button" data-bs-dismiss="modal" class="new-discussion-btn w-100 mb-2">Go Back</button>
              </div>
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
                    @this.set('content', contents);
                    
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

