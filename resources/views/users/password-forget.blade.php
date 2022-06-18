@extends('layouts.frontend-master')
@section('page-title', 'forget-password')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Forget Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container-md">
        <div class="forget-pass-page outer-bottom-vs">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-offset-3 col-md-6 col-sm-6 sign-in col-shadow-md">
                    <h4 class="">Forgot Password</h4>
                    <p class="">Please enter your valid email address</p>
                    
                    @if(session('msg'))
                        <h4 class="alert alert-success ">{{session('msg')}}</h4>
                    @endif
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('forget.password.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            @error('email')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="email" name="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="exampleInputEmail1">
                       
                        </div>
                                             
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Password Reset Link</button>
                    </form>
                </div>
                <!-- Sign-in -->         
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->       
    </div><!-- /.container -->
</div><!-- /.body-content --> 
@endsection