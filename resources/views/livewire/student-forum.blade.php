<div>
    <div class="main-content">
        <div class="row">
             <div class="col-lg-8 col-md-7 mb-4">
                 @if(count(Request::segments())<2)
                    <div class="mb-4">
                        <button class="new-discussion-btn" id="openDiscussionform"><img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt="icon"> New Discussion</button>
                    </div>
                  @endif
                  @if(session('error'))
                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                  @elseif(session('success'))
                    <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                  @endif

                  <form wire:ignore wire:submit.prevent="CreateDiscussion" action="" id="new-discussion-form" class="mb-4" style="display: none;">
                      <label for="question">Question</label>
                       <div class="input-ctn border h-100 p-3 mb-4">
                          <textarea wire:model="discussion" required type="text" name="question" id="question" class="form-control border-0" rows="5" placeholder="Enter a question to discuss"></textarea>
                           <div class="form-group interner evid-ctn mt-2 d-inline-block">
                              <div class="proj-file-ctn mb-2"></div>
                               <label class="proj-label" > <img src="{{asset('student-asset/asset/img/message-attachment-icon.png')}}" width="20px" alt=""> <span>Attach image</span></label>
                               <input type="file" wire:model="file" class="form-control default-input off-screen proj-file">
                          </div>
                           @error('file')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                     </div>
                       <div class="form-group mb-4 d-none">
                            <label for="feedback-type">Feedback Type</label>
                            <select name="feedback_type" id="feedback-type" class="form-control">
                                 <option value="comment">Reply</option>
                            </select>
                       </div>
                       <button type="submit" class="new-discussion-btn" wire:target="CreateDiscussion" wire:submit.prevent="CreateDiscussion">
                       <span wire:loading.remove>Create Discussion</span>
                        <!-- Loading indicator -->
                        <div wire:loading wire:target="CreateDiscussion" class="loading-indicator">
                          <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                        </div>
                    </button>

                  </form>
                     
                  @if($forumDisscusssion and count(Request::segments())>1)
                  <div class="row mt-5" id="forum">
                       <div class="col-12 mb-4">
                            <div class="accordion" id="accordion-forum">
                                 <div class="accordion-item aos-init aos-animate" data-aos="fade-up">
                                      <h2 class="accordion-header" id="heading1">
                                           <a class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                <div class="d-flex align-items-start justify-content-start gap-3">
                                                  <div class="img">
                                                      @if(empty($forumDisscusssion->student->profile_image))
                                                       <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="User Image">
                                                     @else 
                                                        <img src="{{$forumDisscusssion->student->profile_image}}" alt="User Image">
                                                     @endif
                                                    </div>
                                                  <div class="forum-user text-dark">
                                                      <h6>By <b>{{$forumDisscusssion->student->full_name}}</b> <span style="font-size:12px">{{ Carbon\Carbon::parse($forumDisscusssion->created_at)->format('d F Y i A') }} ({{ Carbon\Carbon::parse($forumDisscusssion->created_at)->diffForHumans() }})</span></h6>
                                                      <br>
                                                      {{$forumDisscusssion->forum_discussion}}
                                                  </div>
                                                </div>
                                              
                                                <span class="toggle-close"></span>

                                              </a>
                                              <div class="like-dislike">
                                                  <button class="like-btn"> <img src="{{asset('student-asset/asset/img/thumbup-icon.png')}}" alt="icon"></button>
                                                  <button class="dislike-btn"> <img src="{{asset('student-asset/asset/img/thumbdown-icon.png')}}" alt="icon"></button>
                                              </div>
                                             
                                      </h2>
                                      <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordion-forum">
                                           <div class="accordion-body">
                                              <form wire:submit.prevent="CreateComment" class="comment-form mb-4">
                                                  <div class="form-group">
                                                      <div class="custom-input-group">
                                                          <textarea wire:model="userComment" required class="form-control custom-input comment" placeholder="Enter your comment"></textarea>
                                                          <button wire:target="CreateComment" wire:submit.prevent="CreateComment" class="sendCommentBtn"><i class="fa fa-paper-plane"></i></button>
                                                      </div>
                                                  </div>
                                              </form>
                                                <div class="m-b0 accordion-content">
                                                  <h5>Comments</h5>
                                                  @if(session('comment_error'))
                                                    <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('comment_error')}}</p>
                                                    @elseif(session('comment_success'))
                                                    <p class="text-success text-center fw-bold" style="font-size:18px">{{session('comment_success')}}</p>
                                                    @endif

                                                    @foreach($getComment as $item)
                                                        <div class="d-flex align-items-start justify-content-start gap-3 mt-4">
                                                            <div class="img">
                                                                @if(empty($item->student->profile_image))
                                                                  <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="User Image">
                                                                @else 
                                                                 <img src="{{$item->student->profile_image}}" alt="User Image">
                                                                @endif
                                                            </div>
                                                            <div class="forum-user">
                                                                <h6>{{$item->student->full_name}}</h6>
                                                                {{$item->comment}}
                                                            </div>
                                                        </div>
                                                        
                                                        @if($item->user_id==auth()->guard('web')->user()->id)
                                                         <span wire:click="DeleteComment({{$item->id}})" class="text-danger" style="float:right"><i class="fa fa-trash"></i></span>
                                                        @endif
                                                        <hr>
                                                        
                                                    @endforeach
                                                    <p>{{$getComment->links()}}</p>
                                                 
                                                </div>
                                           </div>
                                      </div>
                                 </div>
                            </div>
                       </div>
                       
                  </div>
                  @endif
             </div>


             <div class="col-lg-4 col-md-5 mb-4">
              <div id="forum-sidebar">
                  <div class="card mb-4">
                      <div class="card-body">
                          <h6 class="mb-5">Relevant Articles</h6>
                          @foreach($otherforum as $item)
                            <div class="d-flex align-items-center justify-content-start gap-2 item mb-3">
                                <div class="square-img"></div>
                                <a href="/student-forum/{{base64_encode($item->id)}}">
                                    <div class="w-100">
                                        <p>
                                        @php
                                            $content = $item->forum_discussion;

                                                #Split the content into an array of words
                                                $words = explode(' ', $content);
                                                $firstTenWords = array_slice($words, 0, 10);
                                                $firstTenWordsContent = implode(' ', $firstTenWords);

                                                echo $firstTenWordsContent;
                                        @endphp
                                        </p>
                                        <small>{{ Carbon\Carbon::parse($item->created_at)->format('d F Y i A') }} ({{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</small>
                                    </div>
                                </a>
                            </div>
                            <hr>
                          @endforeach
                          <p>{{$otherforum->links()}}</p>
                          
                  </div>

                  <!--My articles-->
                  <div class="card">
                      <div class="card-body">
                          <h6 class="mb-5">My Articles</h6>
                          @foreach($myforum as $item)
                            <div class="d-flex align-items-center justify-content-start gap-2 item mb-3">
                                <div class="square-img"></div>
                                <a href="/student-forum/{{base64_encode($item->id)}}">
                                    <div class="w-100">
                                        <p>
                                        @php
                                            $content = $item->forum_discussion;

                                                #Split the content into an array of words
                                                $words = explode(' ', $content);
                                                $firstTenWords = array_slice($words, 0, 10);
                                                $firstTenWordsContent = implode(' ', $firstTenWords);

                                                echo $firstTenWordsContent;
                                        @endphp
                                        </p>
                                        <small>{{ Carbon\Carbon::parse($item->created_at)->format('d F Y i A') }} ({{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</small>
                                    </div>
                                </a>
                                <span class="text-danger" wire:click="DeleteDiscussion({{$item->id}})" style="float:right"><i class="fa fa-trash"></i></span>
                            </div>
                            
                            <hr>
                          @endforeach
                          <p>{{$myforum->links()}}</p>
                      </div>
                  </div>
              </div>
             </div>
        </div>
  </div>
</div>
