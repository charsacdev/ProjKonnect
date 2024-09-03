$(document).ready(function(){

     $('.tab_previous').addClass('transparency');
     $('.tab').parents('.tabs').fadeIn(700);
     var tabs = $('.tab');
     var currentIndex = 0;

     //show the initial tab
     tabs.eq(currentIndex).fadeIn(700);

     //Show next tab
     $('.tab_next').on('click', function () {
          if (currentIndex < (tabs.length - 1)) {
               tabs.eq(currentIndex).fadeOut(700);
               currentIndex++;
               tabs.eq(currentIndex).delay(600).fadeIn(700); 
               
               (currentIndex > 0) ? customDelay('showPreviousBtn')  : customDelay('hidePreviousBtn');
               (currentIndex > 0) ? customDelay('showNextBtn') : customDelay('showGetStartedBtn');
               (currentIndex == (tabs.length - 1)) ? customDelay('showSubmitBtn') : customDelay('showNextBtn');
          }
     });

     //show previous tab
     //Show next tab
     $('.tab_previous').on('click', function () {
          if (currentIndex > 0) {
               tabs.eq(currentIndex).fadeOut(700);
               currentIndex--;
               tabs.eq(currentIndex).delay(600).fadeIn(700); 
               
               (currentIndex > 0) ? customDelay('showPreviousBtn')  : customDelayPrev('hidePreviousBtn');
               (currentIndex > 0) ? customDelay('showNextBtn') : customDelay('showGetStartedBtn');
               (currentIndex == (tabs.length - 1)) ? customDelay('showSubmitBtn') : customDelay('showNextBtn');
          }


     });


     function customDelayPrev(a){
          setTimeout(() => {
               if(a == 'hidePreviousBtn'){
                    $('.tab_previous').addClass('transparency');
               }
          }, 500);
     }

     
     function customDelay(a){
          setTimeout(() => {
               if(a == 'showPreviousBtn'){
                    $('.tab_previous').removeClass('transparency');
               }else if(a == 'hidePreviousBtn'){
                    $('.tab_previous').addClass('transparency');
               }else if(a == 'showSubmitBtn'){
                    $('.tab_next').html('Submit').addClass('submit-listing-btn');
               }else if(a == 'showNextBtn'){
                    $('.tab_next').html('Next &nbsp;<i class="fa fa-arrow-right"></i>');
                    $('.tab_next').removeClass('submit-listing-btn');
               }else if(a == 'showGetStartedBtn'){
                    $('.tab_next').html('Get Started');
               }
              
          }, 700);
     }



     $('.apt_desc').on('click', function(){
          a = $(this);
          setActive(a, '.apt_sib', '.apt_sib', '.apt_desc');
     });


     function setActive(a, b, c, d){
          $(a).parent(b).siblings(c).children(d).removeClass('active');
          $(a).addClass('active');
     }

     $('.gst_plc').on('click', function(){
          $(this).parents('.row').find('.gst_plc').removeClass('active');
          $(this).addClass('active');
     });


     //Make active many items
     $('.apt_sib_self').on('click', function(){
          $(this).toggleClass('active');
     });
        
        
     //Counter Increase
     $('.btn-counter.increase').on('click', function(){
          counter = $(this).siblings('span');
          currentCount = parseInt(counter.text());
          
          currentCount++;
          counter.text(currentCount);

     });

     //Counter decrease
     $('.btn-counter.decrease').on('click', function(){
          counter = $(this).siblings('span');
          currentCount = parseInt(counter.text());
          
          if(currentCount > 1){
               currentCount--;
               counter.text(currentCount);
          }

     });


     //Word Counter for listing title
     $('.title-field').on('input', function(){
          input = $('.title-field');
          output = $(this).parents('.row').find('.word-count');
          max = 30;

          wordCount(input, output, max);
     });


     //Word Counter for listing description
     $('.description-field').on('input', function(){
          input = $('.description-field');
          output = $(this).parents('.row').find('.word-count');
          max = 500;

          wordCount(input, output, max);
     });


     //Word count method
     function wordCount(input, output, max){
          var words = $(input).val().split(/\s+/);
          words = words.filter(function(){
               return words.length > 0;
          });

          $(output).text(words.length + '/' + max);
     }


        //show the initial tab
     //    $('.tab').parents('.tabs').fadeIn(700);
     //    $('.tab:first').fadeIn(700);

     //    $('.tab_next').on('click', function(){
     //      if(currentTab <= $('.tab').length){
     //           $('.tab:nth-child(' + currentTab + ')').fadeOut(700);
     //           currentTab++;
     //           $('.tab:nth-child(' + currentTab + ')').delay(700).fadeIn(700);
               
     //           console.log(currentTab);
     //      }
     //    });


     //    function updateTab(){
     //      $('.tab').fadeOut(700, function(){
     //           $('tab:nth-child(' + currentTab + ')').fadeIn(700);
     //      });
     //    }



     $('body').on('click', '.submit-listing-btn', function(){
          location.href = 'addlisting-congratulations.html';
     });


       
});
