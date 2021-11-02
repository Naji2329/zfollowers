@extends('layouts.master')
@push('css')
    
@endpush
@section('content')


<div class="orders-area">

    <div class="container">
        <h3 class="title"> Orders History ( {{$status==''?'prgress':$status}} ) </h3>
        @if(user_orders($status) == '[]')
        <div class="row portfoli_inner text-center">
            <div class="alert alert-danger"  style="    width: 100%;"> No Orders Here </div>
        </div>
        @else 
        
        <div class="row portfoli_inner pricing_plan_area">
            @foreach (user_orders($status) as $order)
            <div class="col-sm-6 col-md-4">
                <div class="plan">
                    <h4 class="plan-price">
                        <a href="#" class="singlePkgBtn" data-id="MTI=" title="Buy Now">
                            $ {{$order->service->price}}</a>
                    </h4>
                    <h2> {{$order->service->quantity}} </h2>
                    <h4>{{$order->service->title}}</h4>
                    <ul style="margin-top:10px">
                        {!! desc_filter($order->service->desc) !!}

                    </ul>
                    @if($status==null || $status=='progress')
                    <a class="buy status-button bg1 " href="#!" >{{$order->status}}</a>
                    @endif
                    @if( $status=='completed')
                    <a class="buy status-button bg2 " href="#!" >{{$order->status}}</a>
                    @endif
                    @if( $status=='canceled')
                    <a class="buy status-button bg3 " href="#!" >{{$order->status}}</a>
                    @endif
                    <a class="buy" href="/order/{{$order->service->slug}}/{{$order->service->id}}">Buy Again</a>
                </div>
            </div>
             @endforeach
        </div>
        @endif
    </div>

</div>

@endsection
@push('js')

@endpush
