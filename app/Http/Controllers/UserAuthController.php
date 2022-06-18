<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function submitLoginForm()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ])){
            return redirect()->route('page.home');
        }else{
            return redirect()->back()->with('msg', 'Invalid Email or Password');
        }  
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('user.login.show');
    }
}
