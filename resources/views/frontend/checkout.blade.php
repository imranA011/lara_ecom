@extends('layouts.frontend-master')
@section('page-title', 'Checkout')

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
                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <div class="col-md-7">
                            <div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
                                <div class="panel panel-default checkout-step-01">
                                    <!-- panel-heading -->
                                    <h4 class="unicase-checkout-title px-15"><strong>Billing Information</strong>
                                    </h4>
                                    @if ($errors->any())
                                        <span class="text-danger fst-italic px-15">{{ $errors->first() }}</span>
                                    @endif
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group col-md-6 ">
                                                <label class="ck-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    name="billing_fname"
                                                    value="{{ ucwords(Auth::user()->profile->name) }}">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label class="ck-label">Last Name <span> (optional)</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    name="billing_lname">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ck-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control unicase-form-control text-input"
                                                    name="billing_email" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ck-label">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="billing_phone"
                                                    class="form-control unicase-form-control text-input"
                                                    value="{{ Auth::user()->profile->phone }}">
                                            </div>
                                            <div class="form-group col-md-12 ">
                                                <label class="ck-label">Company Name <span>(optional)</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    name="billing_cname">
                                            </div>
                                            <div class="form-group col-md-12 ">
                                                <label class="ck-label">Address<span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control unicase-form-control" name="billing_address"
                                                    rows="3">{{ Auth::user()->profile->address }}</textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="ck-label">District<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control unicase-form-control" name="billing_district"
                                                    id="">
                                                    <option value="">Select</option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Khulna">Khulna</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="ck-label">Upazila<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control unicase-form-control" name="billing_upazila"
                                                    id="">
                                                    <option value="">Select</option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Khulna">Khulna</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="ck-label">Post Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    name="billing_post_code">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="unicase-checkout-title px-15 py-20 ">
                                        <input type="checkbox" name="shippingAddress" id="shippingAddress">
                                        <strong>Ship to another address?</strong>
                                    </h5>
                                    <div class="row" id="shippingForm">
                                        @if (session('shipping-message'))
                                            <h4 class="text-danger text-center">
                                                {{ session('shipping-message') }}</h4>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6 ">
                                                <label class="ck-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control unicase-form-control"
                                                    name="shipping_fname">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label class="ck-label">Last Name <span> (optional)</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    name="shipping_lname">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ck-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control unicase-form-control text-input"
                                                    name="shipping_email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ck-label">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control unicase-form-control text-input"
                                                    name="shipping_phone">
                                            </div>
                                            <div class="form-group col-md-12 ">
                                                <label class="ck-label">Address<span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control unicase-form-control" name="shipping_address" rows="3"></textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="ck-label">District<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control unicase-form-control" name="shipping_district"
                                                    id="">
                                                    <option value="">Select</option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="khulna">khulna</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="ck-label">Upazila<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control unicase-form-control" name="shipping_upazila"
                                                    id="">
                                                    <option value="">Select</option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="khulna">khulna</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="ck-label">Post Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    name="shipping_post_code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default ">
                                        <h4 class="unicase-checkout-title px-15"><strong>Order Review</strong> </h4>
                                        <hr>
                                        <div class="row px-10">
                                            <div class="col-md-12">
                                                <table class="table-ck">
                                                    @php
                                                        $carts = App\Models\Cart::all()->where('user_ip', request()->ip());
                                                        $cart_subtotal = App\Models\Cart::all()
                                                            ->where('user_ip', request()->ip())
                                                            ->sum(function ($t) {
                                                                return $t->price * $t->quantity;
                                                            });
                                                    @endphp
                                                    @foreach ($carts as $cart)
                                                        <tr>
                                                            <td>
                                                                <a class="entry-thumbnail" href="detail.html">
                                                                    <img src="{{ asset('uploads/products/thumbnail/' . $cart->product->product_thumbnail) }}"
                                                                        alt="" style="width:50px">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <h5 class='cart-product-description'><a
                                                                        href="">{{ $cart->product->name }}</a></h5>
                                                                <div class="cart-product-info">
                                                                    <small class="product-color">COLOR:<span>
                                                                            Blue</span></small>
                                                                    <span class="h5"> X </span>
                                                                    <span
                                                                        class="product-color">{{ $cart->quantity }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="right">
                                                                <span
                                                                    class="cart-grand-total-price">${{ number_format($cart->price * $cart->quantity, 2) }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row px-10 m-t-20">
                                            <div class="col-md-12">
                                                <table class="table-ck">
                                                    <tr>
                                                        <td>Subtotal</td>
                                                        <td class="h5 right">
                                                            ${{ number_format($cart_subtotal, 2) }}
                                                            <input type="hidden" name="subtotal" value="{{$cart_subtotal}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Shipping <span>(Flat Rate)</span>
                                                        </td>
                                                        <td class="h5 right">$20</td>
                                                        {{-- <input type="text" name="shipping" value="{{$cart_shipping}}"> --}}
                                                    </tr>
                                                    @if (Session::has('coupon'))
                                                        <tr>
                                                            <td>
                                                                Discount
                                                                <span>({{ session()->get('coupon')['coupon_discount'] }}%)</span>
                                                            </td>
                                                            <td class="h5 right">
                                                                (${{ number_format($total_discount = ($cart_subtotal * session()->get('coupon')['coupon_discount']) / 100, 2) }})
                                                                <input type="hidden" name="discount" value="{{ $total_discount = ($cart_subtotal * session()->get('coupon')['coupon_discount'] / 100) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Grand total</td>
                                                            <td class="h5 right">
                                                                ${{ number_format($cart_subtotal - $total_discount, 2) }}
                                                                <input type="hidden" name="total" value="{{ $cart_subtotal - $total_discount }}">
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>Grand total</td>
                                                            <td class="h5 right">
                                                                ${{ number_format($cart_subtotal, 2) }}</td>
                                                                <input type="hidden" name="total" value="{{ $cart_subtotal }}">
                                                        </tr>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class=" col-sm-12 ">
                                            <h4 class="unicase-checkout-title">
                                                <strong> Select Payment Method</strong>
                                                <span class="text-danger"> * </span>
                                            </h4>
                                            @error('payment_type')
                                                <span class="text-danger fst-italic">{{ $message }}</span>
                                            @enderror
                                            <div class="">
                                                <div class="radio  outer-top-xs">
                                                    <h5 class="px-20">
                                                        <input type="radio" name="payment_type" value="cash on delivery">
                                                        <label>Cash on Delivery</label>
                                                    </h5>
                                                    <h5 class="px-20">
                                                        <input type="radio" id="nagadPay" name="payment_type" value="nagad">
                                                        <label>Nagad</label>
                                                    </h5>
                                                    <h5 class="px-20">
                                                        <input type="radio" id="" name="payment_type" value="bikash">
                                                        <label>Bikash</label>
                                                    </h5>
                                                </div>
                                                <div class="payNumber  outer-top-xs">
                                                    <label class="ck-label h5"><strong>Total Amount (Grant Total + 15%) :</strong></label>
                                                    <input type="text" class="form-control unicase-form-control text-input"
                                                    name="paymentAmount" value="">
                                                    <h4 class="text-danger">
                                                        <strong>Payment to : XXXXXXXXXXXXX </strong>
                                                    </h4>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row px-10">
                                            <div class="col-sm-12 ">
                                                <div class="cart-checkout-btn outer-top-xs m-b-10">
                                                    <button type="submit"
                                                        class="btn btn-primary checkout-btn d-block">Place
                                                        Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#shippingAddress").change(function() {
            if($(this).prop('checked')) {
                $("#shippingForm").show();
            }else{
                $("#shippingForm").hide();
            }
        });

        $("#nagadPay").change(function() {
            if($(this).prop('checked')) {
                $(".payNumber").show();
            }else{
                $(".payNumber").hide();
            }
        });

    });
</script>
@endpush
