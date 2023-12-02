<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiCategoryController  extends Controller
{

    public function index(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Category List',
            'data' => [
                'category' => Category::where('status', 1)->get(),
            ],
        ], 200);
    }

    public function show($id)
    {
        $category = Category::where(['id' => $id, 'status' => 1 ])->first();
        if (!$category) {
            return response()->json([
                'message' => 'Category not found.',
                'error' => ['Category not found.'],
                'data' => []
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Category details.',
            'data' => ['category' => $category],
        ], 200);
    }

}
