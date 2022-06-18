
@extends('layouts.frontend-master')
@section('page-title', 'My Account')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>My Account</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page outer-bottom-vs">
            <div class="row">
                <!-- photo -->
                <div class="col-md-4 py-5">
                    <img style="width:300px; height:300px;" class="img-resposive"
                    src="{{ asset('frontend/assets/images/testimonials/member1.png') }}" alt="photo" />
                </div>

                <!-- photo -->
               
                <!--profile attributes -->
                <div class="col-md-8 py-5">

                    <table class="table-large table-bordered ">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{$user_profile->name}}</th>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone No.</td>
                                <td>{{$user_profile->phone}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$user_profile->address}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">

                        <a class="btn btn-primary" href="{{ route('user.profile.update.show') }}">Update Now</a>
                    </div>
                </div>
                     <!-- profile attributes -->
            </div> <!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
