<div>

    <div class="main-content">
        <div class="row">
          <div class="col-lg-8 col-md-7 mb-4">
              <form action="" id="create-session-form" wire:submit.prevent="NewMeeting">

                <div class="col-12 mb-4" wire:ignore>
                    <div class="form-group course-dropify-ctn" @error('banner') style="border:1px solid #f13229 !important" @enderror>
                        <input type="file" wire:model="banner" class="dropify"  id="" required>
                    </div>
                </div>

                  <div class="form-group mb-4">
                      <h6>Title</h6>
                      <input type="text" wire:model="title" placeholder="Meeting Title" required id="" class="form-control">
                  </div>
                  <div class="form-group mb-4">
                      <h6>Description</h6>
                      <textarea wire:model="description" rows="7" class="form-control" required placeholder="Enter Meeting Descriptions">
                        
                    </textarea>
                  </div>
                  <div class="row">
                      <div class="col-sm-4 mb-4">
                          <div class="form-group">
                              <h6>Date</h6>
                              <input type="date" wire:model="date"  id="" class="form-control" required>
                          </div>
                      </div>
                      <div class="col-sm-4 mb-4">
                          <div class="form-group">
                              <h6>Time</h6>
                              <input type="time" wire:model="time" id="" class="form-control" required>
                          </div>
                      </div>
                      <div class="col-sm-4 mb-4">
                          <div class="form-group">
                              <h6>Duration(Hours)</h6>
                              <input type="number" wire:model="duration" placeholder="1" id="" class="form-control" required>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                   <!--message-->
                        @if(session('course_mode'))
                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('course_mode')}}</p>
                        @endif
                    <div class="col-sm-12 mb-4">
                        <h5 class="mb-2">Course Mode</h5>
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
                            <h6 class="fw-bold">Chapter Price($)</h6>
                            <input type="number" placeholder="10"  wire:model="price" class="form-control custom" @error('price') style="border:1px solid #f13229 !important" @enderror>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <h5 class="mb-2">Participant</h5>
                        <select class="form-control custom participant" wire:model="participant">
                            <option>Select Participants</option>
                            <option value="1">One-to-One</option>
                            <option value="2">All Subscribed Student</option>
                            <option value="3">General Interest</option>
                        </select>
                        <!--single participant email-->
                        <div class="form-group mt-3 one-to-one d-none">
                            <h6>Student's Email</h6>
                            <input type="email" placeholder="Enter Participant email"  wire:model="studentemail" class="form-control custom">
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <!--message-->
                           @if(session('interest'))
                              <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('interest')}}</p>
                           @endif
                       <div class="form-group course-interest d-none">
                            <h5 class="mb-2">Course Interest</h5>
                            <div class="row">
                                   @foreach ($interest_all->chunk(3) as $chunk)
                                       <div class="col-md-4">
                                           @foreach ($chunk as $item)
                                               <label class="checkbox-container">
                                                   <input type="checkbox" id="interest_{{$item->id}}" value="{{$item->id}}" wire:model="learn_interest">
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
                  <div class="mt-3">
                    <button type="submit" wire:target="NewMeeting" wire:loading.attr="disabled" class="new-discussion-btn">
                        <span wire:loading.remove>Create Schedule</span>
                         <!-- Loading indicator -->
                            <div wire:loading wire:target="NewMeeting" class="loading-indicator">
                                <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                            </div>
                        </button>
                  </div>
              </form>
             
           
         </div>
         <div class="col-lg-4 col-md-5 mb-4">
           
            <div class="ckt-card curr-card mb-3">
              <div class="d-flex align-items-center justify-content-between mb-5">
                   <h3 class="g-sm-heading">Previous Sessions</h3>
                   <a href="javascript:;" class="primary-color">View all &nbsp; <i class="fa fa-chevron-right"></i></a>
              </div>
              <div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                   <div class="cur-icon-img">
                        <img src="{{asset('proguide-asset/asset/img/curriculum-icon.png')}}" alt="">
                   </div>
                  <div class="chapter">
                        <small class="op-6">Chapter 1</small>
                        <h3 class="g-sm-heading op-6">Organization of Programming ...</h3>
                  </div>
              </div>
              <div class="curr-lesson mb-3">
                   <div class="cur-icon-img">
                        <img src="{{asset('proguide-asset/asset/img/curriculum-icon.png')}}" alt="">
                   </div>
                  <div class="chapter">
                        <small class="op-6">Chapter 2</small>
                        <h3 class="g-sm-heading op-6">Organization of Programming ...</h3>
                  </div>
              </div>
              <div class="curr-lesson mb-3">
                   <div class="cur-icon-img">
                        <img src="{{asset('proguide-asset/asset/img/curriculum-icon.png')}}" alt="">
                   </div>
                  <div class="chapter">
                        <small class="op-6">Chapter 3</small>
                        <h3 class="g-sm-heading">Organization of Programming ...</h3>
                  </div>
              </div>
            </div>
         </div>
        </div>
  </div>

</div>
