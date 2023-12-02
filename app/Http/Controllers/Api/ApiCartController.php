<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    public function show(Request $request)
    {
        $cart = Cart::where('created_by', auth()->user()->id)->with('product')->get();

        if (!$cart) {
            return response()->json([
                'message' => 'User cart is empty.',
                'error' => ['User cart is empty.'],
                'data' => []
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Cart Details',
            'data' => [
                'cartProductCount' => count($cart),
                'cartItems' => $cart,
            ],
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_items' => 'required|array',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
                'data' => []
            ], 400);
        }

        if (!auth()->user()->user_status) {

            return response()->json([
                'message' => 'Seller Id is not approved.',
                'error' => ['Seller Id is not approved.'],
                'data' => []
            ], 403);
        }
        $user_id = auth()->user()->id;

        $userCartItems = Cart::where('created_by', $user_id)->pluck('products_id')->toArray();

        $userCart = [];
        foreach ($request->cart_items as $item) {

            if (!in_array($item['product_id'], $userCartItems)) {
                array_push($userCart, [
                    'created_by' => $user_id,
                    'products_id' => $item['product_id'],
                    'qnt' => $item['qnt'],
                    'price' => Product::where('id', $item['product_id'])->pluck('price')->first(),
                ]);
            }
        }
        Cart::insert($userCart);

        return response()->json([
            'success' => true,
            'message' => 'Cart Created Successfull.',
        ], 200);
    }

    public function update(Request $request,)
    {
        $validator = Validator::make($request->all(), [
            'cart_items' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
                'data' => []
            ], 400);
        }

        if (!auth()->user()->user_status) {

            return response()->json([
                'message' => 'Seller Id is not approved.',
                'error' => ['Seller Id is not approved.'],
                'data' => []
            ], 403);
        }

        $user_id = auth()->user()->id;

        Cart::where('created_by', $user_id)->delete();

        $userCart = [];
        if (count($request->cart_items)) {
            foreach ($request->cart_items as $item) {
                array_push($userCart, [
                    'created_by' => $user_id,
                    'products_id' => $item['product_id'],
                    'qnt' => $item['qnt'],
                    'price' => Product::where('id', $item['product_id'])->pluck('price')->first(),
                ]);
            }
            Cart::insert($userCart);
        }


        return response()->json([
            'success' => true,
            'message' => 'Cart Updated Successfull.',
        ], 200);
    }
}
