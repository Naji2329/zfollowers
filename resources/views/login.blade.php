<?php $nonavbar = ''; ?>
@extends('layouts.master')
@push('css')
    <style>
        .main_header_area {
            padding: 20px 0;
        }

    </style>
@endpush
@section('content')

    <div class="header2">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="back">
                            <a href="javascript:history.back()"> 
                            <i class="fa fa-chevron-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <a href="{{url('/')}}"><img class="main-logo" src="/uploads/{{settings()->logo}}" style="height: 70px;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="prog1" style="background: #ff6096;"></div>
            <div class="prog2" style="background: #ff6096;"></div>
            <div class="prog1"></div>
            <div class="prog2"></div>
        </div>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card box card-default">
                            <div class="card-body"> 
                             <h1 class="text-center bold"> Log in 
                                <p> Don’t have an account? <a href="{{route('register')}}" style="color: #ff6096;"> Sign Up Now  </a> </p>
                            </h1>
                            <form method="post" action="" class="buy-form">
                                @csrf
                                <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> @ </span>
                                <input type="text" name="email" class="form-control" placeholder="Your Email" aria-label="email" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-instagram"></i> </span>
                                <input type="password" name="password" class="form-control" placeholder="Your Password" aria-label="password" aria-describedby="basic-addon1">
                                </div>
                                @if(session()->has('error'))
                                <div class="alert alert-danger text-center"> {{session('error')}} </div>
                                @endif
                                <div class="input-group mb-3">
                                    <button  class="btn btn-block theme_btn "> Log in & Continue </button>
                                </div>
                            </form>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                                 <a href="/checkout/order" class="gust-link">Checkout As A Guest </a> 
                                </div>
                    </div>
                    <div class="col-md-5">
                        <div class="team_area">
                        <div class="team_inner row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="col-md-5">
                    <div class="team_img">
                        <img src="/assets/images/team-3.jpg" alt="">
                    </div>
                </div> 
                <div class="col-md-7 team_contant">
                    <a href="#" class="member_name">  Jack Johnson </a>
                    
                    <p>It's great! I have been using the service for the last few months and I am loving the results. My followers have increased and I have been noticing organic growth on my profiles as well. Amazing!!!</p>
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        
                    </ul> 
                    <!-- TrustBox widget - Micro Review Count -->
<div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="6106cb5870f31e001d28bea2" data-style-height="24px" data-style-width="100%" data-theme="light">
  <a href="https://www.trustpilot.com/review/zfollowers.com" target="_blank" rel="noopener">Trustpilot</a>
</div>
<!-- End TrustBox widget -->  
                </div> 
            </div>
            </div>
                    </div>
                </div>
            </div>
        </div>




@endsection
