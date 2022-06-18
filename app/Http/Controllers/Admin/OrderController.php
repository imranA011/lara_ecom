<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //  SHOW PENDING ORDER LISTS
    public function showAllOrders()
    {
        $orders = Order::with(['orderItems', 'billingAddress'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    //  UPDATE ORDER STATUS
    public function updateOrderStatus()
    {
        if(request()->has('order_checked') && request('update_order_status') == 'delete')
        {
            {
                foreach (request('order_checked') as $orderId)
                {
                    Order::find($orderId)->delete();
                }
                return redirect()->back();
            }
        }
        elseif(request()->has('order_checked') && request('update_order_status') != null)
        {
            foreach (request('order_checked') as $orderId)
            {
                Order::find($orderId)->update([
                    'status' => request('update_order_status')
                ]);
            }
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }





}
