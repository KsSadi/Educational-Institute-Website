<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if (is_null($this->user) || !$this->user->can('slider.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $sliders = Slider::all();

        return view('backend.pages.sliders.index', compact('sliders'));
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
        if (is_null($this->user) || !$this->user->can('slider.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $slider = new Slider();
        $slider->title = $request->title;
        if($request->hasFile('slider')){

            $slider->slider = $request->slider->store('slider','public');
        }
        $slider->save();

        session()->flash('success', 'Slider has been created successfully');
        return back();
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
        //
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
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $slider = Slider::find($id);
        if(!is_null($slider)){
            $slider->delete();
        }
        session()->flash('success', 'Slider has been deleted successfully');
        return back();

    }
}
