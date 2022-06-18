<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('users.register');
    }

    public function submitRegisterForm()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:profiles,phone',
            'password' => 'required|min:3|alpha_dash|confirmed',
            'password_confirmation' => 'required',
        ]);

        DB::transaction(function () {
            //USER REGISTRATION
            $user = User::Create([           
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);
    
             //USER PROFILE CREATION
            $user->profile()->create([
                'name' => request('name'),
                'phone' => request('phone'),
                'address' => request('address'),
                'photo' => request('photo') 
            ]);
        });              
        return redirect()->back()->with('msg', 'Registration successfully done.'); 
    }
}
