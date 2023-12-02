<?php

namespace App\Http\Controllers;

use App\Model\Pages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pages::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="page/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>
                    <a href="delete-page/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.list');
    }

    public function create()
    {
        $pages = Pages::where('status', 1)->get();
        return view('admin.pages.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:pages',
            'sub_title' => 'nullable',
            'description' => 'nullable',
            'slug' => 'nullable',
            'status' => 'nullable',
        ]);

        Pages::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        return redirect(route('page.index'))->with(['success' => 'Page created successfully']);
    }

    public function show(Pages $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function edit(Pages $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Pages $page)
    {
        $request->validate([
            'title' => 'required|string',
            'sub_title' => 'nullable',
            'description' => 'nullable',
            'slug' => 'nullable',
            'status' => 'nullable',
        ]);

        $page->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        return redirect(route('page.index'))->with(['success' => 'Page update successfully']);
    }

    public function destroy($page)
    {
        Pages::where('id', $page)->delete();
        return redirect(route('page.index'))->with(['success' => 'Page deleted successfully']);
    }
}
