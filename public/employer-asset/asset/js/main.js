$(document).ready(function() {

       var currentYear = new Date().getFullYear();
       $('#year').text(currentYear);


        //NAVBAR TOGGLING - ADMIN

        $('.main-header .menu').on('click', function(){
            $('.sidebar').animate({left: '0px'});
        })

        $('.sidebar-close').on('click', function(){
            $('.sidebar').animate({left: '-350px'});
        })


        $('body').on('click', function(){

            $('.profile-dropdown-items').addClass('d-none');
            $('.directions').addClass('close');
        })
       $('.drop-now').on('click', function(e){
            e.stopPropagation();

            $(this).parents('.profile-dropdown').siblings('.profile-dropdown').find('.profile-dropdown-items').addClass('d-none');
            $(this).parents('.profile-dropdown').siblings('.profile-dropdown').find('.directions').addClass('close');
            $(this).siblings('.profile-dropdown-items').toggleClass('d-none');
           $(this).find('.directions').toggleClass('close');
       })

       $('.profile-dropdown-items').on('click', function(e){
            e.stopPropagation();
            $(this).removeClass('d-none');
       })


       //AI PAGE 
       $('.ai-main').find('#header-menu-icon').on('click', function(){
            $('.ai-sidebar').animate({left: '0px'});
       })

       $('.ai-sidebar').find('.ai-sidebar-close').on('click', function(){
            $('.ai-sidebar').animate({left: '-300px'});
       })


       $('.ai-form').on('submit', function(e){
           e.preventDefault();

          showChat();
        })

        $('.new-chat-btn').on('click', function(){
            $('.ai-card-footer').find('.suggest').removeClass('d-none');
            $('.ai-chat-content').addClass('d-none');
        })


      var ai_btn =  $('.ai-card-footer').children('.suggest').children('.sg-card').find('button');
      ai_btn.on('click', function(){
            showChat();
      })

      function showChat(){
            $('.ai-card-footer').find('.suggest').addClass('d-none');
            $('.ai-chat-content').removeClass('d-none');
      }


      //MESSAGE PAGE
      var screenSize = window.screen.width;

      $('.message-sidebar').find('.contact').on('click', function(){
            $(this).siblings('.contact').removeClass('active');
            $(this).addClass('active');
            setTimeout(() => {
                $(this).find('.unseen-count').addClass('d-none');
            }, 2000);

            if(screenSize <= 576){
                $('.message-sidebar').animate({left: '-400px'});
            }
       
    })

      $('.message-main').find('.hide-main').on('click', function(){
            $('.message-sidebar').animate({left: '0px'});
      });

     

      $('#drop-message-search-ctn').on('click', function(){
            let ctn = $('#message-word-search');
            if(ctn.hasClass('active')){
                ctn.fadeOut().removeClass('active');
                $('.sent').removeClass('highlighted');
                $('.received').removeClass('highlighted');
                $('#message-word-search').find('input').val('');
                 $('#message-word-search').find('input').siblings('.controls').fadeOut();
            }else{
                ctn.fadeIn().addClass('active');
            }
      })

      var currentIndex = 1;

      $('#message-word-search').find('input').on('keyup', function(){
            if($(this).val() == ''){
                $(this).siblings('.controls').fadeOut();
            }else{
                $(this).siblings('.controls').fadeIn();
            }

            let searchTerm = $(this).val().trim().toLowerCase();

        
            $('.sent, .received').each(function(){
                let $message = $(this);
                let messageText = $message.find('p').text().trim().toLowerCase();
                
                if (messageText.includes(searchTerm)) {
                    $message.addClass('highlighted');
                } else {
                    $message.removeClass('highlighted');
                }
            });

            if($(this).val() == ''){
                $('.sent').removeClass('highlighted');
                $('.received').removeClass('highlighted');
                $('#search-count').text(0);
            }

            let $highlights = $('.highlighted');
           
            if ($highlights.length === 0){
                $('#search-count').text(0);
                return;
            };

            scrollToHighlighted(currentIndex);
        
      })



      $('#prev-highlight').on('click', function(){
        if (currentIndex > 1) {
            currentIndex--;
            scrollToHighlighted(currentIndex);
        }
    });

    $('#next-highlight').on('click', function(){
        let $highlights = $('.highlighted');
        if (currentIndex < $highlights.length) {
            currentIndex++;
            scrollToHighlighted(currentIndex);
        }
       
    });

      function scrollToHighlighted(index) {
        let $highlightedMessage = $('.highlighted');
        let searchCount = parseInt($highlightedMessage.length);

        $('#search-count').text(index + '/' + searchCount);
        if ($highlightedMessage.length > 0) {
            $highlightedMessage[index - 1].scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }


    //Audio
    let recorder;
    let audioChunks = [];
    let isRecording = false;
    let isPaused = false;
    let startTime;

    $("#startRecording").click(function() {
        if($('.recorder-board').hasClass('active')){
            $('.recorder-board').fadeOut().removeClass('active');
        }else{
            $('.recorder-board').fadeIn().addClass('active');
        }
    });

    $("#pausePlayRecording").click(function() {
        $(this).addClass('d-none');
        $('#playRecording').removeClass('d-none');
    });


    $("#playRecording").click(function() {
        $(this).addClass('d-none');
        $('#pausePlayRecording').removeClass('d-none');

      });

    $("#resumeRecording").click(function(){
        $(this).addClass('d-none');
        $('#pauseRecording').removeClass('d-none');
        $('#playRecording').addClass('d-none');
         $('#pausePlayRecording').addClass('d-none');
    });

    $("#pauseRecording").click(function(){
        $(this).addClass('d-none');
        $('#resumeRecording').removeClass('d-none');
        $('#playRecording').removeClass('d-none');
    });

 
    $('#attachment').change(function(event) {
        const file = event.target.files[0]; // Get the selected file
        const fileName = file.name; // Extract the file name

        // Determine the icon based on file type
        let iconClass;
        if (fileName.endsWith('.pdf')) {
          iconClass = 'fas fa-file-pdf';
        } else if (fileName.endsWith('.doc') || fileName.endsWith('.docx')) {
          iconClass = 'fas fa-file-word';
        } else if (fileName.endsWith('.xls') || fileName.endsWith('.xlsx')) {
          iconClass = 'fas fa-file-excel';
        } else {
          iconClass = 'fas fa-file'; 
        }

      
        const htmlContent = `
          <div class="sent-ctn">
            <div class="sent">
              <p>
                <i class="${iconClass}"></i> ${fileName}
              </p>
              <div class="d-flex align-items-center justify-content-between">
                <div class="download-icon"><i class="fa fa-download"></i></div>
                <div>
                    <small>${formatTime(new Date())}</small>
                    <img src="asset/img/message-seen-icon.png" alt="icon">
                </div>
              </div>
            </div>
          </div>
        `;

       
        $('.message-main-body').append(htmlContent);
         $('.message-main-body').scrollTop($('.message-main-body')[0].scrollHeight);
      });


    // Function to format time as HH:MM AM/PM
    function formatTime(date) {
        let hours = date.getHours();
        let minutes = date.getMinutes();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // Handle midnight (0 hours)
        minutes = minutes < 10 ? '0' + minutes : minutes;
        return hours + ':' + minutes + ' ' + ampm;
      }
   


      //Notification page
      $('#markAllBtn').on('click', function(){
        $('#notification-container').find('.resta').remove();
      })


      // Forum
      $('#openDiscussionform').on('click', function(){
            if($(this).hasClass('opened')){
                $('#new-discussion-form').fadeOut();
                $(this).removeClass('opened');
            }else{
                $('#new-discussion-form').fadeIn();
                $(this).addClass('opened');
            }
      })



    //   Live Session
    $('#close-lsc').on('click', function(){
        $('#lsc-sidebar-ctn').animate({right: '-800px'});
    })

    $('#lsc-menu-icon').on('click', function(){
        $('#lsc-sidebar-ctn').animate({right: '0'});
    })


    //Sidebar
    $('.sidebar-link-dropdown').on('click', function(){
        if($(this).hasClass('closed')){
            $(this).siblings('.sidebar-dropdown-items').slideDown();
            $(this).find('.svg-inline--fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            $(this).removeClass('closed').addClass('opened');
        }else{
            $(this).siblings('.sidebar-dropdown-items').slideUp();
            $(this).find('.svg-inline--fa').addClass('fa-chevron-down').removeClass('fa-chevron-up');
            $(this).addClass('closed').removeClass('opened');
        }
       
    })

    if($('.sidebar-link-dropdown').siblings('.sidebar-dropdown-items').find('.sidebar-link').hasClass('active')){
        $('.sidebar-link-dropdown').siblings('.sidebar-dropdown-items').slideDown();
        $('.sidebar-link-dropdown').removeClass('closed').addClass('opened');
    }
});