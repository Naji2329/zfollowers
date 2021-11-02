@extends('layouts.master')

@section('content')

    <!-- Banner Area -->
    <section class="banner_area">
        <img src="/assets/images/banner-shap-1.png" alt="" class="shap_1">
        <img src="/assets/images/banner-shap-2.png" alt="" class="shap_2">
        <img src="/assets/images/favicon.png" alt="" class="shap_3">
        <img src="/assets/images/banner-shap-3.png" alt="" class="shap_4">
        <div class="container">
            <div class="banner_caption">
                <h2 class="wow fadeInUp">Welcome To ZFollowers </h2>
                <p style="font-size: 21px;" class="wow fadeInUp" data-wow-delay="0.3s">{{settings()->welcome_message}}
                   
                </p>
                <p style="padding-bottom:100px;color: #333;" class="wow fadeInUp" data-wow-delay="0.3s">
                   Services starting at only $0.30 
                </p>

                <a href="{{route('login')}}" class="theme_btn wow fadeInUp" data-wow-delay="0.5s">Sign In</a>
                {{-- <a href="services.html" class="health_btn wow fadeInUp" data-wow-delay="0.5s">Improve Acoount Rich</a> --}}
            </div>
            <div class="carousel slide banner_slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/assets/images/banner-1.jpg" alt="">
                    </div>
                   
                </div>
            </div>

        </div>
    </section>
    <script data-ad-client="ca-pub-4636984899912191" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- End Banner Area -->



    <!-- Our services Area -->
    <section class="services_area">
        <img src="/assets/images/services-shap.png" alt="" class="services_shap">
        <div class="container">
            <img src="/assets/images/services.png" alt="" class="tittle_img">
            <div class="row services_inner">
                <img src="/assets/images/services-bg.png" alt="" class="services_bg">
                <div class="col-lg-6">
                    <div class="media">
                        <div class="icons"><i class="fa fa-instagram"></i> </div>
                        <div class="media-body">
                            <a href="/services/instagram"> Instagram </a>
                            <p>Get real and high-quality followers to boost your Instagram page and make it more appealing. Become
an insta-celebrity with our IG likes & comments packages and enjoy the instant fame with increased IG
video views.
</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="media media_2">
                        <div class="icons i_2"> <img src="/assets/images/clubhouse.png" class="icon"> </div>
                        <div class="media-body">
                            <a href="/services/clubhouse">clubhouse</a>
                            <p>make yourself visible in clubhouse, We offer a variety of different packages to give you the
                                best value for
                                clubhouse followers & room visitors.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="media media_3">
                        <div class="icons i_3"><i class="fa fa-facebook-f"></i></div>
                        <div class="media-body">
                            <a href="/services/facebook">Facebook</a>
                            <p>Whether you’re promoting a business or a personal page, you can instantly increase your
                                page’s
                                followers and likes with our Facebook packages. The higher the number, the more influential
                                you can
                                become!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="media">
                        <div class="icons"><i class="fa fa-youtube"></i> </div>
                        <div class="media-body">
                            <a href="/services/youtube"> Youtube </a>
                            <p>Take your videos and vlogs to the next level! Get more likes, subscribers, and video views in
                                no time.
                                Our YouTube packages can help you monetize your account and make you the next vlog
                                celebrity!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="media media_2">
                        <div class="icons i_2"><img src="/assets/images/tiktok.png" class="icon"></div>
                        <div class="media-body">
                            <a href="/services/tiktok">TikTok</a>
                            <p>Become the next big TikTok Star! Jump-start your career with high quality audience engagement
                                at your
                                finger tip. Get more views, likes and followers! We can give you the attention you deserve
                                within minutes!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="media media_3">
                        <div class="icons i_3"><i class="fa fa-spotify"></i></div>
                        <div class="media-body">
                            <a href="/services/spotify">Spotify</a>
                            <p>get the jumpstart that you need to generate a buzz around your name, your profile, and your
                                tracks. Avail
                                of any of our several packages offering a certain number of followers and track plays that
                                will get you
                                enough engagement to catch the attention of playlist editors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our services Area -->


    <!-- Portfolio grid Area -->
    <section class="portfolio_grid pg_2">
        <div class="container" >
            <div class="text-center insta-head"> <i class="fa fa-instagram"></i> High Quality Instagram Services </div>
            <ul class="protfoli_filter">
                @foreach (parents_with_cats()[0]->cats as $index => $cat)
                    <li class="{{ $index == 0 ? 'active' : '' }}" data-filter=".{{ $cat->slug }}"><a
                            href="#">{{ $cat->name }}</a></li>
                @endforeach

            </ul>
            <div class="text-center mt-5"> {{parents_with_cats()[0]->text}} </div>
            <div class="row portfoli_inner">
                @foreach (parents_with_cats()[0]->cats as $key => $cat)
                <div class="owl-carousel testimonial_slide pricing_plan_area  {{$cat->slug}} {{$key!=0?'hidden owl-hidden':''}}">
                    @foreach(cat_services($cat->id) as $service)
                    <div class="item ">
                        <div class="plan">
                            @if($service->discount != null)
                            <div class="discount-area"> 
                                {{$service->discount}} % off now    
                            </div>
                            @endif
                            <h4 class="plan-price">
                                <a href="#" class="singlePkgBtn" data-id="MTI=" title="Buy Now">
                                    $ {{discount_price($service->price,$service->discount)}}</a>
                            </h4>
                            <h2> {{number_format($service->quantity)}} </h2>
                            <h4>{{$service->title}}</h4>
                            @if($service->discount != null)
                            <div class="save text-center"> 
                              <span>  <del> {{$service->price}} $ </del> </span>
                                <span class="price"> {{discount_price($service->price,$service->discount)}} $</span>
                                <span> save {{$service->price -discount_price($service->price,$service->discount) }} $</span>   
                            </div>
                            @else 
                            <div class="save text-center"> 
                                <span class="price"> {{discount_price($service->price,$service->discount)}} $</span>
                            </div>
                            @endif

                            <ul style="margin-top:10px">
                                {!! desc_filter($service->desc) !!}

                            </ul>
                            <a class="buy" href="/order/{{$service->slug}}/{{$service->id}}">Buy Now</a>
                        </div>

                    </div>
                    @endforeach
                </div>
                @endforeach
                
            </div>
             <div class="text-center page-content mb-5"> {!!parents_with_cats()[0]->content!!}  </div>
            
        </div>
    </section>
    <!-- End Portfolio grid Area -->

    <section class="how_it_work_area hiwa_2" style="margin-bottom: 0;">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 google_analytics">
                    <div class="analytics">
                        <span><i class="fa fa-free-code-camp"></i></span>
                        <h6>FREE REFILL</h6>
                        <p> We try our best to ensure your bought followers never drop.
                            But in case of followers are dropping you can <a href="/contact"> contact us </a> . We have
                            replenishment policy if your followers drop we will refill
                            them without any hesitation </p>
                    </div>
                    <div class="analytics">
                        <span class="no_2"><i class="fa fa-question-circle "></i></span>

                        <h6>24-HOUR SUPPORT</h6>
                        <p> Our dedicated support staff is always available.
                            If you have any questions about our services or
                            experience any problems with your order, please
                            don't hesitate to <a href="/contact"> contact us </a> .
                           </p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <h2>Why ZFollowers</h2>
                    <p>We are a passionate company. The team works tirelessly to make sure that we meet your standards in social media advertising.  There has been some controversy surrounding buying followers, likes, comments and shares in the past. Reliable followers are used to make sure that your social media profile is boosted. This company covers most social media platforms including:

                 <ul style="margin-bottom:10px">
                        <li> <a class="service" href="services/youtube"> Youtube </a>-
                            <a class="service" href="services/facebook"> Facebook</a>-
                            <a class="service" href="services/instagram"> Instagram -</a>
                            <a class="service" href="services/tiktok"> Tiktok </a>-
                            <a class="service" href="services/clubhouse"> Clubhouse </a> - 
                            <a class="service" href="services/spotify">Spotify </a> </li>     
                    </ul> 
                   
                    More information on specific services and pricing is available on our page. If you have any questions on how we work, or to discuss how we can help you gain followers just drop us an email anytime, and we will get back to you
                </p>
                    
                </div>
                <div class="col-lg-4 google_analytics">
                    <div class="analytics">
                        <span><i class="fa fa-fighter-jet "></i></span>
                        <h6><b>INSTANT DELIVERY</h6>
                        <p>We provide you with the fastest services in the market.
                            At ZFollowers, you will receive all of your Likes
                            and Followers within an hour after completing your order.</p>

                    </div>
                    <div class="analytics">
                        <span class="no_2"><i class="fa fa-retweet"></i></span>
                        <h6><b>100% GUARANTEED</h6>
                        <p> We want to leave a lasting impression on our clients
                            If you aren't satisfied with the quality or delivery
                            of your order, <a href="/contact"> contact us </a> . We'll refund any
                            order that isn't fulfilled.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How it work Area -->
    {{-- <section class="how_it_work_area" style="background: #f4f4f4;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>THE ALL-IN-ONE SOCIAL MEDIA SERVICES YOU WILL NEED</h2>
                    <p>ZFollowers.com is simply the fastest, cheapest & BIGGEST market for social media services.
                    </p>


                    <a style="background-image: linear-gradient(to right, #c8aef4, #dfb6f5, #ebb1ed, #f5ade3, #fea9d8);"
                        href="register.html" class="theme_btn wow">
                        Sign up</a>
                </div>
                <div class="col-lg-4">
                    <div class="video_aea">
                        <h4>Want to see how it all works?</h4>
                        <a class="popup-youtube" href="https://player.vimeo.com/video/142874198">
                            <i class="flaticon-arrows"></i>
                        </a>
                        <h6>Watch this quick demo </h6>
                    </div>
                </div>
            </div>
            <img src="/assets/images/angle-shap.png" alt="" class="angle_shap">
        </div>
    </section> --}}
    <!-- End How it work Area -->



    <!-- Blog and News Area -->
    @include('layouts.blog')
    <!-- End Blog and News Area -->

@endsection
