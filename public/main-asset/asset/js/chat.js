var chatsHeaderHeight = $("#chats .chat-header").outerHeight();
    var chatsInboxBodyHeight = $("#chats .chat-inbox-body").outerHeight();
    var chatAreaFooterHeight = $("#chat-area .chat-area-footer").outerHeight();

    // alert(chatsInboxBodyHeight)
    // alert(chatsHeaderHeight)
   
    

    
var screenSize = $(window).innerWidth();
var screenHeight = $(window).innerHeight();
var chatInboxBodyHeight = $("#chats .chat-inbox-body").innerHeight();

var chatHeaderHeight = $("#chats .chat-header").innerHeight();
$(".chat-container").css("height", screenHeight);




if(screenSize >= 426){
    $(".card-container").hover(function(){
    $(this).children(".team-card").fadeOut("slow");
    $(this).children(".team-sub-card").fadeIn("slow");
    },function(){
        $(this).children(".team-card").fadeIn("slow");
        $(this).children(".team-sub-card").fadeOut("slow");
    })
}




if(screenSize >= 992){
    $(".chat-container").addClass("grid-2");
    $("#profile-view").addClass("d-none");

    $("#profile-view .close-view").click(function(){
       $(".chat-container").removeClass("grid-3").addClass("grid-2");
       $("#profile-view").addClass("d-none");
    });

    $(".chat-area-header-img").click(function(){
        $(".chat-container").removeClass("grid-2").addClass("grid-3");
        $("#profile-view").removeClass("d-none");
    })
}


if(screenSize <= 576){
    $(".chat-inbox").click(function(){
      $("#chat-area").css({
        zIndex: 2,
        width: "cal(100vw - 20px)",
        height: "100vh",
        transition: "all 0.6s ease-in-ease-out"
      }).animate({right: "0"});
      $("#chats").addClass("d-none");
    })

    $(".chat-inbox-body").css("paddingBottom", "0")
    $(".chat-inbox-body .chat-inbox").last().css("marginBottom", "0px");
    $(".chat-inbox").removeClass("active");

    $("#chat-area .chat-area-header .close-view").click(function(){
        $("#chat-area").animate({right: "-1000px"});
        $("#chats").removeClass("d-none");
    })


    $(".chat-area-header-img").click(function(){
        $("#profile-view").css({
            zIndex: 2,
            width: "300px",
            height: "67.5vh",
            opacity: "1",
            background: "var(--blog-bgcolor)",
            transition: "all 0.6s ease-in-ease-out"
          }).animate({right: "0"});
    })


    $("#profile-view .close-view").click(function(){
        $("#profile-view").animate({right: "-1000px"});
    })
    
    
}

if(screenSize >= 577 && screenSize  <= 991){
    $(".chat-container").addClass("grid-2");

    $(".chat-area-header-img").click(function(){
        
        $("#profile-view").css({
            zIndex: 2,
            width: "300px",
            height: "85vh",
            opacity: "1",
            background: "var(--blog-bgcolor)",
            transition: "all 0.6s ease-in-ease-out"
          }).animate({right: "0"});
    });

    $("#profile-view .close-view").click(function(){
        $("#profile-view").animate({right: "-1000px"});
    })
}





$(".chat-inbox").click(function(){
    $(".chat-inbox").removeClass("active");
    $(this).addClass("active");
})








$(".right-inner-icon .svg-inline--fa.fa-paperclip").click(function(){
    $(".send-doc-photo").fadeToggle("slow");
})



$("#survey-form ul.options li").click(function(){
    $(this).addClass("active");
    $(this).siblings().removeClass("active");
})