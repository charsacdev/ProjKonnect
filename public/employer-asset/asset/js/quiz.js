$(document).ready(function(){
    
    let currentTab = 1;
    const $tabs = $('#quiz-tabs').children('.tab');
    const $nextBtn = $("#prev-q-btn");
    const $prevBtn = $("#next-q-btn");
    let totalQuestions = $('#ansQuiAnaBtns').children('button').length;
    let attemptedQuestions = $('#ansQuiAnaBtns').children('button.active').length;
    let unattemptedQuestions = totalQuestions - attemptedQuestions;

    showQuizDetails(totalQuestions, attemptedQuestions, unattemptedQuestions);


    function showTab(tabIndex) {
        $tabs.hide().eq(tabIndex - 1).show();
    }

    $prevBtn.on("click", function() {
        if (currentTab > 1) {
            currentTab--;
            showTab(currentTab);
        }
    });

    $nextBtn.on("click", function() {
        if (currentTab < $tabs.length) {
            currentTab++;
            showTab(currentTab);
        }
    });

    // Show the initial tab
    showTab(currentTab);

     $('.quiz-answer-anas button').on('click', function(){
          let num = $(this).data('value');

          showTab(num);
          currentTab = num;
     })


     var option = $('.options').children('label');
     option.on('click', function(){
          const tabIndex = $(this).closest(".tab").index();
          const $ansQuiAnaBtns = $('#ansQuiAnaBtns').children('button');
          $ansQuiAnaBtns.eq(tabIndex).addClass('active');

          let total = $ansQuiAnaBtns.length;
          let attempted = $('#ansQuiAnaBtns').children('button.active').length;
          let unattempted = total - attempted;

         showQuizDetails(total, attempted, unattempted);

     })


     function showQuizDetails(total, attempted,unattempted){
         $('#quiz-ana-board').find('#total-question').text(total);
         $('#quiz-ana-board').find('#attempted-question').text(attempted);
         $('#quiz-ana-board').find('#unattempted-question').text(unattempted);
     }

///////////////////////////////// COUNTDOWN TIMER ////////////////////////
     const targetDate = new Date().getTime() + (3 * 60 * 1000); 
     
     $('#quiz-ana-board').find('#total-time').text(displayTime(targetDate))

     const timerInterval = setInterval(function() {
          const currentDate = new Date().getTime();

          const remainingTime = targetDate - currentDate;

          const hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24);
          const minutes = Math.floor((remainingTime / 1000 / 60) % 60);
          const seconds = Math.floor((remainingTime / 1000) % 60);

          const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
          
          $("#quiz-ana-board").find('#time-left').text(formattedTime);

          if (remainingTime < 0) {
               clearInterval(timerInterval);
               $("#quiz-ana-board").find('#time-left').text(0);
          }
     }, 1000);


     function displayTime(targetDate) {
          const currentDate = new Date().getTime();
          const remainingTime = targetDate - currentDate;
          const minutes = Math.floor(remainingTime / 60000);
          if (minutes < 60) {
               let minDes = minutes > 1 ? 'mins' : 'min';
               return `${minutes}${minDes}`;
          } else {
               const hours = Math.floor(minutes / 60);
               const remainingMinutes = minutes % 60;

               var hrDes = hours > 1 ? 'hrs' : 'hr';
               var minDes = remainingMinutes > 1 ? 'mins' : 'min';

               if(remainingMinutes <= 0){
                    return `${hours}${hrDes}`;
               }else{
                    return `${hours}${hrDes} ${remainingMinutes}${minDes}`;
               }
          }
     }

     ////////////////////// Submission by user /////////
     $('#submit-quiz-btn').on('click', function(){
          var _this = $(this);
          $(this).text(`Please wait...`).prop('disabled', true);
          Swal.fire({
               title: 'Are you sure you want to submit?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: 'var(--primary-color)',
               confirmButtonText: 'Submit'
           }).then((result) => {
               setTimeout(() => {
                    if (result.isConfirmed) {

                         Swal.fire({
                              title: 'Success!',
                              icon: 'success',
                              showCancelButton: false,
                              confirmButtonColor: 'var(--primary-color)',
                              confirmButtonText: 'Back to home'
                         }).then((result) => {
                              setTimeout(()=>{
                                   if(result.isConfirmed){
                                        location.href = 'index.html';
                                   }
                              }, 1000)
                         })
                         _this.text('Submitted');
                    }else{
                         _this.text('Submit').prop('disabled', false);
                    }
               }, 1000);
              
           })
     })
      

     //////////////////// AUTOMATIC SUBMISSION /////
     var checkForElement = $("#quiz-ana-board").find('#time-left').length;
     if(checkForElement > 0){
          setTimeout(() => {
          
               const checkQuizTime = setInterval(() =>{
                    var timeLeft =   $("#quiz-ana-board").find('#time-left').text();
                    timeLeft = timeLeft;
               
                    if(timeLeft == 0){
                         clearInterval(checkQuizTime);
                         Swal.fire({
                              title: 'Success!',
                              icon: 'success',
                              showCancelButton: false,
                              confirmButtonColor: 'var(--primary-color)',
                              confirmButtonText: 'Back to home'
                         }).then(()=>{
                              if(isConfirmed){
                                   location.href = 'index.html';
                              }
                         });
                         $('#submit-quiz-btn').text('Submitted').prop('disabled', true);
                    }
               }, 1000);
          }, 2000);
     }
     
    

});