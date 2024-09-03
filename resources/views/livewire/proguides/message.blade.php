<div>
    
    <div class="main-content">
        <div class="message-container">
             <div class="message-sidebar">
                  <div class="message-sidebar-header">
                       <div class="top">
                            <h5>Messages</h5>
                            <img src="{{asset('proguide-asset/asset/img/sort.png')}}" alt="icon">
                       </div>
                       <div class="input-group">
                            <img src="{{asset('proguide-asset/asset/img/message-search-icon.png')}}" alt="icon">
                            <input type="text" name="keyword" placeholder="Search">
                      </div>
                  </div>
                  <div class="message-sidebar-body">
                    @foreach ($studentsMessagesChain as $item)
                         <a href="/proguide/messages/{{base64_encode($item->student_id)}}">
                         <div class="contact active">
                              <div class="d-flex align-items-center justify-content-start gap-2">
                                   <div class="img">
                                        @if(empty($userDetails->profile_image))
                                           <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                                        @else
                                           <img src="{{$userDetails->profile_image}}" alt="">
                                        @endif
                                   </div>
                                   <h6>{{$item->student->full_name}}</h6>
                              </div>
                              {{-- <span class="unseen-count">4</span> --}}
                         </div>
                         </a>
                    @endforeach
                      
                  </div>
             </div>
             <div class="message-main">
                @if(isset($userDetails))
                  <div class="message-main-header">
                       <div class="d-flex align-items-center justify-content-start gap-3">
                            <div class="hide-main"><i class="fa fa-arrow-left"></i></div>
                            <div class="img">
                                 @if(empty($userDetails->profile_image))
                                   <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                                  @else
                                    <img src="{{$userDetails->profile_image}}" alt="">
                                  @endif
                              </div>
                            <h6>{{ucwords($userDetails->full_name)}} </h6>
                       </div>
                       <div class="d-flex align-items-center justify-content-end gap-3">
                            <img src="{{asset('proguide-asset/asset/img/message-search-icon.png')}}" id="drop-message-search-ctn" data-icon="icon" alt="icon">
                            <img src="{{asset('proguide-asset/asset/img/ellipsis-v-icon.png')}}" height="20px" data-icon="icon" alt="icon">
                       </div>
                       <div class="message-search-ctn">
                            <div class="search-word-ctn" id="message-word-search" style="display: none;">
                                 <img src="{{asset('proguide-asset/asset/img/message-search-icon.png')}}" alt="icon">
                                 <input type="text" name="query"  placeholder="Search">
                                 <div class="controls" style="display:none;">
                                      <span class="search-up" id="prev-highlight"><i class="fa fa-chevron-up"></i></span>
                                      <span class="search-down" id="next-highlight"><i class="fa fa-chevron-down"></i></span>
                                      <small id="search-count"></small>
                                 </div>
                            </div>
                       </div>
                  </div>
                  
                  <div class="message-main-body" id="message-main-body" wire:poll.2s="ShowMessages()">
                    @if(isset($ChatsMessage))
                     @foreach($ChatsMessage as $chats)
                      @if(isset($chats->files))
                       <div class="{{ $chats->sender_id == auth()->guard('web')->user()->id ? 'sent-ctn' : 'received-ctn' }}" >
                            <div class="{{ $chats->sender_id == auth()->guard('web')->user()->id ? 'sent' : 'received' }}">
                                 <!--hanlde the file--> 
                                 @if(in_array($chats->file_type, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                   <img src="{{$chats->files}}" alt="icon" class="img-fluid" style="width:100%;height:150px">
                                 @else
                                  <a href="{{$chats->files}}" download target="_blank">
                                     <p>
                                        <i class="fas fa-file"></i>&nbsp;Document.{{$chats->file_type}}
                                        <br>
                                        {{round($chats->file_size/(1024 * 1024), 2)}}MB <i class="fa fa-download"></i>

                                     </p>
                                  </a>
                                  @endif
                                 <div class="d-flex align-items-center justify-content-end gap-1">
                                      <small>{{Carbon\Carbon::parse($chats->created_at)->format('d F Y g:ia')}}&nbsp;({{$chats->created_at->diffForHumans()}})</small>
                                      <img src="{{asset('proguide-asset/asset/img/message-seen-icon.png')}}" alt="icon">
                                 </div>
                            </div>
                       </div>
                       @else
                         <div class="{{ $chats->sender_id == auth()->guard('web')->user()->id ? 'sent-ctn' : 'received-ctn' }}" >
                              <div class="{{ $chats->sender_id == auth()->guard('web')->user()->id ? 'sent' : 'received' }}">
                                   <p>
                                        {{$chats->message}}
                                   </p>
                                   <div class="d-flex align-items-center justify-content-end gap-1">
                                        <small>{{Carbon\Carbon::parse($chats->created_at)->format('d F Y g:ia')}}&nbsp;({{$chats->created_at->diffForHumans()}})</small>
                                        <img src="{{asset('proguide-asset/asset/img/message-seen-icon.png')}}" alt="icon">
                                   </div>
                              </div>
                         </div>
                        @endif
                       @endforeach
                    @endif
                 </div>
                  
                  <div class="message-main-footer">
                    <form wire:submit.prevent="sendMessage" action="" id="chat-form">
                         <div class="input-group">
                              <img class="d-none" src="{{asset('proguide-asset/asset/img/happyemoji.png')}}" data-icon="emoji" alt="icon">
                              <label for="attachment">
                                   <img src="{{asset('proguide-asset/asset/img/message-attachment-icon.png')}}" data-icon="attachment" alt="icon">
                                   <input type="file" id="attachment" class="d-none" wire:model="file">
                              </label>
                              <input type="hidden" wire:model="receiver_id">
                              <input type="text" id="chat-input-message" wire:model="message" placeholder="Type a message">
                             <button id="sendChatBtn"><i class="fas fa-paper-plane"></i></button>
                         </div>
                    </form>
               </div>
               @else
                <!--No message templete-->
                <div class="message-main-body">
                    <h4 class="text-center text-muted"><img src="{{asset('proguide-asset/asset/img/note-2.png')}}" alt="">&nbsp;No Message Loaded</h4>     
                </div>
               @endif
             </div>
        </div>
      </div>

</div>

<script>
     document.addEventListener('DOMContentLoaded', function () {
          function scrollToBottom() {
             var messageBody = document.getElementById('message-main-body');
             messageBody.scrollTop = messageBody.scrollHeight;
         }
 
         Livewire.hook('message.sent', (message, component) => {
                    console.log('Livewire request sent.');
               });

               Livewire.hook('message.received', (message, component) => {
                    console.log('Livewire request received.');
               });

               Livewire.hook('message.failed', (message, component) => {
                    console.log('Livewire request failed.');
               });

               Livewire.hook('message.processed', (message, component) => {
                    scrollToBottom();
                    console.log('Livewire request processed.');
               });
 
         scrollToBottom(); 
     });
 </script>
