<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index (Request $request){
        $userCount = \App\Models\User::count();
        $orderCount = \App\Models\Order::count();
        $username = Auth::user()->username;
        $level = Auth::user()->level;

     
        if ($request->ajax()) {
            $data = Order::select('*');
            return DataTables::of($data)
                ->make(true);
        }
 

        return view ('/dashboard',compact('userCount','orderCount'));
    }
}
