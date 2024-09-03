<div>
    <div class="main-content">
        <div class="row">
             <div class="col-12 mb-4">
                  <div class="text-end">
                       <button id="markAllBtn" wire:click="MarkRead"> <i class="fa fa-check-double"></i> &nbsp;Mark all as read</button>
                  </div>
             </div>
             <div class="col-12">
                  <div id="notification-container">
                     @foreach($notification as $notify)
                       <div class="notice-ctn">
                            <div class="d-flex align-items-center justify-content-start gap-2">
                                 <div class="img">
                                      <img src="{{asset('student-asset/asset/img/notification-icon.png')}}" class="img-fulid" alt="">
                                  </div>
                                  <div class="notice">
                                      <p class="mb-0 pb-0">
                                         {{$notify->notification}}
                                      </p>
                                  </div>
                            </div>
                            @if($notify->is_read==0)
                             <div class="resta"></div>
                            @endif
                       </div>
                       @endforeach
                       <p>{{$notification->links()}}</p>
                    </div>
             </div>
        </div>
  </div>

</div>
