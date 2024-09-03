<div>
    
    <div class="main-content">
        <div class="custom-tab">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#all"></i> All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#enrolled"> Enrolled</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#completed"> Completed</a>
                    </li>
                </ul>
               
            </div>
            <div class="tab-content mb-5">
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="row p-3">
                        @foreach ($Allcourse as $item)
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="course-card course-card-sm mt-4">
                                    <a href="/course-preview/{{base64_encode($item->id)}}">
                                    <div class="img-ctn">
                                        <img src="{{$item->course_banner}}" alt="">
                                    </div>
                                    </a>
                                    <!--Check for Free course-->
                                    @if($item->course_price==="0")
                                        <span class="text-light bg-success px-2 rounded">
                                            Free
                                        </span>
                                    @endif
                                    
                                    <h3 class="course-title"><a href="/course-preview/{{base64_encode($item->id)}}">{{$item->course_title}}</a></h3>
                                    <small class="author">By {{$item->proguide->full_name}}</small>
                                    <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                        <div class="course-details">
                                            <img src="{{asset('student-asset/asset/img/user-icon-dark.png')}}" alt="">
                                            <span>{{$item->course_students}}</span>
                                        </div>
                                        <div class="course-details">
                                            <img src="{{asset('student-asset/asset/img/book-icon.png')}}" alt="">
                                            <span>{{$item->chapters_count}} Chapters</span>
                                        </div>
                                    </div>
                                    
                                    @if(count($item->purchasedCourses)>0)

                                        @foreach($item->purchasedCourses as $purchaseditem) 
                                            <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                                                <div><img src="{{asset('student-asset/asset/img/orange-ribbon.png')}}" alt=""></div>
                                                <div><img src="{{asset('student-asset/asset/img/violet-ribbon.png')}}" alt=""></div>
                                                <div><img src="{{asset('student-asset/asset/img/blue-ribbon.png')}}" alt=""></div>
                                                <div><img src="{{asset('student-asset/asset/img/red-ribbon.png')}}" alt=""></div>
                                                <div><img src="{{asset('student-asset/asset/img/green-ribbon.png')}}" alt=""></div>
                                                <div class="card-color-box rounded-circle">+{{($purchaseditem->badged_earned)}}</div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start gap-2 mt-4">
                                                <div class="course-progress-ctn">
                                                    <div class="course-progress" style="width: {{($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100}}%;">
                                                        {{round((($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100),2)}}
                                                    </div>
                                                </div>
                                                <img src="{{asset('student-asset/asset/img/trophy-icon.png')}}" class="trophy-icon" alt="">
                                            </div>
                                            @endforeach
                                        @else
                                         <button wire:loading.attr="disabled" wire:click="EnrollCourse({{$item}})" class="submit-btn p-1 my-2 pch-btn">
                                            <span wire:loading.remove>Enroll</span>
                                                  <!-- Loading indicator -->
                                             <div wire:loading wire:target="EnrollCourse" class="loading-indicator">
                                                  <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                             </div>
                                            </button>
                                    @endif
                                    
                                </div>
                            </div>
                        @endforeach
                        <p>{{$allCourses->links()}}</p>
                    </div>
                    
                </div>
                <div class="tab-pane fade show" id="enrolled" role="tabpanel">
                    <div class="row">
                        @foreach ($Allcourse as $item)
                        @if(count($item->purchasedCourses)>0)

                          @foreach($item->purchasedCourses as $purchaseditem) 
                             @if($purchaseditem->current_chapters<$purchaseditem->course_chapters)
                                <div class="col-sm-6 col-md-4 col-xl-3">
                                    <div class="course-card course-card-sm mt-4">
                                        <a href="/course-preview/{{base64_encode($item->id)}}">
                                        <div class="img-ctn">
                                            <img src="{{$item->course_banner}}" alt="">
                                        </div>
                                        </a>
                                        
                                        <h3 class="course-title"><a href="/course-preview/{{base64_encode($item->id)}}">{{$item->course_title}}</a></h3>
                                        <small class="author">from {{$item->proguide->full_name}}</small>
                                        <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                            <div class="course-details">
                                                <img src="{{asset('student-asset/asset/img/user-icon-dark.png')}}" alt="">
                                                <span>40</span>
                                            </div>
                                            <div class="course-details">
                                                <img src="{{asset('student-asset/asset/img/book-icon.png')}}" alt="">
                                                <span>{{$item->chapters_count}} Chapters</span>
                                            </div>
                                        </div>
                                    
                                        @if(count($item->purchasedCourses)>0)

                                            @foreach($item->purchasedCourses as $purchaseditem) 
                                                <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                                                    <div><img src="{{asset('student-asset/asset/img/orange-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/violet-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/blue-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/red-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/green-ribbon.png')}}" alt=""></div>
                                                    <div class="card-color-box rounded-circle">+{{($purchaseditem->badged_earned)}}</div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-start gap-2 mt-4">
                                                    <div class="course-progress-ctn">
                                                        <div class="course-progress" style="width: {{($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100}}%;">
                                                            {{round((($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100),2)}}
                                                        </div>
                                                    </div>
                                                    <img src="{{asset('student-asset/asset/img/trophy-icon.png')}}" class="trophy-icon" alt="">
                                                </div>
                                                @endforeach
                                            @else
                                            <button class="submit-btn p-1 m-2">Enroll</button>
                                        @endif
                                        
                                    </div>
                                </div>
                              @endif
                            @endforeach
                         @endif
                      @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show" id="completed" role="tabpanel">
                    <div class="row">
                        @foreach ($Allcourse as $item)
                        @if(count($item->purchasedCourses)>0)
                           @foreach($item->purchasedCourses as $purchaseditem) 
                             @if($purchaseditem->current_chapters==$purchaseditem->course_chapters)
                                <div class="col-sm-6 col-md-4 col-xl-3">
                                    <div class="course-card course-card-sm mt-4">
                                        <a href="/course-preview">
                                        <div class="img-ctn">
                                            <img src="{{$item->course_banner}}" alt="">
                                        </div>
                                        </a>
                                        
                                        <h3 class="course-title"><a href="/course-preview">{{$item->course_title}}</a></h3>
                                        <small class="author">from {{$item->proguide->full_name}}</small>
                                        <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                            <div class="course-details">
                                                <img src="{{asset('student-asset/asset/img/user-icon-dark.png')}}" alt="">
                                                <span>40</span>
                                            </div>
                                            <div class="course-details">
                                                <img src="{{asset('student-asset/asset/img/book-icon.png')}}" alt="">
                                                <span>{{$item->chapters_count}} Chapters</span>
                                            </div>
                                        </div>
                                    
                                        @if(count($item->purchasedCourses)>0)

                                            @foreach($item->purchasedCourses as $purchaseditem) 
                                                <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                                                    <div><img src="{{asset('student-asset/asset/img/orange-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/violet-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/blue-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/red-ribbon.png')}}" alt=""></div>
                                                    <div><img src="{{asset('student-asset/asset/img/green-ribbon.png')}}" alt=""></div>
                                                    <div class="card-color-box rounded-circle">+{{($purchaseditem->badged_earned)}}</div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-start gap-2 mt-4">
                                                    <div class="course-progress-ctn">
                                                        <div class="course-progress" style="width: {{($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100}}%;">
                                                            {{($purchaseditem->current_chapters/$purchaseditem->course_chapters)*100}}
                                                        </div>
                                                    </div>
                                                    <img src="{{asset('student-asset/asset/img/trophy-icon.png')}}" class="trophy-icon" alt="">
                                                </div>
                                                @endforeach
                                            @else
                                            <button class="submit-btn p-1 m-2">Enroll</button>
                                        @endif
                                        
                                    </div>
                                </div>
                             @endif
                            @endforeach
                         @endif
                      @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>

</div>
