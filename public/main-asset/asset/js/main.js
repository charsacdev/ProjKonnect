$(document).ready(function() {


    // Toggle Password Input Visibility

    $('.rlf-hd-hide').on('click', function(){
      let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
      targetInput.attr('type', 'text');
      $(this).siblings('.rlf-hd-show').removeClass('d-none');
      $(this).addClass('d-none');

    });

    $('.rlf-hd-show').on('click', function(){
      let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
      targetInput.attr('type', 'password');
      $(this).siblings('.rlf-hd-hide').removeClass('d-none');
      $(this).addClass('d-none');
    });


        //NAVBAR TOGGLING
        const menuBtn = $('.menu-btn');
        let menuOpen = false;
        menuBtn.click(function() {
        if(!menuOpen){
            menuBtn.addClass('open');
            $('.nav-sm').animate({left: '0px'});
            menuOpen = true;
        }else{
            menuBtn.removeClass('open');
            $('.nav-sm').animate({left: '-300px'});
            menuOpen = false;
        }
        })
    
        let sideClose = $('.close');
        sideClose.click(function(){
         menuBtn.removeClass('open');
            $('.nav-sm').animate({left: '-300px'});
            menuOpen = false;
        })

  
    
        //STICKY TOP NAVBAR 
        var navHeight = $("nav.navbar").height();

        var stickyNavTop = $("nav.navbar").offset().top;
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();
            if(scrollTop > stickyNavTop){
              // $("nav.navbar").parents('header').addClass('stiky__pt');
              $("nav.navbar").addClass("sticky");
            }else{
                $("nav.navbar").removeClass("sticky");
                // $("nav.navbar").parents('header').removeClass('stiky__pt');
            }
        };
        $(window).scroll(function(){
            stickyNav();
        });


        //STICKY TOP NAVBAR FOR HEADER1
        // var scrollTop = $(window).scrollTop();
        //   if (scrollTop > 10) {
        //     $('.header1').find('nav.navbar').addClass('sticky');
        //   }else{
        //     $('.header1').find('nav.navbar').removeClass('sticky');
        //   }
       

        // $(window).on('scroll', function(){
        //   var scrollTop = $(window).scrollTop();
        //   if (scrollTop > 10) {
        //     $('.header1').find('nav.navbar').addClass('sticky');
        //   }else{
        //     $('.header1').find('nav.navbar').removeClass('sticky');
        //   }
        // });



       var currentYear = new Date().getFullYear();
       $('#year').text(currentYear);


       var pathLength = $('.progress-bar').width();
			var progressLength = $('.progress-bar').find('.progress');
			var offset = 500;
			

			function updateProgress(){
				var scroll = $(window).scrollTop();
				var height = $(document).height() - $(window).height();
				var progress =  (scroll * pathLength / height);
				progressLength.css('width', progress);
			}



			updateProgress();
			
			$(window).scroll(function(){
				var scroll = $(window).scrollTop();
				var height = $(document).height() - $(window).height();
				var progress =  (scroll * pathLength / height);
				progressLength.css('width', progress);
			});
    
});