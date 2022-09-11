<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expenses;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Salary;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\sCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        //print_r(gettype($this->user));
        if($this->user == null){
            return view("backend.auth.login");
        }
        else{
            $statData = [];

            return view('backend.pages.dashboard.index', compact('statData'));
        }
        //return view('backend.pages.dashboard.index');
    }
}
