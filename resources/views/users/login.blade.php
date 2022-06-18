@extends('layouts.frontend-master')
@section('page-title', 'Login')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page outer-bottom-vs">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>
                    @if(session('msg'))
                        <h4 class="alert alert-danger">{{session('msg')}}</h4>
                    @endif
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('user.login.submit') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            @error('email')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="email" name="email" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror "  id="exampleInputEmail1">
                       
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            @error('password')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror"  name="password" id="exampleInputPassword1">
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <a href="{{ route('forget.password.show') }}" class="forgot-password pull-right">Forgot your Password?</a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-5 col-sm-5 col-md-offset-1 col-sm-offset-1  create-new-account">
                    <h4 class="checkout-subtitle">Create New Account</h4>
                    <p class="text title-tag-line">Don't have an account?</p>
                    
                    <div class="inner-10 outer-top-small">
                        <i class="icon fa fa-user fa-avatar text-center"></i>
                    </div>
                    <div class="inner-vs">
                        <a class="text-center btn btn-block btn-primary btn-upper inner-15" href="{{ route('user.register.show') }}">Create Now</a>
                    </div> 

                </div>
                <!-- create a new account -->            
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content --> 
@endsection