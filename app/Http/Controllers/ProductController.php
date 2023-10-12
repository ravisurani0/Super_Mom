<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="products/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>
                    <a href="delete_products/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3"><i class="icon-sm fas fa-trash"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.product.list');
    }

    public function create(Product $product)
    {
        return view('admin.product.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:products',
            'short_name' => 'required|string|unique:products',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'price' => 'required',
            'gst_rate' => 'required',
            'hsn_code' => 'required|unique:products',
            'carton_capacity' => 'required',
            'status' => 'nullable',
            'order' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $imageName = '';
        if (isset($request->image)) {
            $imageName =  fileUpload($request->image, '', 'public\products\images');
        }

        $product = Product::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
            'gst_rate' => $request->gst_rate,
            'hsn_code' => $request->hsn_code,
            'carton_capacity' => $request->carton_capacity,
            'status' => true,
        ]);

        return redirect('admin/products')->with(['success' => 'Product created successfully']);
    }

    public function show(Product $product)
    {

        return view('admin.product.edit', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'short_name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'price' => 'required',
            'gst_rate' => 'required',
            'hsn_code' => 'required',
            'carton_capacity' => 'required',
            'status' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $imageName = $product->image;
        if (isset($request->image)) {
            $imageName =  fileUpload($request->image, '', 'public\products\images');
        }

        $product = $product->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
            'gst_rate' => $request->gst_rate,
            'hsn_code' => $request->hsn_code,
            'carton_capacity' => $request->carton_capacity,
            'status' => $request->status,
        ]);
        return redirect('admin/products')->with(['success' => 'Product created successfully']);
    }

    public function destroy(Product $product, $product_id)
    {
        Product::where('id', $product_id)->delete();
        return redirect(route('products.index'))->with(['success' => 'Product Deleted successfully']);
    }
}
