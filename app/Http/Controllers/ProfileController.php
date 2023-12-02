<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $roleList = Role::where('status', 1)->get();
        $page_title = 'My Profile';
        $userDetails  = auth()->user();
        return view('customer.auth.profile', compact('page_title', 'userDetails', 'roleList'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'mobile_no' => 'required|string',
            'whatsapp_no' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'role' => 'nullable',
            'seller_id' => 'nullable|string',
            'discount' => 'nullable',
            'commission' => 'nullable',
            'account_balance' => 'nullable',
            'user_status' => 'nullable',
            'role' => 'nullable',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        User::where('id', auth()->user()->id)->update([
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'whatsapp_no' => $request->whatsapp_no,
            'address' => $request->address,
            'email' => $request->email,
            'role' => 0,
            'seller_id' => $request->seller_id,
            'discount' => $request->discount,
            'commission' => $request->commission,
            'account_balance' => $request->account_balance,
            'user_status' => $request->user_status,
            'role' => $request->role,
            'password' => bcrypt($request->password),

        ]);
        return redirect('/admin/home');
    }
}
