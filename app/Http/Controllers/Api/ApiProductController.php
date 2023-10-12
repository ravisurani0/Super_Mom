<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Model\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    protected $user;



    public function index()
    {
        $productList = Product::where('status', true)->get();
        return response([
            'sucess' => true,
            'message' => 'Product List',
            'product' => $productList,
        ], 200);
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
        ]);

        if ($validator->fails()) {
            return response([
                'sucess' => false,
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
            ], 200);
        }

        $fileResponse = '';
        if (isset($request->image)) {
            $fileResponse =  fileUpload($request->image, '', 'public\products\images');
        }

        $product = Product::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
            'image' => $fileResponse,
            'price' => $request->price,
            'gst_rate' => $request->gst_rate,
            'hsn_code' => $request->hsn_code,
            'carton_capacity' => $request->carton_capacity,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 200);
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->get()->first();
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }
        return $product;
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
            return response([
                'sucess' => false,
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
            ], 200);
        }

        $product = $product->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'gst_rate' => $request->gst_rate,
            'hsn_code' => $request->hsn_code,
            'carton_capacity' => $request->carton_capacity,
            'status' => $request->status,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }


    public function destroy(Product $product)
    {
        if ($product) {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully'
            ], 200);
        } else {

            return response()->json([
                'sucess' => false,
                'message' => 'Product not Found.',
                'error' => ['Product not Found.'],
            ], 200);
        }
    }
}
