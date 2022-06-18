<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function submitLoginForm()
    {
        request()->validate([
            'user_mail' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt([
            'username' => request('user_mail'),
            'password' => request('password')
        ])){
            return redirect()->route('admin.dashboard');
        }elseif(Auth::guard('admin')->attempt([
            'email' => request('user_mail'),
            'password' => request('password')
        ])){
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->back()->with('msg', 'Invalid Credentials');
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.show'); 
    }

}
