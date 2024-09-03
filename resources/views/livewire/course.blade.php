<div>
    
    <div class="main-content">
        <div class="row">
             <div class="col-md-8">
                  <div class="d-flex align-items-center justify-content-between">
                       <h2 class="content-heading heading-lg">Completed Courses</h2>
                       <a href="/student-courses" class="content-heading heading-lg">View all &nbsp; <i class="fa fa-chevron-right"></i></a>
                  </div>
                  <div class="row mt-3">
                    <div class="row">
                        @if($Allcourse->isEmpty())
                       <h4 class="text-center text-muted"><img src="{{asset('student-asset/asset/img/note-2.png')}}" alt="">&nbsp;No Completed Course</h4>     
                       
                    @else
                        @php
                          $completedCourseFound = false;
                       @endphp
                    
                            @foreach ($Allcourse as $item)
                                @foreach ($item->purchasedCourses as $purchaseditem)
                                    @if ($purchaseditem->current_chapters == $purchaseditem->course_chapters)
                                        @php
                                            $completedCourseFound = true;
                                        @endphp
                            
                                        <div class="col-sm-6">
                                            <div class="course-card course-card-sm mt-4">
                                                <a href="/course-preview/{{ base64_encode($item->id) }}">
                                                    <div class="img-ctn">
                                                        <img src="{{ $item->course_banner }}" alt="">
                                                    </div>
                                                </a>
                                                <h3 class="course-title"><a href="/course-preview/{{ base64_encode($item->id) }}">{{ $item->course_title }}</a></h3>
                                                <small class="author">By {{ $item->proguide->full_name }}</small>
                                                <div class="d-flex align-items-center justify-content-start gap-4 mt-3">
                                                    <div class="course-details">
                                                        <img src="{{ asset('student-asset/asset/img/user-icon-dark.png') }}" alt="">
                                                        <span>{{$item->course_students}}</span>
                                                    </div>
                                                    <div class="course-details">
                                                        <img src="{{ asset('student-asset/asset/img/book-icon.png') }}" alt="">
                                                        <span>{{ $item->chapters_count }} Chapters</span>
                                                    </div>
                                                </div>
                            
                                                @foreach ($item->purchasedCourses as $purchaseditem)
                                                    <div class="d-flex align-items-center justify-content-start gap-2 mt-3">
                                                        <div><img src="{{ asset('student-asset/asset/img/orange-ribbon.png') }}" alt=""></div>
                                                        <div><img src="{{ asset('student-asset/asset/img/violet-ribbon.png') }}" alt=""></div>
                                                        <div><img src="{{ asset('student-asset/asset/img/blue-ribbon.png') }}" alt=""></div>
                                                        <div><img src="{{ asset('student-asset/asset/img/red-ribbon.png') }}" alt=""></div>
                                                        <div><img src="{{ asset('student-asset/asset/img/green-ribbon.png') }}" alt=""></div>
                                                        <div class="card-color-box rounded-circle">+{{ $purchaseditem->badged_earned }}</div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-start gap-2 mt-4">
                                                        <div class="course-progress-ctn">
                                                            <div class="course-progress" style="width: {{ ($purchaseditem->current_chapters / $purchaseditem->course_chapters) * 100 }}%;">
                                                                {{ ($purchaseditem->current_chapters / $purchaseditem->course_chapters) * 100 }}%
                                                            </div>
                                                        </div>
                                                        <img src="{{ asset('student-asset/asset/img/trophy-icon.png') }}" class="trophy-icon" alt="">
                                                    </div>
                                                @endforeach
                            
                                            </div>
                                        </div>
                            
                                        @break(2) <!-- Breaks out of both foreach loops -->
                                    @endif
                                @endforeach
                            @endforeach
                            
                            @if (!$completedCourseFound)
                                <h4 class="text-center text-muted"><img src="{{ asset('student-asset/asset/img/note-2.png') }}" alt="">&nbsp;No Completed Course</h4>
                            @endif
                
                       @endif
                     </div>
                </div>

                  <!--enrolled course-->
                  <div class="d-flex align-items-center justify-content-between mt-4">
                       <h2 class="content-heading heading-lg">Enrolled Courses</h2>
                       <a href="/student-courses" class="content-heading heading-lg">View All &nbsp; <i class="fa fa-chevron-right"></i></a>
                  </div>
                 
                <div class="row">
                    @if($Allcourse->isEmpty())
                       <h4 class="text-center text-muted"><img src="{{asset('student-asset/asset/img/note-2.png')}}" alt="">&nbsp;No Enrolled Course</h4>     
                       
                    @else
                      @foreach ($Allcourse as $item)
                        @if(count($item->purchasedCourses)>0)

                         @foreach($item->purchasedCourses as $purchaseditem) 
                           @if($purchaseditem->current_chapters<$purchaseditem->course_chapters)
                              <div class="col-sm-6">
                                  <div class="course-card course-card-sm mt-4">
                                      <a href="/course-preview/{{base64_encode($item->id)}}">
                                      <div class="img-ctn">
                                          <img src="{{$item->course_banner}}" alt="">
                                      </div>
                                      </a>
                                      
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
                                          <button class="submit-btn p-1 m-2">Enroll</button>
                                      @endif
                                      
                                  </div>
                              </div>
                              @endif
                           
                          @endforeach
                          
                        @endif
                         @endforeach              
                     @endif
                </div>
             </div>

             <div class="col-md-4">
               <div class="course-card overall-p mt-5">
                   <h2 class="course-title text-center">Overall Progress</h2>
                   <canvas id="courseProgressChart" width="200" height="200"></canvas>
                   <ul class="mt-5">
                       <li>
                           <h2 class="course-title">Chapters Completed</h2>
                           <span class="course-title primary-color">{{$currentchapters}}/{{$coursechapters}}</span>
                       </li>
                       <li>
                           <h2 class="course-title">Badges Earned</h2>
                           <span class="course-title primary-color">40</span>
                       </li>
                       <li>
                           <h2 class="course-title">Points Earned</h2>
                           <span class="course-title primary-color">40</span>
                       </li>
                   </ul>
               </div>
               <div class="course-card mt-3 p-3">
                   <div class="d-flex align-items-center justify-content-between">
                       <h3 class="course-title m-0 p-0 primary-color">Announcement</h3>
                       <a href="javascript:;" class="primary-color"><i class="fa fa-chevron-right"></i></a>
                   </div>
                   @foreach($Notification as $notify)
                   <div class="course-card p-3 mt-3 anno-card d-flex align-items-center justify-content-start gap-2">
                       <div class="img">
                           <img src="{{asset('student-asset/asset/img/user-picture.png')}}" alt="">
                       </div>
                       <div>
                           <p class="m-0 p-0">
                               {{$notify->notification}}
                           </p>
                           <small class="tim">{{\Carbon\Carbon::parse($notify->created_at)->diffForHumans() }}</small>
                       </div>
                   </div>
                   @endforeach
                  
               </div>
             </div>
        </div>
       </div>

       <script>
        var completed={{$completed}}
        var uncompleted={{$uncompleted}}
        Chart.register(ChartDataLabels);
                // Course Progress Chart 
                var data =  [completed,uncompleted];
                var label = ['Completed', 'uncompleted'];
                pieChart(data, label, 'courseProgressChart')
                
            
                function pieChart(data, label, idName) {
                    idName.height = 'auto';

                    new Chart(idName, {
                        type: 'pie',
                        data: {
                                defaultFontFamily: 'Poppins',
                                labels: label,
                                datasets: [
                                    {
                                        data: data,
                                        borderColor: '#D80450',
                                        backgroundColor:  [
                                            '#007CFE', // Green
                                            'transparent', // Orange
                                            '#f97066', // Red
                                        ],
                                        borderColor: 'white',
                                        borderWidth: 0,
                                        tension: 0.5,
                                        fill: false,
                                    }
                                ],
                        },
                        options: {
                                plugins: {
                                    datalabels: {
                                        display: true,
                                        color: 'white', 
                                        formatter: function(value, context) {
                                            return value + '%';
                                        }
                                    },
                                    legend: {
                                        display: false,
                                        position: 'bottom'
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                var label = context.label || '';
                                                var value = context.formattedValue || '';
                                                return label + ': ' + value + '%';
                                            }
                                        }
                                    }
                                }
                        }
                    });
                }
            </script>

</div>
