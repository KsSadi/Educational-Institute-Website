<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpeechController extends Controller
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('speech.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $speech = Speech:: first();
        return view('backend.pages.speeches.index', compact('speech'));


        //
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
        //
        $speech = Speech::find($id);
        $speech->head_teacher_name = $request->head_teacher_name;
        $speech->president_name = $request->president_name;
        $speech->head_teacher_designation = $request->head_teacher_designation;
        $speech->president_designation = $request->president_designation;
        if($request->hasFile('president_image')){
            $speech->president_image = $request->president_image->store('upload','public');
        }
        if($request->hasFile('head_teacher_image')){
            $speech->head_teacher_image = $request->head_teacher_image->store('upload','public');
        }
        $speech->head_teacher_massage = $request->head_teacher_massage;
        $speech->president_massage = $request->president_massage;
        $speech->save();

        session()->flash('success', 'Speeches Updated Successfully');
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
