<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ContactUs::where('status', 1)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="contact-us/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Details</a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.ContactUs.list');
    }
    public function show(Request $request, $id)
    {

        $contactDetails = ContactUs::where('id', $id)->get()->first();

        return view('admin.ContactUs.show', compact('contactDetails'));
    }
}
