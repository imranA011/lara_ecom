@extends('layouts.frontend-master')
@section('page-title', 'Order')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>
<div class="body-content">
    <div class="container m-b-20">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-sm-12">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default ">
                                <h1 class="unicase-checkout-title text-center"><span>Order received</span> </h1>
                                <hr>                      
                                <h5 class="unicase-checkout-title px-20">
                                    Thank you. Your order has been received.
                                </h5>
                                <div class="px-20 outer-bottom-xs">
                                    <ul class="list-disc">
                                        <li class="py-5">Order number: <strong>5194</strong> </li>
                                        <li class="py-5">Date:  <strong>5194</strong></li>
                                        <li class="py-5">Email:  <strong>5194</strong></li>
                                        <li class="py-5">Total:  <strong>5194</strong></li>
                                        <li class="py-5">Payment method:  <strong>5194</strong></li>
                                    </ul>
                                </div>
                                <h3 class="px-20"><span>Order details</span>
                                </h3>
                                <hr>

                                <h3 class="px-20"><span>Billing address</span>
                                </h3>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
@endsection
