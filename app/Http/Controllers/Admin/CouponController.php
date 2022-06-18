<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    //SHOW COUPON LISTS
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    //STORE COUPON
    public function store()
    {
        request()->validate([
            'name'      => 'required|alpha_dash|unique:coupons,coupon_name',
            'discount'  => 'required|integer',
        ]);

        Coupon::create([
            'coupon_name'       => Str::upper(request('name')) ,
            'coupon_discount'   => request('discount') ,
        ]);
        return redirect()->back()->with('create-message', 'New Coupon Created');
    }

    //SHOW  EDIT COUPON
    public function showEditCoupon($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    //SAVE EDIT COUPON
    public function submitEditCoupon($id)
    {
        $coupon = Coupon::find($id);
        request()->validate([
            'name' => 'required|alpha_dash',
            'discount' => 'required'
        ]);

        $coupon->update([
            'coupon_name'       => Str::upper(request('name')),
            'coupon_discount'   => request('discount')
        ]);
        return redirect()->route('coupon.index')->with('update-message', 'Coupon updated successfully');
    }

    //DELETE COUPON
    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->back()->with('delete-message', 'Coupon deleted');
    }

    // UPDATE COUPON STATUS
    public function updateCouponStatus($id, $status)
    {
        if($id != null && $status != null)
        {
            $coupon = Coupon::find($id);
            if($coupon != NULL)
            {
                $coupon->update([
                    'status' => $status,
                ]);
                return redirect()->back()->with('status-message', 'Coupon '. $status);
            }
            else
            {
                return 'No Coupon Found';
            }
        }
        else
        {
            return 'Invalid Coupon';
        }
    }

    // APPLY COUPON CODE
    public function applyCoupon()
    {
        $checkValidCoupon = Coupon::where('coupon_name', request('coupon_name'))
                                    ->where('status', 'active')->first();
        if($checkValidCoupon)
        {
            Session::put('coupon', [
                'coupon_name'      => $checkValidCoupon->coupon_name,
                'coupon_discount'  => $checkValidCoupon->coupon_discount,
            ]);
            return redirect()->back()->with('coupon-success', 'Coupon applied successfully');
        }
        else{
            return redirect()->back()->with('coupon-invalid', 'Invalid coupon code');
        }
    }

    //DELETE COUPON CODE
    public function destroyCoupon()
    {
        if(Session::has('coupon'))
        {
            session()->forget('coupon');
            return redirect()->back()->with('coupon-success', 'Coupon Removed');
        }
        else{
            return redirect()->back()->with('coupon-invalid', 'No coupon Found');
        }
    }
}
