@extends('layouts.frontend-master')
@section('page-title', 'reset-passwoed')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Reset Password</li>
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
                    <h4 class="">Reset Password</h4>
                    <p class="">Please enter new password</p>
                    
                    @if(session('msg'))
                        <h4 class="alert alert-success ">{{session('msg')}}</h4>
                    @endif

                    <form class="register-form outer-top-xs" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            @error('password')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="password" name="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" id="exampleInputEmail1">
                       </div>

                       <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                            @error('password_confirmation')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input @error('password_confirmation') is-invalid @enderror" id="exampleInputEmail1">
                        </div>
                                             
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Save New Password</button>
                    </form>
                </div>
                <!-- Sign-in -->         
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->       
    </div><!-- /.container -->
</div><!-- /.body-content --> 
@endsection