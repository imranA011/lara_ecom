<section class="section latest-blog outer-bottom-vs wow fadeInUp">
    <h3 class="section-title">latest form blog</h3>
    <div class="blog-slider-container outer-top-xs">
        <div class="owl-carousel blog-slider custom-carousel">

        @foreach ($posts as $post)
            <div class="item">
                <div class="blog-post">
                    <div class="blog-post-image">
                        <div class="image"> <a href="blog.html">
                            <img src="{{asset('uploads/posts/'.$post->post_thumbnail)}}" alt=""></a> </div>
                    </div>
                    <div class="blog-post-info text-left">
                        <h3 class="name">
                            <a href="#">{{$post->post_title}}</a>
                        </h3>
                        <span class="info">By {{ $post->post_author }} &nbsp;|&nbsp; {{ Carbon\Carbon::parse($post->post_date)->format('Y-m-d') }} |&nbsp; {{ $post->category->category_name }}</span>
                        <p class="text">{!! $post->post_description !!}</p>
                        <a href="#" class="lnk btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
