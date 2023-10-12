<?php

namespace App\Http\Controllers;

use App\Model\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="users/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>
                    <a href="delete_users/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete User" class="delete btn btn-danger btn btn-danger btn-sm mr-3"><i class="icon-sm fas fa-trash"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.list');
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'company_name' => 'required|string|unique:users',
            'mobile_no' => 'required|string|unique:users',
            'whatsapp_no' => 'required|string|unique:users',
            'address' => 'required|string',
            'email' => 'required|string|unique:users',
            'role' => 'nullable',
            'seller_id' => 'required|string|unique:users',
            'requested_seller_id' => 'nullable',
            'discount' => 'nullable',
            'commission' => 'nullable',
            'account_balance' => 'nullable',
            'user_status' => 'nullable',
            'password' => 'nullable',
        ]);

        $users = User::create([
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'whatsapp_no' => $request->whatsapp_no,
            'address' => $request->address,
            'email' => $request->email,
            'role' => 0,
            'seller_id' => $request->seller_id,
            'requested_seller_id' => $request->requested_seller_id,
            'discount' => $request->discount,
            'commission' => $request->commission,
            'account_balance' => $request->account_balance,
            'user_status' => $request->user_status,
            'password' => '$2y$10$E4ihg/xn8R3wdQ9je6okjeUKSOTtp8EESVZOo6nfHCJDobDgn00qS',
        ]);

        return redirect('admin/users');
    }

    public function show(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
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
            'password' => 'nullable',
        ]);



        $user->update([
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
        ]);
        return redirect('admin/users');
    }

    public function destroy(User $users, $user_id)
    {
        User::where('id', $user_id)->delete();
        return redirect(route('users.index'))->with(['success' => 'User Deleted successfully']);
    }
}
