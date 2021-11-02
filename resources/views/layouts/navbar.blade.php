  <!-- Header Area -->
    <header class="main_header_area"> 
       <div class="container"> 
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="{{url('/')}}"><img class="main-logo" src="/uploads/{{settings()->logo}}"  alt=""></a> 
                <!-- Small Divice Menu-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar_supported"  aria-label="Toggle navigation"> 
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button> 
                <div class="collapse navbar-collapse navbar_supported">
                    <ul class="navbar-nav"> 
                        @foreach (parents_with_cats() as $parent)
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle " href="/services/{{$parent->slug}}"  data-toggle="dropdown">{{$parent->name}}</a>
                            <ul class="dropdown-menu">
                                @foreach ($parent->cats as $cat)
                                <li><a href="/services/{{$parent->slug}}/{{$cat->slug}}" >{{$cat->name}}</a></li> 
                                @endforeach   
                            </ul>
                        </li> 
                        @endforeach
                        <li><a href="/faq">faq</a></li>
                        
                        <li><a href="/blogs">blogs</a></li> 
                        @guest   
                        <li><a href="{{route('login')}}" class="theme_btn">Sign in</a></li>  
                        @endguest
                        @auth
                        <li class="dropdown ">
                            <a href="{{route('home')}}" class="nav-link dropdown-toggle avatar" data-toggle="dropdown">
                        <img  src="/assets/images/comment-2.png"> {{user()->name}} </a>
                        <ul class="dropdown-menu user show">
                                <li><a href="/home/progress" >In Progress Orders</a></li> 
                                <li><a href="/home/completed" >Completed Orders</a></li> 
                                <li><a href="/home/canceled" >Canceled Orders</a></li> 

                                <li><a href="{{route('logout')}}"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >Logout <i class="fa fa-sign-out mt-3 pull-right"></i></a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li> 
                            </ul>
                        </li>         
                        @endauth
                      
                            
                    </ul>   
                </div>
            </nav>  
       </div> 
    </header>
    <!-- Header Area -->  