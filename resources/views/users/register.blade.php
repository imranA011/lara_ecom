@extends('layouts.frontend-master')
@section('page-title', 'Register')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Register</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page outer-bottom-vs">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-5 col-sm-5 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Already have an account?</p>
                    
                   <div class="inner-vs">
                       <a class="text-center btn btn-block btn-primary btn-upper inner-15" href="{{ route('user.login.show') }}">Login Now</a>
                   </div>                                         
             
                    <h5 class="text-center">OR</h5>
                    <div class="social-sign-in  inner-vs">
                        <a href="#" class="btn btn-block facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="btn btn-block twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 col-md-offset-1 col-sm-offset-1 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>
                    @if(session('msg'))
                        <h4 class="alert alert-success ">{{session('msg')}}</h4>
                    @endif
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('user.register.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            @error('name')
                            <span class="text-danger ">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name">
                            </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            @error('email')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="exampleInputEmail2" name="email">
                            </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            @error('phone')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror" id="exampleInputEmail1" name="phone">
                            </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            @error('password')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" id="exampleInputEmail1" name="password">
                          </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                            @error('password_confirmation')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                            <input type="password" class="form-control unicase-form-control text-input @error('password_confirmation') is-invalid @enderror" id="exampleInputEmail1" name="password_confirmation">
                          </div>
                            <input type="submit" class="btn-upper btn btn-primary checkout-page-button" name="submit" value="Sign Up">
                           
                    </form>
                </div><!-- create a new account -->            
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
  </div><!-- /.container -->
</div><!-- /.body-content --> 
@endsection