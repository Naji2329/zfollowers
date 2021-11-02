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
        <h3> Faq </h3>
    </div>
    <!-- End Pages Banner Area -->

    <!-- Faq Area -->
    <section class="faq_area">
        <div class="container">

            <div class="accordion" id="accordionExample">
                <div class="row">
                    @foreach (faq() as $key=>$faq)

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="{{$faq->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left accordion-title" type="button"
                                        data-toggle="collapse" data-target="#colapse{{$faq->id}}" aria-expanded="true"
                                        aria-controls="colapse{{$faq->id}}">
                                        {{$faq->question}} <i class="fa fa-plus pull-right"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="colapse{{$faq->id}}" class="collapse {{$key==0?'show':''}}" aria-labelledby="{{$faq->id}}"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$faq->answer}}
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Faq Area -->


@endsection
