<div>
    
    <div class="main-content">
        
        <div class="row">
            <div class="col-lg-8 col-md-7 mb-4">
                  <!--message-->
                        @if(session('error'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                        @elseif(session('success'))
                        <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                    @endif
              <form wire:submit.prevent='AddCourse'>
                  <div class="row align-items-baseline">
                      <div class="col-12 mb-4" wire:ignore>
                          <div class="form-group course-dropify-ctn" @error('banner') style="border:1px solid #f13229 !important" @enderror>
                              <input type="file" wire:model="banner" class="dropify"  id="" required>
                          </div>
                      </div>
                      <div class="col-12 mb-4">
                          <div class="form-group">
                              <h6>Title</h6>
                              <input type="text" wire:model="title"  placeholder="Course Title.." id="" class="form-control custom" @error('title') style="border:1px solid #f13229 !important" @enderror>
                          </div>
                      </div>
                  </div>
                 
                  <div class="form-group mb-4">
                      <h6>Description</h6>
                      <textarea placeholder="Chapter Description"  wire:model="description" rows="7" class="form-control custom" @error('description') style="border:1px solid #f13229 !important" @enderror></textarea>
                  </div>
                  <h5 class="mb-4">Course Chapters</h5>
                  <!--message-->
                   @if(session('chapters'))
                      <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('chapters')}}</p>
                   @endif
                   @foreach ($chapters as $index => $chapter)
                   <div class="course-chapter mb-4" wire:key="chapter-{{ $index }}">
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
                           <div wire:ignore class="proj-file-ctn mb-3">
                               @if ($chapter['course_video'] && !is_string($chapter['course_video']))
                                   <p>New video selected: {{ $chapter['course_video']->getClientOriginalName() }}</p>
                               @elseif ($chapter['course_video'])
                                   <p>Current Video: <a href="{{ $chapter['course_video'] }}" target="_blank">View</a></p>
                               @endif
                           </div>
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
                                   <div wire:ignore class="proj-file-ctn mb-3">
                                       @if ($chapter['assignment_files'] && !is_string($chapter['assignment_files']))
                                           <p>New assignment selected: {{ $chapter['assignment_files']->getClientOriginalName() }}</p>
                                       @elseif ($chapter['assignment_files'])
                                           <p>Current Assignment: <a href="{{ $chapter['assignment_files'] }}" target="_blank">View</a></p>
                                       @endif
                                   </div>
                                   <span class="evid-ctn evid-ctn-sm">
                                       <label class="proj-label"><img src="{{ asset('proguide-asset/asset/img/plus-dark-icon.png') }}" width="20px" alt="icon"><span>Upload files</span></label>
                                       <input type="file" wire:model="chapters.{{ $index }}.assignment_files" class="form-control default-input d-none proj-file">
                                   </span>
                                   @error('chapters.' . $index . '.assignment_files')
                                       <div class="text-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-sm-12 mb-4">
                               <div class="form-group" >
                                   <h6>Resources</h6>
                                   <input type="text" wire:model="chapters.{{ $index }}.course_resources" placeholder="https://codeingo.com/resources/4iiesiisli" id="" class="form-control custom" @error('chapters.' . $index . '.course_resources') style="border:1px solid #f13229 !important" @enderror>
                                   @error('chapters.' . $index . '.course_resources')
                                       <div class="text-danger">{{$message}}</div>
                                   @enderror
                               </div>
                           </div>
                       </div>
                       <button type="button" wire:click="removeChapter({{$index}})" class="mt-1 new-discussion-btn bg-danger">Delete Chapter</button>
                     
                       </div>
                       @endforeach
                   <!--course chapter ends here-->
                    <!--message-->
                    @if(session('chapters'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('chapters')}}</p>
                    @endif
                   
                  <div class="row">
                   
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
                      
                        <div class="form-group mt-3 course-price d-none">
                            <h6 class="fw-bold">Course Price($)</h6>
                            <input type="number" placeholder="10"  wire:model="price" class="form-control custom" @error('price') style="border:1px solid #f13229 !important" @enderror>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <!--message-->
                           @if(session('interest'))
                              <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('interest')}}</p>
                           @endif
                       <div class="form-group">
                            <h5 class="mb-2">Course Interest</h5>
                            <div class="row">
                                   @foreach ($interest_all->chunk(3) as $chunk)
                                       <div class="col-md-4">
                                           @foreach ($chunk as $item)
                                               <label class="checkbox-container">
                                                   <input type="checkbox" id="interest_{{$item->id}}" value="{{$item->id}}" wire:model="interest">
                                                   <span class="checkmark"></span>
                                                   <label for="interest_{{$item->id}}">{{$item->interests}}</label>
                                               </label>
                                           @endforeach
                                       </div>
                                   @endforeach
                               </div>
                       </div>
                   </div>
                </div>

                
                  <div class="d-flex align-items-center justify-content-between mt-3 mb-5">
                      <button type="button" wire:click="addChapter" class="new-discussion-btn"><img src="{{asset('proguide-asset/asset/img/plus_icon.png')}}" alt="icon"> &nbsp; Add Chapter</button>
                      <button type="submit" wire:target="AddCourse" wire:loading.attr="disabled" class="new-discussion-btn"><img src="{{asset('proguide-asset/asset/img/document-upload-icon.png')}}" alt="icon"> &nbsp; 
                         <span wire:loading.remove>Publish Course</span>
                         <!-- Loading indicator -->
                            <div wire:loading wire:target="AddCourse" class="loading-indicator">
                                <i class="fa fa-spin fa-spinner"></i>&nbsp;Saving Please wait...
                            </div>
                    </button>
                  </div>
              </form>
             </div>

             <div class="col-lg-4 col-md-5 mb-4">
              <div class="course-card overall-p">
                  <h2 class="course-title mb-4">Guide</h2>
                 <div class="guides">
                      <div class="img">
                          <img src="{{asset('proguide-asset/asset/img/video-play-black-icon.png')}}" alt="icon">
                      </div>
                      <span>How to upload your course correctly</span>
                 </div>
                 <div class="guides">
                      <div class="img">
                          <img src="{{asset('proguide-asset/asset/img/video-play-black-icon.png')}}" alt="icon">
                      </div>
                      <span>How to upload your course correctly</span>
                 </div>
                 <div class="guides">
                      <div class="img">
                          <img src="{{asset('proguide-asset/asset/img/video-play-black-icon.png')}}" alt="icon">
                      </div>
                      <span>How to upload your course correctly</span>
                 </div>
                 <div class="guides">
                      <div class="img">
                          <img src="{{asset('proguide-asset/asset/img/video-play-black-icon.png')}}" alt="icon">
                      </div>
                      <span>How to upload your course correctly</span>
                 </div>
              </div>
              <div class="instructor-handbook">
                  <div class="img">
                      <div class="inner-img">
                          <img src="{{asset('proguide-asset/asset/img/book-icon-two.png')}}" alt="icon">
                      </div>
                  </div>
                  <span>Instructor Handbook</span>
              </div>
              <div class="ckt-card curr-card mb-3">
                  <div class="d-flex align-items-center justify-content-between mb-5">
                       <h3 class="g-sm-heading">Previous Uploads</h3>
                       <a href="javascript:;" class="primary-color">View all &nbsp; <i class="fa fa-chevron-right"></i></a>
                  </div>
                  @foreach($recentlyUploaded as $recentupload)
                  <div class="curr-lesson mb-3">
                       <div class="cur-icon-img">
                            <img src="{{asset('proguide-asset/asset/img/curriculum-icon.png')}}" alt="icon">
                       </div>
                      <div class="chapter">
                            <h3 class="g-sm-heading">{{$recentupload->course_chapter}}</h3>
                      </div>
                  </div>
                  @endforeach
                  
                </div>
             </div>
        </div>
  </div>

</div>
