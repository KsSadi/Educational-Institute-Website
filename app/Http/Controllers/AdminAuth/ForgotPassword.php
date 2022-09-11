<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\Admin;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
Use App\Mail;
use App\User;

class ForgotPassword extends Controller
{
    //

    public function forgot()
    {
        return view('auth.forgot-password');
    }
    public function reset_password(Request $request)
    {
        $token = $request->token;
        $available = Admin::where('reset_token', $token)->first();
        if (empty($available)) {
            return redirect('/dashboard/forgot-password')->with('error', 'This request already expired.');
        }
        return view('auth.reset-password')->with(['token' => $token]);
    }
    public function post_reset_password(Request $request)
    {
        $this->validate($request, [
            'token'    => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        $token = $request->token;
        $available = Admin::where('reset_token', $token)->first();
        if (empty($available)) {
            return redirect('/dashboard/forgot-password')->with('error','This request already expired.');
        }
        $available->reset_token = '';
        $available->password = bcrypt($request->password);
        $available->save();
        return redirect('/dashboard/login')->with('success','Password Update Successful. Please login with new password');
    }




    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
        $credentials['password'] = bcrypt($credentials['password']);
        $user = Admin::where('email', $credentials['email'])->first();
        $user->password = $credentials['password'];
        $user->save();
        return redirect('/login')->with('success', 'Password Reset Successfully');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function password(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required'
        ]);
        $email = $request->email;
        $user = Admin::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Your Email not found');
        }
        if (!empty($user->reset_token)) {
            return back()->with('error', ' Password Reset Token Already Sent');
        }
        $token = sha1(time());
        $user->reset_token = $token;
        $user->save();
        $url = env('APP_URL') . "/dashboard/reset-password?token=" . $token;

        \Illuminate\Support\Facades\Mail::to([$email])
            ->send(new PasswordResetMail($url));
        return back()->with('success', 'Password Reset Link Sent To Your Email');




    }




}
