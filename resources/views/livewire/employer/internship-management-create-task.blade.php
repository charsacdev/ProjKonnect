<div>
    
    <div class="main-content">
        <div class="row">
             <div class="col-lg-8 col-md-7 mb-4">
                <h4 class="mb-3">New Task</h4>
              <form action="">
                  <div class="row align-items-baseline">
                      <div class="col-12 mb-4">
                          <div class="form-group">
                              <h6>Title</h6>
                              <input type="text" name="" placeholder="Enter title" id="" class="form-control custom">
                          </div>
                      </div>
                  </div>
                 
                  <div class="form-group mb-4">
                      <h6>Description</h6>
                      <textarea placeholder="Enter description" rows="7" class="form-control custom"></textarea>
                  </div>
                  <h5 class="mb-4">Tasks</h5>
                  <div id="task-container">
                     <div class="task mb-4">
                        <textarea placeholder="Enter task" id="" cols="30" rows="4" class="form-control custom"></textarea>
                     </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6 mb-4">
                          <div class="form-group">
                              <h6>Resources</h6>
                              <input type="text" placeholder="e.g. htts://codeingo.com/resources/4iiesiisli" id="" class="form-control custom">
                          </div>
                      </div>
                      <div class="col-sm-6 mb-4">
                          <div class="form-group">
                              <h6>Duration</h6>
                              <input type="text" placeholder="e.g. 2 weeks" id="" class="form-control custom">
                          </div>
                      </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-3 mb-5">
                      <button type="button" id="add-task-btn" class="new-discussion-btn"><img src="{{asset('employer-asset/asset/img/plus_icon.png')}}" alt="icon"> &nbsp; Add Task</button>
                      <button type="button" data-bs-toggle="modal"
                      data-bs-target="#successModal" class="new-discussion-btn"><img src="{{asset('employer-asset/asset/img/document-upload-icon.png')}}" alt="icon"> &nbsp; Publish Task</button>
                  </div>
              </form>
             </div>

             <div class="col-lg-4 col-md-5 mb-4">
                <div class="course-card overall-p mb-4">
                    <h2 class="course-title text-center mb-5">Overall Progress</h2>
                    <div class="intern-task-img">
                        <img src="{{asset('employer-asset/asset/img/team3.png')}}" alt="Image">
                    </div>
                    <ul class="mt-5">
                        <li>
                            <h2 class="course-title">Total Tasks</h2>
                            <span class="course-title text-blue">30</span>
                        </li>
                        <li>
                            <h2 class="course-title">Total Delivered</h2>
                            <span class="course-title text-blue">25</span>
                        </li>
                        <li>
                            <h2 class="course-title">Total Left</h2>
                            <span class="course-title text-blue">5</span>
                        </li>
                    </ul>
                </div>
              
              <div class="internship-card">
                <div class="d-flex align-items-center justify-content-between mb-5">
                   <span>Delivered Tasks</span>
                   <a href="intern-details.html" class="text-blue">View All</a>
                </div>
                <ol>
                   <li class="mb-3"><a href="intern-task-details.html">Design System, User Research and...</a></li>
                   <li class="mb-3"><a href="intern-task-details.html">Design System, User Research and...</a></li>
                   <li class="mb-3"><a href="intern-task-details.html">Design System, User Research and...</a></li>
                   <li class="mb-3"><a href="intern-task-details.html">Design System, User Research and...</a></li>
                   <li class="mb-3"><a href="intern-task-details.html">Design System, User Research and...</a></li>
                   <li class="mb-3"><a href="intern-task-details.html">Design System, User Research and...</a></li>
                </ol>
            </div>
             </div>
        </div>
  </div>

 


</div>
