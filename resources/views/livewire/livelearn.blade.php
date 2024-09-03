<div>
    <div class="main-content">
        
        <div class="row">
              <!--message-->
               @if(session('error'))
                  <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                @elseif(session('success'))
                  <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
               @endif
             <div class="col-lg-12 mb-4">
                  <div class="table-responsive">
                       <table class="table" id="livelearn-table">
                            <thead style="white-space: nowrap">
                                 <th>Title</th>
                                 <th>Proguide</th>
                                 <th>Duration</th>
                                 <th>Date</th>
                                 <th>Status</th>
                                 <th>Action</th>
                            </thead>
                           <tbody>
                            
                            @foreach ($livesession as $item)
                            <tr style="white-space: nowrap">
                                <td>
                                     <div class="d-flex align-items-center gap-2">
                                         <div
                                             class="form-check custom-checkbox checkbox-success check-lg">
                                             <input type="checkbox" class="form-check-input"
                                                 id="customCheckBox8">
                                             <label class="form-check-label"
                                                 for="customCheckBox8"></label>
                                         </div>
                                         <div class="apt_ful">
                                             <span>{{$item->meeting_title}}</span>
                                         </div>
                                     </div>
       
                                </td>
                                <td>{{$item->proguide->full_name}}</td>
                                <td>{{$item->meeting_duration}}hour</td>
                                <td>{{$item->meeting_date}}</td>
                                <td>
                                   @if($item->meeting_status==='pending')
                                     <span class="live-badge secondary">Upcoming</span>
                                   @elseif($item->meeting_status==='live')
                                       <span class="live-badge success">Live</span>
                                   @else
                                     <span class="live-badge danger">Ended</span>
                                   @endif
                               </td>
                                  <td>
                                   
                                    @foreach($item->attendee as $attend)
                                         
                                        @if($attend->pay_status==='paid' || $item->meeting_status==='live')
                                            <a href="/ongoinglivelearn/{{$item->meeting_name}}" target="_blank" class="join-session-btn live text-center">Join</a>
                                        @elseif($attend->pay_status==='paid' || $item->meeting_status==='ended')
                                            <a href="#" class="join-session-btn live ended">Ended</a>
                                        @endif
                                     @endforeach
  
                                     
                                     @if(count($item->attendee)===0)
                                     <a href="/registerlivelearn/{{base64_encode($item->id)}}" class="new-discussion-btn d-block danger text-center">Register</a>
                                     @endif
                                    </td>     
                                 </tr>
                             
                            @endforeach
                           
                           </tbody>
                       </table>
                  </div>
                

             </div>
        </div>
  </div>



</div>
