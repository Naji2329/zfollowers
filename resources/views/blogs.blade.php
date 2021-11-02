@extends('layouts.master')

@section('content')

    <!-- Pages Banner Area -->
    <section class="pages_banner_area">
        <div class="style_dots"></div>
        <div class="container">
            <p> We love what we do and we’re good at it. Let us prove it to you. </p>
        </div>
        <div class="style_dots_2"></div>
    </section>
    <div class="pages_tittle">
        <h3>Blog List</h3>
    </div>
    <!-- End Pages Banner Area -->  
    
    <!-- Blog Area -->  
    <section class="blog_area"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-9 blog_leftsidebar">
                    @foreach (blog(5) as $blog)
                        
                    
                    <!-- Blog List -->
                    <div class="blog_list"> 
                        <a href="/blog/{{$blog->slug}}"><img src="/uploads/{{$blog->image}}" alt=""></a>
                        <a class="heding" href="/blog/{{$blog->slug}}">{{$blog->title}}</a>
                        <ul class="blog_info">         
                            <li><a href="#"><i class="far fa-clock"></i> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('Y-m-d') }}</a></li> 
                        </ul>
                        <p>{{ Str::limit($blog->content, $limit = 150, $end = '...') }} </p>
                        <a href="/blog/{{$blog->slug}}" class="red_more">Read More</a>
                    </div>  
                   @endforeach
                    <div class="text-center">
                        {!! blog(5)->render() !!}
                    </div> 
                </div>
                
                <!-- Right Sidebar -->
                <div class="blog_rightsidebar col-lg-3"> 
                    
                   
                    <div class="categories post_widget">
                        <h3>Latest Post</h3> 
                        @foreach (blog(6) as $lblog)
                        <div class="media">
                            <a href="/blog/{{$lblog->slug}}"><img src="/uploads/{{$lblog->image}}" alt=""></a> 
                            <div class="media-body">
                                <a href="/blog/{{$lblog->slug}}">{{$lblog->title}} </a>
                                <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lblog->created_at)->format('Y-m-d')}}</span>
                            </div>
                        </div>  
                        @endforeach
                       
                    </div> 
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->  


@endsection
