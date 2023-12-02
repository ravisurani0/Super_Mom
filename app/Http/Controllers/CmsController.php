<?php

namespace App\Http\Controllers;

use App\Model\Cms;
use App\Model\Pages;
use Dompdf\FrameDecorator\Page;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CmsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cms::with('Page')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="cms/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>';
                    return $btn;
                    // <a href="delete-cms/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.cms.list');
    }

    public function create()
    {
        $pages = Pages::where('status', 1)->get();
        return view('admin.cms.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:cms',
            'cms_key' => 'nullable',
            'cms_value' => 'nullable',
            'cms_value_img' => 'nullable',
            'field_type' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'tags' => 'nullable',
            'page_id' => 'required',
        ]);

        $cms_value = $request->cms_value;

        if (isset($request->cms_value_img) && $request->field_type == 'img') {
            $cms_value =  fileUpload($request->cms_value_img, '', 'cms', false);
        } else if ($request->cms_value_text && $request->field_type == 'link') {
            $cms_value = $request->cms_value_text;
        }


        $tags = '';
        if ($request->tags) {
            $tags = implode(',', array_column(json_decode($request->tags), 'value'));
        }

        Cms::create([
            'title' => $request->title,
            'cms_key' => $request->cms_key,
            'cms_value' => $cms_value,
            'field_type' => $request->field_type,
            'description' => $request->description,
            'status' => $request->status,
            'tags' => $tags,
            'page_id' => $request->page_id,
        ]);

        return redirect(route('cms.index'))->with(['success' => 'CMS created successfully']);
    }

    public function show(Cms $cm)
    {
        $pages = Pages::where('status', 1)->get();
        return view('admin.cms.edit', compact('cm', 'pages'));
    }

    public function edit(Cms $cm)
    {
        $pages = Pages::where('status', 1)->get();
        return view('admin.cms.edit', compact('cm', 'pages'));
    }

    public function update(Request $request, Cms $cm)
    {
        $request->validate([
            'title' => 'required|string|',
            'sub_title' => 'nullable',
            'cms_key' => 'nullable',
            'cms_value' => 'nullable',
            'cms_value_text' => 'nullable',
            'cms_value_img' => 'nullable',
            'field_type' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'tags' => 'nullable',
            'page_id' => 'required',
        ]);

        $cms_value = $request->cms_value;

        if ($request->cms_value_img && $request->field_type == 'img') {
            $cms_value =  fileUpload($request->cms_value_img, '', 'cms', false);
        } else if ($request->cms_value_text && $request->field_type == 'link') {
            $cms_value = $request->cms_value_text;
        }
        $tags = '';
        if ($request->tags) {
            $tags = implode(',', array_column(json_decode($request->tags), 'value'));
        }

        $cm->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'cms_key' => $request->cms_key,
            'cms_value' => $cms_value,
            'field_type' => $request->field_type,
            'description' => $request->description,
            'status' => $request->status,
            'tags' => $tags,
            'page_id' => $request->page_id,
        ]);
        if ($cm->page_id == 6) {
            return redirect(route('contactCms'))->with(['success' => 'CMS updated successfully']);
        }

        return redirect(route('cms.index'))->with(['success' => 'CMS updated successfully']);
    }

    public function destroy(Cms $cms, $id)
    {
        Cms::where('id', $id)->delete();
        return redirect(route('cms.index'))->with(['success' => 'CMS deleted successfully']);
    }

    public function ContactCms(Request $request)
    {
        if ($request->ajax()) {
            $data = Cms::where('page_id', Pages::where('slug', 'contact_info')->pluck('id')->first())->with('Page')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="cms/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>
                    ';
                    // <a href="delete-cms/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.cms.list');
    }
}
