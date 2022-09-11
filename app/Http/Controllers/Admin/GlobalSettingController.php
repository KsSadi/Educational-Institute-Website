<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        if (is_null($this->user) || !$this->user->can('global.setting')) {
            abort(403, 'Unauthorized Access!');
        }
        $global= GlobalSetting::first();
        return view('backend.pages.settings.global-setting',compact('global'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' =>  'required|max:100',
            'short_name' =>  'required|max:20',

        ]);
        $global= GlobalSetting::find($id);
        $global->full_name = $request->full_name;
        $global->bn_name = $request->bn_name;
        $global->short_name = $request->short_name;
        $global->email = $request->email;
        $global->phone = $request->phone;
        $global->address = $request->address;
        $global->facebook = $request->facebook;
        $global->youtube = $request->youtube;
        $global->twitter = $request->twitter;
        $global->theme = $request->theme;


        if($request->hasFile('icon')){
            $global->icon = $request->icon->store('upload','public');
        }

        if($request->hasFile('logo')){
            $global->logo = $request->logo->store('upload','public');
        }

        $global->save();
        session()->flash('success', 'Setting has been Updated!');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
