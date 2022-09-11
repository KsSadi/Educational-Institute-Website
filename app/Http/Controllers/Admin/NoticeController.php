<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
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
        if (is_null($this->user) || !$this->user->can('notice.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $notices = Notice::all();
        return view('backend.pages.notices.index', compact('notices'));


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('notice.create')) {
            abort(403, 'Unauthorized Access!');
        }
        return view('backend.pages.notices.create');
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
        if (is_null($this->user) || !$this->user->can('notice.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $notice = new Notice();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->date = $request->date;

        if($request->hasFile('document')){

            $notice->notice_file = $request->document->store('notice','public');
        }

        $notice->save();
        session()->flash('success', 'Notice has been Created!!');
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
        $notice = Notice::find($id);
        return view('backend.pages.notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('notice.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        $notice = Notice::find($id);
        return view('backend.pages.notices.edit', compact('notice'));

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
        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->date = $request->date;
        if($request->hasFile('document')){

            $notice->notice_file = $request->document->store('notice','public');
        }
        $notice->save();
        session()->flash('success', 'Notice has been Updated!!');
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
        if (is_null($this->user) || !$this->user->can('notice.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $notice = Notice::find($id);
        if(!is_null($notice)){
            $notice->delete();
        }
        session()->flash('success', 'Notice has been Deleted!!');
        return back();



    }
}
