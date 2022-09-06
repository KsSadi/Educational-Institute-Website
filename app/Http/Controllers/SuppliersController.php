<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $suppliers= Supplier::all();
        view('backend.pages.suppliers.index',compact($suppliers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('supplier.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $suppliers= Supplier::all();
        view('backend.pages.suppliers.create',compact($suppliers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('supplier.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //Validate form
        $request->validate([
            'name' =>  'required|max:50',

        ]);

        $suppliers = new User();
        $suppliers->name = $request->name;
        $suppliers->mobile_no = $request->mobile_no;
        $suppliers->email = $request->email;
        $suppliers->address = $request->address;

        $suppliers->save();

        if (!empty($request->roles)) {
            $user->assignRole($request->roles);
        }
        session()->flash('success', 'Supplier has been Created!!');
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
    }
}
