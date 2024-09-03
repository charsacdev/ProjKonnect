<div>
    <div class="main-content">
        <div class="row">
             <div class="col-lg-8 col-md-7 mb-4">
              <form action="" wire:submit.prevent="UpdateCourse">
                  <div class="view-img mb-4">
                      <img src="{{$banner}}" class="img-fluid" alt="">
                  </div>
                  <div class="form-group mb-4">
                      <h6>Title</h6>
                      <input type="text" wire:model="title" value="Human Computer Interface" id="" class="form-control custom">
                  </div>
                  <div class="form-group mb-4">
                      <h6>Description</h6>
                      <textarea wire:model="description" rows="7" class="form-control custom"></textarea>
                  </div>

            <h5 class="mb-4">Course Chapters</h5>
            <!--course chapters starts here-->
               @php($i=1)
                @foreach ($chapters as $index => $chapter)
                <div class="course-chapter mb-4" wire:key="chapter-{{ $index }}">
                    <h5 class="mb-4 fw-bold">Chapters {{$i++}}</h5>
                    <div class="form-group mb-3">
                        <h6>Chapter Title</h6>
                        <input type="text" placeholder="chapter title" wire:model="chapters.{{ $index }}.chapter_title" class="form-control custom" @error('chapters.' . $index . '.chapter_title') style="border:1px solid #f13229 !important" @enderror>
                        @error('chapters.' . $index . '.chapter_title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <h6>Chapter Short Description</h6>
                        <textarea placeholder="chapter description" wire:model="chapters.{{ $index }}.description" rows="3" class="form-control custom" @error('chapters.' . $index . '.description') style="border:1px solid #f13229 !important" @enderror></textarea>
                        @error('chapters.' . $index . '.description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-control custom mb-4 p-3" @error('chapters.' . $index . '.course_video') style="border:1px solid #f13229 !important" @enderror>
                        <h6 class="mb-3">Video Content</h6>
                        <div wire:ignore class="proj-file-ctn mb-3"></div>
                        @if ($chapter['course_video'] && !is_string($chapter['course_video']))
                            <p>New video selected: {{ $chapter['course_video']->getClientOriginalName() }}</p>
                        @elseif ($chapter['course_video'])
                            <p>Current Video: <a href="{{ $chapter['course_video'] }}" target="_blank">View</a></p>
                        @endif
                        <span class="evid-ctn evid-ctn-sm">
                            <label class="proj-label"><img src="{{ asset('proguide-asset/asset/img/plus-dark-icon.png') }}" width="20px" alt="icon"><span>Upload files</span></label>
                            <input type="file" wire:model="chapters.{{ $index }}.course_video" class="form-control default-input proj-file d-none">
                        </span>
                        @error('chapters.' . $index . '.course_video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-4">
                            <div class="form-control custom p-3" @error('chapters.' . $index . '.assignment_files') style="border:1px solid #f13229 !important" @enderror>
                                <h6 class="mb-3">Assignment Questions</h6>
                                <div wire:ignore class="proj-file-ctn mb-3"></div>
                                @if ($chapter['assignment_files'] && !is_string($chapter['assignment_files']))
                                    <p>New assignment selected: {{ $chapter['assignment_files']->getClientOriginalName() }}</p>
                                @elseif ($chapter['assignment_files'])
                                    <p>Current Assignment: <a href="{{ $chapter['assignment_files'] }}" target="_blank">View</a></p>
                                @endif
                                <span  class="evid-ctn evid-ctn-sm">
                                    <label class="proj-label"><img src="{{ asset('proguide-asset/asset/img/plus-dark-icon.png') }}" width="20px" alt="icon"><span>Upload files</span></label>
                                    <input type="file" wire:model="chapters.{{ $index }}.assignment_files" class="form-control default-input d-none proj-file">
                                </span>
                                @error('chapters.' . $index . '.assignment_files')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 mb-4">
                            <div class="form-group" @error('chapters.' . $index . '.course_resources') style="border:1px solid #f13229 !important" @enderror>
                                <h6>Resources</h6>
                                <input type="text" wire:model="chapters.{{ $index }}.course_resources" placeholder="https://codeingo.com/resources/4iiesiisli" id="" class="form-control custom">
                                @error('chapters.' . $index . '.course_resources')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </div>
                  @endforeach
                <!--course chapter ends here-->
                
                  
                <div class="col-sm-12 mb-4">
                    <h5 class="mb-2">Course Mode</h5>
                     <!--message-->
                     @if(session('prices'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('prices')}}</p>
                     @endif
                    <div class="d-flex">
                        <label for="free">
                            <span>Free</span>
                            <input type="radio" id="free" wire:model="course_mode" value="free" class="course_mode">
                            <span class="radio-container"></span>
                        </label>
                        <label for="paid">
                            <span>Paid</span>
                            <input type="radio" id="paid" wire:model="course_mode" value="paid" class="course_mode">
                            <span class="radio-container"></span>
                        </label>
                    </div>
                </div>

                    <div class="col-sm-12 mb-4">
                          <div class="form-group">
                              <h6>Price ($)</h6>
                              <input type="number" min="0" wire:model="price" id="" class="form-control custom">
                          </div>
                      </div>
                  
                  
                  <div class="text-end mt-3 mb-5">
                      <button class="new-discussion-btn"> &nbsp; 
                        <span wire:loading.remove><img src="{{asset('proguide-asset/asset/img/tick-circle-icon.png')}}" alt="icon"> Save changes</span>
                         <!-- Loading indicator -->
                            <div wire:loading wire:target="UpdateCourse" class="loading-indicator">
                                <i class="fa fa-spin fa-spinner"></i>&nbsp;Saving Please wait...
                            </div>
                    </button>
                  </div>
              </form>
            </div>
         
             <div class="col-lg-4 col-md-5 mb-4">
              <div class="course-card overall-p">
                  <h2 class="course-title text-center">Course Analytics</h2>
                  <ul class="mt-5">
                      <li>
                          <h2 class="course-title">Total Students</h2>
                          <span class="course-title primary-color">{{$totalStudent}}</span>
                      </li>
                      <li>
                          <h2 class="course-title">Total Purchase</h2>
                          <span class="course-title primary-color">{{$totalPurchase}}</span>
                      </li>
                      <li>
                          <h2 class="course-title">Total Ratings</h2>
                          <span class="course-title primary-color">4.0/5.0</span>
                      </li>
                  </ul>
              </div>
              <div class="ckt-card curr-card mt-4">
                  <h2 class="g-sm-heading text-center mb-5">Leaderboard</h2>
                  <div class="lead-card">
                      <div class="d-flex align-items-center justify-content-start gap-2">
                          <div class="img">
                              <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                          </div>
                          <h2 class="g-sm-heading">John Doe</h2>
                      </div>
                      <div class="g-sm-heading pts">3999pts</div>
                  </div>
                  <div class="lead-card">
                      <div class="d-flex align-items-center justify-content-start gap-2">
                          <div class="img">
                              <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                          </div>
                          <h2 class="g-sm-heading">John Doe</h2>
                      </div>
                      <div class="g-sm-heading pts">3999pts</div>
                  </div>
                  <div class="lead-card">
                      <div class="d-flex align-items-center justify-content-start gap-2">
                          <div class="img">
                              <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                          </div>
                          <h2 class="g-sm-heading">John Doe</h2>
                      </div>
                      <div class="g-sm-heading pts">3999pts</div>
                  </div>
                </div>
             </div>
        </div>
  </div>
</div>
