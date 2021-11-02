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
    <!-- Pages Tittle Area -->
    <div class="pages_tittle">
        <h3> Contact Us </h3>
    </div>
    <!-- End Pages Banner Area -->

    <!-- Contact Us Area -->  
    <section class="contact_area">
        <div class="container">
            <div class="contact_inner">
                <div class="row"> 
                    
                    <div class="col-md-8">
                        <div class="text-center" style="width:100%">
                        <ul class="quick_find" style="width:100%">
                            <li>Quick Find Us </li>
                            <li>Email: <a href="#"><span class="__cf_email__" data-cfemail="">{{settings()->email}}</span></a></li>
                            <li>Phone <span>{{settings()->phone}}</span></li>
                            <li>Address <span>{{settings()->address}}</span></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
    </section>
    <!-- Contact Us Area -->  

@endsection
