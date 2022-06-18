<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //INSERT CART ITEM
    public function addToCart()
    {
        $checkCartItem = Cart:: where('product_id', request('product_id'))
                        ->where('user_ip', request()->ip())
                        ->first();
        if($checkCartItem)
        {
            // Cart::where('product_id', request('product_id'))
            //     ->where('user_ip', request()->ip())
            //     ->increment('quantity');
            return redirect()->back()->with('cartMsg', 'Product has already been added to Cart');
        }
        else
        {
            Cart::insert([
                'product_id'    => request('product_id'),
                'quantity'      => 1,
                'price'         => request('price'),
                'user_ip'       => request()->ip(),
            ]);
            return redirect()->back()->with('cartMsg', 'Product added to Cart');
        }
    }

    //SHOW SHOPPING CART ITEMS
    public function showCart()
    {
        $carts = Cart::where('user_ip', request()->ip())->get();
        $cart_subtotal = Cart::all()
                            ->where('user_ip', request()->ip())
                            ->sum(function($t){
                                return $t->price * $t->quantity;
                            });
        return view('frontend.cart', compact(['carts', 'cart_subtotal']));
    }

    //CART ITEM DELETE
    public function deleteCart($id)
    {
        $cart = Cart::where('id', $id)->where('user_ip', request()->ip())->first();
        $cart->delete();
        return redirect()->back()->with('cart-delete', 'Cart Product has been removed');
    }

    //CART ITEM INCREMENT
    public function incrementQuantity($id)
    {
        $cart = Cart::where('id', $id)->where('user_ip', request()->ip())->first();
        $cart->increment('quantity');
        return redirect()->back()->with('cart-update', 'Cart Product has been updated');
    }

    //CART ITEM DECREMENT
    public function decrementQuantity($id)
    {
        $cart = Cart::where('id', $id)->where('user_ip', request()->ip())->first();

        if($cart->quantity > 1)
        {
            $cart->decrement('quantity');
        }
        else
        {
            return redirect()->back();
        }
        return redirect()->back()->with('cart-update', 'Cart Product has been updated');
    }



}
