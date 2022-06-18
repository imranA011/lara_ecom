<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        $user_profile = User::find(Auth::id())->profile;
        return view('users.profile', compact(['user_profile']));
    }

    public function showUpdateProfile()
    {
        return view('users.profile-update');
    }

    
}
