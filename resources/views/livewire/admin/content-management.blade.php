<div>
    <div class="main-content" wire:ignore>
          <!--error message-->
          @if(session('error'))
          <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
              @elseif(session('success'))
              <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
          @endif

        <div class="row">
             <div class="col-12 mb-5">
              <div class="d-flex align-items-center justify-content-between mb-3">
                  <h4>Frequently Asked Questions (FAQs)</h4>
                  <a href="create-faq" id="add-faq-btn" class="add-faq-btn new-discussion-btn" style="padding:2px"><i class="fa fa-plus"></i></a>
              </div>
                  <div class="card">
                      <div class="card-body p-3">
                          <form action="">
                              <div id="faq-container">
                                @foreach($allfaqs as $items)
                                  <div class="question-container">
                                          <div class="qua-ctn">
                                              <h5>{{$items->title}}</h5>
                                              <div class="faq-answer opened overflow-hidden">
                                                  {{$items->content}}
                                              </div>
                                          </div>
                                          <div style="min-width: 50px;">
                                              <a href="edit-faq/{{base64_encode($items->id)}}" class="mx-2"><i class="fa fa-pen"></i></a>
                                              <span class="trash-faq cursor-p text-danger" wire:click="DeleteFaq({{$items->id}})"><i class="fa fa-trash"></i></span>
                                          </div>
                                  </div>
                                  @endforeach
                                 
                              </div>
                          </form>
                      </div>
                  </div>
             </div>
             <div class="col-12 mb-4">
              <h4>Terms and Conditions</h4>
              <div class="card">
                  <div class="card-body">
                      <form action="" wire:submit.prevent="newTerms">
                          <textarea wire:model="terms" id="summernote" rows="10" required></textarea>
                          <div class="text-end mt-4">
                              <button type="submit" class="new-discussion-btn">
                                <span wire:loading.remove>Save</span>
                                <span wire:loading wire:target="newTerms" style="cursor: not-allowed">
                                    Processing...
                                </span>
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
             </div>
        </div>
  </div>


  <!--MODAL-->
  
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">
              <div class="modal-body rounded">
                <div class="d-flex align-items-center justify-content-center mb-2 mt-3">
                    <img src="{{asset('admin-asset/asset/img/success-star-checked.png')}}" width="50px" alt="icon">
                </div>
                   <h3 class="text-center mb-2">Success!</h3>
                  <div class="text-center mb-2">
                    You have successfully registered for a LiveLearn Session.
                  </div>
                    <button type="button" class="new-discussion-btn w-100 mb-2">Go Back</button>
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
        if($('#summernote').length > 0){

            $('#summernote').summernote({
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
                    @this.set('terms', contents);
                    
                  }
                }
            });
        }
    });

  </script>


