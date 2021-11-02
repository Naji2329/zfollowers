@extends('layouts.master')

@section('content')

    <!-- Pages Banner Area -->
    <section class="pages_banner_area">
        <div class="style_dots"></div>
        <div class="container">
            <p> {{$blog->title}} </p>
        </div>
        <div class="style_dots_2"></div>
    </section>
    <div class="pages_tittle">
        <h3>Blog </h3>
    </div>
    <!-- End Pages Banner Area -->  
    
    <!-- Blog Area -->  
    <section class="blog_area"> 
        <div class="container">
            <div class="row">
                
                <div class="col-lg-9 blog_leftsidebar">
                    <!-- Blog List -->
                    <div class="blog_single">
                        <div class="blog_img">
                            <img src="/uploads/{{$blog->image}}" alt="">  
                           
                        </div>
                        <ul class="blog_info">   
                            
                            <li><a href="#!"><i class="far fa-clock"></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('Y-m-d')}}</a></li> 
                         
                        </ul>
                        <h2>{{$blog->title}}</h2>
                        <p> 
                            {!!  $blog->content !!}    
                        </p>
                        
                        
                      
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
                                <span>{{$lblog->created_at->diffForHumans()}}</span>
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
