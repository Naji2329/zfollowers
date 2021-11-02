@extends('layouts.master')
@push('css')
    <style>
        .main_header_area{padding: 20px 0;}
    </style>
@endpush
@section('content')


 <div class="content" style="background:#fafafa">
        <div class="sub-header text-center">
            <h1>Buy {{$parent->name}} Services</h1>
            <p>Brand Exposure<span>on {{$parent->name}}</span></p>
        </div>

    <!-- Portfolio grid Area -->
    <section class="portfolio_grid pg_2">
        <div class="container">
            <ul class="protfoli_filter">
                @foreach (parent_with_cats($parent->id)->cats as $index => $cat)
                    <li class="{{ $index == 0 ? 'active' : '' }}" data-filter=".{{ $cat->slug }}"><a
                            href="#">{{ $cat->name }}</a></li>
                @endforeach

            </ul>
            <div class="text-center mt-5"> {{parent_with_cats($parent->id)->text}} </div>
            <div class="row portfoli_inner">
                @foreach (parent_with_cats($parent->id)->cats as $key => $cat)
                @if(cat_services($cat->id)!=[])
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
                                <span> save {{$service->price -discount_price($service->price,$service->discount) }} $ </span>   
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
                @else 
                <div class="text-center no-services"> 
                    <p> No Services Here ! </p>    
                </div>
                @endif
                @endforeach

            </div>
            <div class="text-center page-content mb-5"> {!!parent_with_cats($parent->id)->content!!}  </div>
        </div>
    </section>
    <!-- End Portfolio grid Area -->

 </div>

    <!-- Blog and News Area -->
    @include('layouts.blog')
    <!-- End Blog and News Area -->

@endsection
