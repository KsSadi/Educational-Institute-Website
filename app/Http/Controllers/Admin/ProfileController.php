<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        //
        //Check and guard the permission
        if (is_null($this->user) ) {
            abort(403, 'Unauthorized Access!');
        }


        return view('backend.pages.admins.profile');
    }

    public function setting()
    {
     //  dd(Auth::user());
       $user = Admin::where('id', Auth::guard('admin')->user()->id)->first();


       // return $user->id;
       return view('backend.pages.admins.setting')->with('user', $user);
    }

    public function update_password(Request $request)
    {
        //dd($request->all());
        $this->validate(request(), [
            'current_password' => 'required',
            'password'         => 'min:6|required|confirmed'
        ]);
        $user = Admin::find(\request('user_id'));
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->password);
        } else {
            $request->session()->flash('failed', 'Your current password does not match');
            return redirect()->back();
        }
        $user->save();
        $request->session()->flash('success', 'Password Updated Successfully');
        return redirect()->back();

    }



}
