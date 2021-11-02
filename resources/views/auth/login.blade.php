<?php $nofoot=''; ?>
<?php $nonavbar=''; ?>
@extends('layouts.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/register.css">
@endpush
@section('content')

    <!--======================================
        START LOGIN AREA
======================================-->

<div class="form-body">
        <div class="website-logo">
            <a href="{{url('/')}}">
                <div class="logo">
                    <img class="logo-size" src="/assets/images/logo.png" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Welcome To Zfollowers.</h3>
                    <p> {{settings()->welcome_message}} </p>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="page-links">
                            <a href="{{route('login')}}" class="active">Login</a><a href="{{route('register')}}">Register</a>
                        </div>
                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <input class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}" type="email" name="email"  placeholder="E-mail Address" required>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"  placeholder="Password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="custom-control custom-checkbox fs-14">
                                <input type="checkbox" name="remember" class="custom-control-input" id="rememberMe">
                                <label class="custom-control-label custom--control-label" for="rememberMe">Remember me</label>
                                </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> 
                               @if (Route::has('password.request'))
                                <a href="{{route('password.request')}}">Forget password?</a>
                                @endif
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="/login/facebook"><i class="fa fa-facebook-f"></i></a><a href="/login/google"><i class="fa fa-google"></i></a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

















<!--======================================
        END LOGIN AREA
======================================-->

@endsection

@push('js')
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
@endpush