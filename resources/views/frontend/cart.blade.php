@extends('layouts.frontend-master')
@section('page-title', 'Shopping Cart')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container m-b-20">
            {{-- @if (session('cart-message'))
            <h4 style="margin-top:-30px; padding:5px 0" class="text-danger text-center mb-3">
                {{ session('cart-message') }}</h4>
            @endif --}}
            @if (session('cart-update'))
                <h4 style="margin-top:-30px; padding:5px 0" class="text-success text-center mb-3">
                    {{ session('cart-update') }}</h4>
            @endif
            @if (session('cart-delete'))
                <h4 style="margin-top:-30px; padding:5px 0" class="text-danger text-center mb-3">
                    {{ session('cart-delete') }} </h4>
            @endif
            @if (session('coupon-success'))
                <h4 style="margin-top:-20px;" class="text-success text-center mb-3">{{ session('coupon-success') }}</h4>
            @else
                <h4 style="margin-top:-20px;" class="text-danger text-center mb-3">{{ session('coupon-invalid') }}</h4>
            @endif
            <div class="row ">
                <div class="shopping-cart">
                    @php
                    $cart = App\Models\Cart::where('user_ip', request()->ip())->first();
                    @endphp
                    @if($cart == null)
                    <div class="row inner-sm">
                        <h3 class="text-center py-10 m-b-20">Cart is empty</h3>
                        <div class="cart-checkout-btn d-block text-center">
                            <a href="{{ route('page.shop') }}" type="button" class="btn btn-upper btn-primary ">Shop Now</a>
                        </div>
                    @else
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">Remove</th>
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Description</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Unit Price</th>
                                        <th class="cart-total last-item">Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                                <span class="">
                                                    <a href="{{ route('page.shop') }}"
                                                        class="btn btn-upper btn-primary outer-left-xs">Continue
                                                        Shopping</a>
                                                    {{-- <a href=""
                                                        class="btn btn-upper btn-primary pull-right outer-right-xs">Update
                                                        shopping cart</a> --}}
                                                </span>
                                            </div><!-- /.shopping-cart-btn -->
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="romove-item">
                                                <a href="{{ route('cart.delete', $cart->id) }}" title="cancel"
                                                    class="icon"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="cart-image ">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="{{ asset('uploads/products/thumbnail/' . $cart->product->product_thumbnail) }}"
                                                        alt="" style="width:80px">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a
                                                        href="">{{ $cart->product->name }}</a></h4>
                                                <div class="cart-product-info">
                                                    <span class="product-color">COLOR:<span>Blue</span></span>
                                                </div>
                                            </td>
                                            {{-- <td class="cart-product-edit"><a href="#" class="product-edit">Edit</a></td> --}}
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <a href="{{ route('cart.item.increment', $cart->id) }}"
                                                            class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span></a>
                                                        <a href="{{ route('cart.item.decrement', $cart->id) }}"
                                                            class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span></a>
                                                    </div>
                                                    <input type="text" name="quantity" value="{{ $cart->quantity }}"
                                                        min="1">
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span
                                                    class="cart-sub-total-price">${{ number_format($cart->price, 2) }}</span>
                                            </td>
                                            <td class="cart-product-grand-total"><span
                                                    class="cart-grand-total-price">${{ number_format($cart->price * $cart->quantity, 2) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Estimate shipping and tax</span>
                                        <p>Enter your destination to get shipping and tax.</p>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="info-title control-label">Country <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option>--Select options--</option>
                                                <option>India</option>
                                                <option>SriLanka</option>
                                                <option>united kingdom</option>
                                                <option>saudi arabia</option>
                                                <option>united arab emirates</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title control-label">State/Province <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option>--Select options--</option>
                                                <option>TamilNadu</option>
                                                <option>Kerala</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Karnataka</option>
                                                <option>Madhya Pradesh</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title control-label">Zip/Postal Code</label>
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="">
                                        </div>
                                        <div class="pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if (Session::has('coupon'))
                                            <div class="cart-sub-total">
                                                <div class="py-10">
                                                    <span class="h5">Couppon applied: </span>
                                                    <span class="h4 text-success">
                                                        {{ session()->get('coupon')['coupon_name'] }} </span>
                                                </div>

                                                <a href="{{ route('coupon.destroy') }}"
                                                    class="text-danger text-underline">Remove Coupon</a>
                                            </div>
                                        @else
                                            <form action="{{ route('apply.coupon') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="coupon_name"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="Your Coupon...">
                                                </div>
                                                <div class="clearfix pull-right">
                                                    <button type="submit" class="btn-upper btn btn-primary">APPLY
                                                        COUPON</button>
                                                </div>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span
                                                class="h4 inner-left-md">${{ number_format($cart_subtotal, 2) }}</span>
                                        </div>
                                        @if (Session::has('coupon'))
                                            <div class="cart-sub-total">
                                                Discount <span>
                                                    ({{ session()->get('coupon')['coupon_discount'] }}%)</span><span
                                                    class="h4 text-danger inner-left-md">(${{ number_format($total_discount = ($cart_subtotal * session()->get('coupon')['coupon_discount']) / 100, 2) }})</span>
                                            </div>
                                            <div class="cart-grand-total">
                                                Grand Total<span
                                                    class="inner-left-md h4">${{ number_format($cart_subtotal - $total_discount, 2) }}</span>
                                            </div>
                                        @else
                                            <div class="cart-grand-total">
                                                Grand Total<span
                                                    class="inner-left-md h4">${{ number_format($cart_subtotal, 2) }}</span>
                                            </div>
                                        @endif
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="{{ route('page.checkout') }}" type="button"
                                                class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                            <span class="">Checkout with multiples address!</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
