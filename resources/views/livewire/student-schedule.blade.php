<div>
    <div class="main-content">
        <div class="row">
             <div class="col-12">
                  <div id="calendar" class="calendar"></div>
             </div>
        </div>
  </div>
  <script src="{{asset('student-asset/vendor/jquery/jQuery3.6.1.min.js')}}"></script>
  <script>
     $(document).ready(function(){
                var activeDays = [
                    "2024:04:05", 
                    "2024:04:10", 
                    "2024:04:15", 
                    "2024:04:25", 
                    "2024:04:30", 
                    "2024:05:01", 
                    "2024:05:10", 
                    "2024:05:25", 
                    "2024:05:30", 
                    "2024:06:20", 
                    "2024:08:20"
                 ];
               $("#calendar").simpleCalendar({ activeDays: activeDays });
          })
     </script>

</div>
