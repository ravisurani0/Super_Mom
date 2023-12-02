<?php

namespace App\Http\Controllers;

use App\Model\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="roles/' . $row->id . '" class="btn btn-primary btn-sm mr-3"><i class="icon-sm fas fa-pencil-alt"></i>Edit</a>';
                    $btn .= '<a href="delete-role/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.roles.list');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:roles',
            'status' => 'nullable',
        ]);

        Role::create([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect('admin/roles')->with(['success' => 'Role created successfully']);
    }

    public function show(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'title' => 'required|string',
            'status' => 'required',
        ]);

        $role = $role->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect('admin/roles')->with(['success' => ' Role updated successfully']);
    }

    public function destroy(Role $role)
    {
        Role::where('id', $role)->delete();
        return redirect(route('roles.index'))->with(['success' => 'Role deleted successfully']);
    }
}
