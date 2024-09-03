<div>
    <main>
        <div class="breadcrumb">
            <h3 class="breadcrumb-title">Blogs</h3>
        </div>

        <div class="container">
             <section id="blog">
                <div class="row mt-5">

                    @foreach ($AllblogPost as $item)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="blog-card">
                                    <div class="img">
                                        <img src="{{$item->blog_photo}}" alt="blog image">
                                    </div>
                                    <h3 class="blog-title">{{$item->blog_title}}</h3>
                                    <div class="my-3 d-flex align-items-center justify-content-between">
                                        <div class="date d-flex align-items-center justify-content-start gap-3">
                                            <img src="{{asset('main-asset/asset/img/clock.png')}}" alt="clock icon">
                                            <span>{{Carbon\Carbon::parse($item->created_at)->format('d F Y i A')}}</span>
                                        </div>
                                        <div class="date d-flex align-items-center justify-content-start gap-3">
                                            <img src="{{asset('main-asset/asset/img/user.png')}}" alt="user icon">
                                            <span>{{ucwords($item->author_name)}}</span>
                                        </div>
                                    </div>
                                    <a href="/blogpost/{{base64_encode($item->id)}}/{{Str::slug($item->blog_title)}}" class="custom-btn btn-primary white-color">Read more</a>
                                </div>
                        </div>
                  
                    @endforeach
                 
                </div>
                <div class="mt-5 pagination">
                    <p>{{$allblogs->links()}}</p>
                </div>
             </section>
        </div>
   </main>
</div>
