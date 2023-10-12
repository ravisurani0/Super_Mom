<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'created_by' => 'required',
            'cart_items' => 'required|array',

        ]);

        if ($validator->fails()) {
            return response([
                'sucess' => false,
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
            ], 200);
        }

        $userCart = [];
        foreach ($request->cart_items as $item) {

            array_push($userCart, [
                'created_by' => $request->created_by,
                'products_id' => $item['id'],
                'qnt' => $item['qnt'],
                'price' => Product::where('id', $item['id'])->pluck('price')->first(),
            ]);
        }
        Cart::insert($userCart);

        return response()->json([
            'success' => true,
            'message' => 'Cart Created Sucessfull.',
        ], 200);
    }


    public function show(Request $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Cart Details',
            'data' => ['cartItems' => Cart::where('created_by', $id)->with('product')->get()],
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'created_by' => 'required',
            'cart_items' => 'nullable',

        ]);

        if ($validator->fails()) {
            return response([
                'sucess' => false,
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
            ], 200);
        }

        Cart::where('created_by', $id)->delete();

        $userCart = [];
        if (count($request->cart_items)) {
            foreach ($request->cart_items as $item) {
                array_push($userCart, [
                    'created_by' => $request->created_by,
                    'products_id' => $item['id'],
                    'qnt' => $item['qnt'],
                    'price' => Product::where('id', $item['id'])->pluck('price')->first(),
                ]);
            }
            Cart::insert($userCart);
        }


        return response()->json([
            'success' => true,
            'message' => 'Cart Updated Sucessfull.',
        ], 200);
    }
}
