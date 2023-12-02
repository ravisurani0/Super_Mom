<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    protected $user;

    public function index(Request $request)
    {

        $productQuery = Product::where('status', 1)->with('imageGallery');


        if (isset($request->title)) {
            $productQuery = $productQuery->where('name', 'like', '%'.$request->title.'%');
        }

        $productList =  $productQuery->paginate(10);

        return response([
            'success' => true,
            'message' => 'Product List',
            'data' => ['product' => $productList, 'totalProduct' => count($productList)],
        ], 200);
    }

    public function categoryProducts($id)
    {
        $category = Category::with(['product' => function($query) { $query->where('status', 1); }])->where(['id' => $id, 'status' => 1 ])->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.',
                'error' => ['Category not found.'],
                'data' => []
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Category products details.',
            'data' => ['category' => $category, 'product-List' => $category->product, 'count' => count($category->product)],
        ], 200);
    }

    public function show($id)
    {
        $product = Product::where(['id' => $id, 'status' => 1])->with('imageGallery')->get()->first();
        if (!$product) {
            return response()->json([
                'message' => 'Product not found.',
                'error' => ['Product not found.'],
                'data' => []
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Product details.',
            'data' => [
                'product' => $product,
                // 'images' => $product->imageGallery
            ],
        ], 200);
    }
}
