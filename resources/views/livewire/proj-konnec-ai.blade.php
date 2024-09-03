<div>
    <div class="main-content">
        <div class="ai-ctn">
            <div class="ai-sidebar">
                 <div class="card ai-card">
                      <div class="ai-sidebar-close">
                           <i class="fa fa-times"></i>
                      </div>
                      <div class="ai-card-header">
                           <button wire:click="NewChat" class="ai-btn new-chat-btn"><img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt=""> New Chat</button>
                           <h6 class="mt-4">Recent chats</h6>  
                      </div>
                      <ul class="ai-chats">
                         @foreach($chatChains as $chains)
                         @php
                           #Determine if the current segment matches the chat_url
                           $isActive = Request::segment(2) == $chains->chat_url;
                         @endphp
                         <a href="/student-ai/{{ $chains->chat_url }}">
                             <li class="ai-chat {{ $isActive ? 'active' : '' }}">{{ $chains->message }}</li>
                         </a>
                     @endforeach
                     
                      </ul>
                 </div>
            </div>
            <div class="ai-main">
                 <div class="card ai-card">
                      <div class="header-bar">
                           <div class="menu" id="header-menu-icon"></div>                                                
                           <button  class="new-chat-btn"><img src="{{asset('student-asset/asset/img/plus_icon.png')}}" alt=""></button>
                      </div>
                      <div class="ai-main-main">
                           <div class="ai-chat-content">
                              @if(Request::segment(2))
                                 @foreach($chats as $chat)
                                   <div class="ai-chat-ctn">
                                        <div class="img">
                                             @if($chat->chat_user=="ai")
                                              <img src="{{asset('student-asset/asset/img/ai-logo-colored.png')}}" alt="">
                                             @else
                                              <img src="{{auth()->guard('web')->user()->profile_image}}" alt="">
                                             @endif
                                        </div>
                                        <div class="chat-content">
                                             <p class="mb-0">
                                                {!! $chat->message !!}
                                             </p>
                                        </div>
                                    </div>
                                   @endforeach
                                @endif
                                {{-- <div class="ai-chat-ctn">
                                     <div class="img">
                                          <img src="{{asset('student-asset/asset/img/ai-logo-colored.png')}}" alt="">
                                     </div>
                                     <div class="chat-content">
                                        @if(isset($generatedContent))
                                           @foreach($generatedContent as $candidate)
                                             @foreach($candidate['candidates'] as $content)
                                                 @foreach($content['content']['parts'] as $part)
                                                  <p class="mb-0"> {{ $part['text'] }} </p>
                                                     
                                                    @endforeach
                                                  @endforeach
                                             @endforeach
                                       
                                        @else
                                             <p class="mb-0">No response available.</p>
                                         @endif

                                         
                                          
                                     </div>
                                </div> --}}
                           </div>
                           <div class="ai-card-footer">
                            <div class="form">
                                 <form class="ai-form" wire:submit.prevent="generateContent">
                                      <div class="group-input">
                                           <input type="text" required wire:model="textReqeust" placeholder="Write your query here...">
                                           <button type="submit" class="group-input-btn">
                                             <span wire:loading.remove>Ask AI</span>
                                                  <!-- Loading indicator -->
                                             <div wire:loading wire:target="generateContent" class="loading-indicator">
                                                  <i class="fa fa-spin fa-spinner"></i>&nbsp;Asking...
                                             </div>
                                         </button>
                                      </div>
                                 </form>
                            </div>
                           </div>
                      </div>
                 </div>
            </div>
        </div>
      </div>

</div>
