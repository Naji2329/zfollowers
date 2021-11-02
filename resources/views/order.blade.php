<?php $nonavbar=''; ?>
@extends('layouts.master')
@push('css')
    <style>
        .main_header_area{padding: 20px 0;}
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
            <div class="prog1"></div>
            <div class="prog2"></div>
        </div>



   <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <enter-details :service="{{$service}}" :related_services="{{related_services($service->parent_id,$service->cat_id)}}"></enter-details>
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
                    <a href="#" class="member_name">Alex Jhonson</a>
                    
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
