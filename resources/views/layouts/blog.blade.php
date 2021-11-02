<!-- Blog and News Area -->
    <section class="latest_post_area" style="margin-top: 50px">
        <div class="row latest_post_inner">
            <div class="col-xl-4 post_tittle">
                <h2>Our Blog List Latest Post</h2>
                <p>Stay in touch with the latest topics of Zfollowers to know the latest news </p>
            </div>
            <div class="col-xl-8 p-0">
                <div class="owl-carousel blog_carousel">
                    @foreach (blog() as $blog)
                    <div class="item">
                        <div class="latest_news">
                            <a href="/blog/{{$blog->slug}}" class="blog_img"><img src="/uploads/{{$blog->image}}"
                                    alt=""></a>
                            <a href="/blog/{{$blog->slug}}" class="heding">{{$blog->title}}</a>
                            <h6>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('Y-m-d') }}</h6>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- End Blog and News Area -->