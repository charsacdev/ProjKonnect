(function($) {
     $.fn.simpleCalendar = function(options) {
       var settings = $.extend({
         activeDays: []
       }, options);
 
       return this.each(function() {
         var currentYear;
         var currentMonth;
         
         var currentDate = new Date();
         var leastActiveDate = new Date(Math.min.apply(null, settings.activeDays.map(function(date) {
           return new Date(date.split(":")[0], date.split(":")[1] - 1);
         })));
         
         currentYear = leastActiveDate.getFullYear();
         currentMonth = leastActiveDate.getMonth();
 
         var monthNames = ["January", "February", "March", "April", "May", "June",
           "July", "August", "September", "October", "November", "December"];
 
         var dayNames = [ "S", "M", "T", "W", "T", "F", "S"];
 
         var $calendar = $(this);
 
         function renderCalendar() {
           var html = '<div class="header">' +
             '<button class="prevBtn"><i class="fa fa-chevron-left"></i></button>' +
             '<span class="month-year">' + monthNames[currentMonth] + ', ' + currentYear + '</span>' +
             '<button class="nextBtn"><i class="fa fa-chevron-right"></i></button>' +
             '</div>' +
             '<div class="days">' +
             '</div>' +
             '<div class="dates"></div>';
 
           $calendar.html(html);
 
           var $days = $calendar.find(".days");
           var $dates = $calendar.find(".dates");
 
           dayNames.forEach(function(day) {
             $days.append("<div class='day'>" + day + "</div>");
           });
 
           var firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
           var lastDayOfPreviousMonth = new Date(currentYear, currentMonth, 0).getDate();
           var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
 
           $dates.empty();
           for (var i = firstDayOfMonth - 1; i >= 0; i--) {
             var prevMonthDay = lastDayOfPreviousMonth - i;
             var $prevMonthDay = $("<div class='day prev-month'>" + prevMonthDay + "</div>");
             var dateString = currentYear + ":" + (currentMonth + 1 < 10 ? '0' + (currentMonth) : (currentMonth)) + ":" + prevMonthDay;
             if (settings.activeDays.includes(dateString)) {
               $prevMonthDay.addClass("active");
             }
             $dates.append($prevMonthDay);
           }
 
           for (var i = 1; i <= daysInMonth; i++) {
             var $day = $("<div class='day'>" + i + "</div>");
             var dateString = currentYear + ":" + (currentMonth + 1 < 10 ? '0' + (currentMonth + 1) : (currentMonth + 1)) + ":" + (i < 10 ? '0' + i : i);
             if (settings.activeDays.includes(dateString)) {
               $day.addClass("active");
             }
             $dates.append($day);
           }
 
           if ((firstDayOfMonth + daysInMonth) % 7 !== 0) {
             var remainingDays = 7 - ((firstDayOfMonth + daysInMonth) % 7);
             for (var i = 1; i <= remainingDays; i++) {
               var nextMonthDay = i;
               var $nextMonthDay = $("<div class='day next-month'>" + nextMonthDay + "</div>");
               var dateString = currentYear + ":" + (currentMonth + 2 < 10 ? '0' + (currentMonth + 2) : (currentMonth + 2)) + ":" + (nextMonthDay < 10 ? '0' + nextMonthDay : nextMonthDay);
               if (settings.activeDays.includes(dateString)) {
                 $nextMonthDay.addClass("active");
               }
               $dates.append($nextMonthDay);
             }
           }
         }
 
         renderCalendar();
 
         $calendar.on("click", ".prevBtn", function() {
           currentMonth--;
           if (currentMonth < 0) {
             currentMonth = 11;
             currentYear--;
           }
           renderCalendar();
         });
 
         $calendar.on("click", ".nextBtn", function() {
           currentMonth++;
           if (currentMonth > 11) {
             currentMonth = 0;
             currentYear++;
           }
           renderCalendar();
         });
       });
     };
   })(jQuery);