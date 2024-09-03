$(document).ready(function(){
    const $tabs = $('.cred-tab');
    const $nextBtn = $("#next-cred-btn");
    const $prevBtn = $("#prev-cred-btn");
    let currentTab = 1;
     

    let progressBar = $('.cred-bar');
    let tabsLength = $tabs.length;
    let step = 100 / parseInt(tabsLength);
     // progressBar.css({width: `${step}%`})
    





     function showTab(tabIndex) {
          // $tabs.hide().eq(tabIndex - 1).fadeIn();
          $tabs.stop().slideUp('fast');
          $tabs.eq(tabIndex - 1).stop().slideDown('slow');
          if (tabIndex > 1) {
               progressBar.css({width: `${tabIndex * step}%`})
          }else{
               progressBar.css({width: `${step}%`})
          }
     }

     $prevBtn.on("click", function() {
          if (currentTab > 1) {
               currentTab--;
               showTab(currentTab);
               $('#generate-link-btn').addClass('d-none');
               $('#next-cred-btn').removeClass('d-none');
              
          }
     });

     $nextBtn.on("click", function() {
          if (currentTab < $tabs.length) {
               currentTab++;
               showTab(currentTab);
               
          }
          if (currentTab == $tabs.length) {
               $('#generate-link-btn').removeClass('d-none');
               // $('#prev-cred-btn').addClass('d-none');
               $('#next-cred-btn').addClass('d-none');
          }
     });

     // Show the initial tab
     showTab(currentTab);
     
     
     $('#remove-prevido').on('click', function(){
          Swal.fire({
               text: 'Are you sure that you want to delete this file?',
               icon: 'error',
               showCancelButton: true,
               confirmButtonText: 'Yes, Delete'
           }).then((result) => {
               if (result.isConfirmed) {
                    $(this).parent('.prevido').remove();
               }
           })
     });
     

     $('#generate-link-btn').on('click', function(){
          var _this = $(this);

          Swal.fire({
               text: 'Are you sure that you want to submit?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, submit'
           }).then((result) => {
               if (result.isConfirmed) {
                    $('#show-link-btn').click();
               }
           })

          
     });
     
     
     
     
     // Add new Skill
     $('#add-skill-btn').on("click", function(){
          let html = `
               <div class="row mb-4">
                    <div class="col-md-5 col-7">
                         <div class="form-group">
                              <input type="text" name="" placeholder="Skill" id="" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-2 d-none d-md-block"></div>
                    <div class="col-md-5 col-5">
                         <div class="form-group">
                              <select name="" class="form-control" id="">
                                   <option value="">Select</option>
                                   <option value="">Beginner</option>
                                   <option value="">Intermediate</option>
                                   <option value="">Advanced</option>
                                   <option value="">Expert</option>
                                   <option value="">Master</option>
                              </select>
                         </div>
                    </div>
               </div>
          `;
          
          $('#skills').append(html);
     })


     //Upload project file
    $('body').on('click', '.proj-label', function(){
          $(this).siblings('input[type="file"]').click();
    })

     $('body').on('change', '.proj-file', function() {
          let _this = $(this);
          let html = `
                    <div class="report-evid">
                         <div class="d-flex align-items-center justify-content-between">
                              <small style="opacity: 0.6"><i>Uploading...</i></small>
                              <div id='percent' class="percent">0%</div>
                         </div>
                         <div class="progress" id="progress">
                              <div class="bar" id="bar"></div>
                         </div>
                    </div>
                    `;

          var container = $(this).parent('.evid-ctn').siblings('.proj-file-ctn');
          container.html(html);

          var initialWidth = 0;
          var targetWidth = parseInt(_this.parent('.evid-ctn').siblings('.proj-file-ctn').find('.progress').innerWidth());

          function increaseProgress() {
          
          var newWidth = (initialWidth / targetWidth) * 100;
          _this.parent('.evid-ctn').siblings('.proj-file-ctn').find(`.bar`).css('width', newWidth + '%');
          initialWidth += 1;

          _this.parent('.evid-ctn').siblings('.proj-file-ctn').find(`.percent`).text(parseInt(newWidth) + '%');

          if (initialWidth <= targetWidth) {
               // Repeat the process after a short delay
               setTimeout(increaseProgress, 10);
          }
          
               if(newWidth == 100){
                    setTimeout(() => {
                         _this.parent('.evid-ctn').siblings('.proj-file-ctn').find(`small`).text(``);
                    }, 1000);
               }
          }
               
          increaseProgress();
     });


     //Add new Academic project
     $('#add-acad-p').on('click', function(){
          var container =  $('#academic-projects');
          addNewProject(container);
     });

     //Add new Professional project
     $('#add-prof-p').on('click', function(){
          var container =  $('#professional-projects');
          addNewProject(container);
     });

     //Add new Personal project
     $('#add-perso-p').on('click', function(){
          var container =  $('#personal-projects');
          addNewProject(container);
     });


     function addNewProject(container){
          let html = `
               <div class="row">
                    <div class="col-md-6 mb-4">
                         <div class="form-group">
                              <input type="text" placeholder="Project Name" name="" id="" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-6 mb-4">
                         <div class="form-group">
                              <input type="text" placeholder="Project Duration" name="" id="" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-6 mb-4">
                         <div class="form-group">
                              <textarea name="" id="" cols="30" placeholder="Project Summary" rows="4" class="form-control h-100"></textarea>
                         </div>
                    </div>
                    <div class="col-md-6 mb-4">
                         <div class="input-ctn border h-100 p-3">
                              <div class="proj-file-ctn"></div>
                              <div class="form-group evid-ctn mt-2">
                                   <label class="proj-label" ><span>Upload files</span> <img src="asset/img/upload-icon.png" width="20px" alt=""> </label>
                                   <input type="file"  name="files" class="form-control default-input off-screen proj-file">
                              </div>
                         </div>
                    </div>
               </div>
          `;
          container.append(html);
     }

})



document.getElementById('video-file').addEventListener('change', function(event) {
     const file = event.target.files[0];
     
     if (file && file.type.startsWith('video/')) {
          const reader = new FileReader();
          
          reader.onload = function(event) {
               const videoElement = document.createElement('video');
               videoElement.src = event.target.result;
               videoElement.controls = true;
               
               const ctn = document.getElementById('live-record-ctn');
               ctn.innerHTML = '';
               ctn.appendChild(videoElement);
          };
          
          reader.readAsDataURL(file);
     } else {
          alert('Please select a valid video file.');
     }
});