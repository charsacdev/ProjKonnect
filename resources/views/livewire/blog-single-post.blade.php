<div>
     
     <main>
         <div class="container">
              <section id="single-blog">
                 <div class="row mt-5">
                   <div class="col-12">
                        <div class="post-img">
                             <img src="{{$blogPost->blog_photo}}" alt="Post image">
                        </div>
                        <h3 class="post-title">{{$blogPost->blog_title}}</h3>
                        <div class="mb-5 mt-4 d-flex align-items-center justify-content-between">
                             <div class="date d-flex align-items-center justify-content-start gap-3">
                                  <img src="{{asset('main-asset/asset/img/clock.png')}}" alt="clock icon">
                                  <span>{{Carbon\Carbon::parse($blogPost->created_at)->format('d F Y i A')}}</span>
                             </div>
                             <div class="date d-flex align-items-center justify-content-start gap-3">
                                  <img src="{{asset('main-asset/asset/img/user.png')}}" alt="user icon">
                                  <span>{{ucwords($blogPost->author_name)}}</span>
                             </div>
                        </div>
                        
                        <div class="post-suv share-it flex-wrap d-flex align-items-center justify-content-center gap-5 mb-5">
                         <span>Share this article</span>
                         <div>
                             <a href="#" id="facebook-share" target="_blank"><img src="{{asset('main-asset/asset/img/social-facebook-icon.png')}}" alt="facebook icon"></a>
                             <a href="#" id="whatsapp-share" target="_blank"><img src="{{asset('main-asset/asset/img/whatsapp-icon.png')}}" alt="instagram icon"></a>
                             <a href="#" id="twitter-share" target="_blank"><img src="{{asset('main-asset/asset/img/social-twitter-icon.png')}}" alt="twitter icon"></a>
                             <a href="#" id="linkedin-share" target="_blank"><img src="{{asset('main-asset/asset/img/social-linkedin-icon.png')}}" alt="linkedin icon"></a>
                         </div>
                     </div>
                               
                        <div style="position: relative;height:auto">
                             
                             {!! $blogPost->blog_content !!}
                             @php
                               session()->put('blogPost', $blogPost);
                             @endphp
                        </div>
 
                        <div class="post-suv flex-wrap d-flex align-items-center justify-content-center gap-5">
                             <span>{{$ArtileReaction}}</span>
                             <div>
                                  <a href="javascript:void;" wire:click="Like({{$blogPost->id}})" class="ans">Yes</a>
                                  <a href="javascript:void;" wire:click="Dislike({{$blogPost->id}})" class="ans">No</a>
                             </div>
                        </div>
 
                   </div>
 
                   <div class="row mt-5">
                        <h4 class="rp">Related Posts</h4>
                        <div class="row mt-5">
                          @foreach ($RelatedblogPost as $items)
                              
                               <div class="col-lg-4 col-sm-6 mb-4">
                                    <a href="/blogpost/{{base64_encode($items->id)}}">
                                    <div class="blog-card">
                                         <div class="img">
                                              <img src="{{$items->blog_photo}}" alt="blog image">
                                         </div>
                                         <h3 class="blog-title text-muted">{{$items->blog_title}}</h3>
                                    </div>
                                   </a>
                               </div>
                          @endforeach
                           
                        </div>
                   </div>
              </section>
         </div>
    </main>
 </div>

 <script>
     // Capture the current URL
     var currentUrl = encodeURIComponent(window.location.href);
     var shareText = encodeURIComponent('Check out this article: ');
 
     // Set the shareable links
     document.getElementById('facebook-share').href = 'https://www.facebook.com/sharer/sharer.php?u=' + currentUrl;
     document.getElementById('twitter-share').href = 'https://twitter.com/intent/tweet?url=' + currentUrl;
     document.getElementById('linkedin-share').href = 'https://www.linkedin.com/shareArticle?url=' + currentUrl;
     document.getElementById('whatsapp-share').href = 'https://api.whatsapp.com/send?text=' + shareText + currentUrl;
 </script>
 