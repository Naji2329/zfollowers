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
                        <a href="{{ url('/') }}"><img class="main-logo" src="/uploads/{{ settings()->logo }}"
                                style="height: 70px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="progress">
        <div class="prog1" style="background: #ff6096;"></div>
        <div class="prog1" style="background: #ff6096;"></div>
        <div class="prog2"></div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card box card-default">
                        <div class="card-body">
                            <h1 class="text-center bold"> Checkout </h1>

                           

                            <div class="mt-3">
                                <div class="user mt-5 mb-5">
                                    <div class="likes">
                                        <i class="fa fa-heart-o"></i>
                                        <span> {{$service->quantity}} {{$service->title}} </span>
                                    </div>
                                    <div class="Change">
                                        <a href="/order/{{$service->slug}}/{{$service->id}}"> Change </a>
                                    </div>
                                    <div class="price pull-right">
                                        <span class=""> {{discount_price($service->price,$service->discount)}} $ </span>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="input-group mb-3">
                                <form method="post" action="/pay" style="width: 100%">
                                    @csrf
                                    <input type="hidden" name="value" value="{{$service->price}}" disabled>
                                    <input type="hidden" name="service_id" value="{{$service->id}}" disabled>
                                    <input type="hidden" name="service_id" value="10" disabled="disabled"> 
                                    <input type="hidden" name="amount" value="{{discount_price($service->price,$service->discount)}}">
                                    <input type="radio" id="radiopaypal" name="payment_mode" value="paypal" checked>
                                    <label for="radiopaypal" style="margin-right: 15px;">PayPal</label>
                                    <input type="radio" id="radiocc" name="payment_mode" value="ccdc">
                                    <label for="radiocc">Credit Card/ Debit Card</label>
                                    <div>
                                     <button  class="btn btn-block theme_btn wow animated"> Pay {{discount_price($service->price,$service->discount)}} USD</button>
                                    </div>
                            </form>
                            </div>


                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>




@endsection
