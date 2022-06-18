<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('users.password-forget');
    }

    public function submitForgetPasswordForm()
    {
        request()->validate([
            'email' => 'required|email|exists:users'
        ]);

        $userExist = User::where('email', request('email')); 
    
        if ($userExist->count() == 1 )
        {
            $data = [];
            $userExist = $userExist->first();          
            $generateToken = sha1(md5(rand())); 
            $checkPasswordEntry = PasswordReset::where('email', request('email')); 

            if ($checkPasswordEntry->count() > 0)
            {
                $checkPasswordEntry->update([
                    'token' => $generateToken
                ]);
            }else
            {
                PasswordReset::create([
                    'user_id' => $userExist->id,
                    'email' => $userExist->email,
                    'token' => $generateToken
                ]); 
            }

            $data['email'] = $userExist->email;
            $data['token'] = $generateToken;

            Mail::to($userExist->email)->send(new \App\Mail\PasswordReset($data));
            return redirect()->back()->with('msg', 'Password reset link has been sent to your mail');
        }else
        {
            return redirect()->back()->with('msg', 'No valid email found');
        }
    }

    public function showResetPasswordForm($email, $token)
    {
        $checkData = PasswordReset::where('email', $email)
                                   ->where('token', $token);
        if($checkData->count() == 1){
            $user_id = $checkData->first()->user_id;
            return view('users.password-reset', compact('user_id'));
        }else{
            return 'Unauthorized';
        }  
    }

    public function submitResetPasswordForm()
    {
        request()->validate([
            'password' => 'required|min:3|alpha_dash|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user_id = request('user_id');

        if( $user_id != null ){         
            User::find($user_id)->update([               
                'password' => bcrypt(request('password'))
            ]);
            PasswordReset::where('user_id', $user_id)->delete();
            return redirect()->route('user.login.show');
        }else{
            return redirect()->back()->with('msg', 'Invalid User');
        }
    }
    
}
