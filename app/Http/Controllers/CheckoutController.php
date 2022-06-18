<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        return view('frontend.checkout');
    }

    public function placeOrder()
    {
        request()->validate([
            'billing_fname'             => 'required',
            'billing_email'             => 'required',
            'billing_phone'             => 'required',
            'billing_address'           => 'required',
            'billing_district'          => 'required',
            'billing_upazila'           => 'required',
            'billing_post_code'         => 'required',
            'payment_type'              => 'required',
        ],
        [
            'payment_type.required'         => 'Please select your payment option before placing order',
        ]);

        $cart = Cart::with('product')->where('user_ip', request()->ip())->first();

        if ($cart != null)
        {
            DB::transaction(function ()
            {
                $order = Order::create([
                    'user_id'           => Auth::id(),
                    'invoice'           => strtoupper(rand()),
                    'subtotal'          => request('subtotal'),
                    'shipping'          => request('shipping'),
                    'discount'          => request('discount'),
                    'total'             => request('total'),
                    'payment_type'      => request('payment_type'),
                ]);

                $carts = Cart::with('product')->where('user_ip', request()->ip())->get();
                foreach($carts as $cart)
                {
                    $order->orderItems()->create([
                        'order_id'              => $order->id,
                        'product_image'         => $cart->product->product_thumbnail,
                        'product_name'          => $cart->product->name,
                        'product_quantity'      => $cart->quantity,
                        'product_subtotal'      => $cart->price*$cart->quantity,
                    ]);
                }

                $order->billingAddress()->create([
                    'fname'                 => request('billing_fname'),
                    'lname'                 => request('billing_lname'),
                    'email'                 => request('billing_email'),
                    'phone'                 => request('billing_phone'),
                    'cname'                 => request('billing_cname'),
                    'address'               => request('billing_address'),
                    'district'              => request('billing_district'),
                    'upazila'               => request('billing_upazila'),
                    'post_code'             => request('billing_post_code'),
                ]);

                if (request()->has('shippingAddress'))
                {
                    $order->shippingAddress()->create([
                        'fname'                 => request('shipping_fname'),
                        'lname'                 => request('shipping_lname'),
                        'email'                 => request('shipping_email'),
                        'phone'                 => request('shipping_phone'),
                        'address'               => request('shipping_address'),
                        'district'              => request('shipping_district'),
                        'upazila'               => request('shipping_upazila'),
                        'post_code'             => request('shipping_post_code'),
                    ]);
                }

                $order->payment()->create([
                    'payment_type'    => request('payment_type'),
                    'amount'          => request('paymentAmount') ? request('paymentAmount') : 0,
                ]);

                if(Session::has('coupon'))
                {
                    session()->forget('coupon');
                }
                Cart::where('user_ip', request()->ip())->delete();

            });
        }
        else
        {
            return redirect()->route('page.shop');
        }


        return redirect()->route('order.success');
    }

    //ORDER SUCCESS
    public function orderSuccess()
    {
        return view('frontend.order-success');
    }

    //TRACK ORDER
    public function trackOrder()
    {
        return view('frontend.track-order');
    }



}
