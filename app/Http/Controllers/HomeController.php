<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where([['seller_id', '!=', Null], ['user_status', 0]])->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->rawColumns(['action'])
                ->make(true);
        }

        $page_title = 'Dashboard';
        $data = [
            'requstedSeller' => User::where([['user_status', 0], ['role', '3'], ['seller_id', '!=', '']])->count(),
            'activeSeller' => User::where([['user_status', 1], ['role', '3']])->count(),
            'totalSeller' => User::where('role', '3')->count(),
            'totalOrder' => Order::count(),
            'pendingOrder' => Order::where('status', 0)->count(),
            'completedOrder' => Order::where('status', 1)->count(),
        ];
        return view('home')->with($data);
    }
}
