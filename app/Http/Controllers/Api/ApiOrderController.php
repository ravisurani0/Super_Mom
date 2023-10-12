<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderItems;
use App\Model\Product;
use Hamcrest\Core\Every;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'transporter' => 'required',
            // 'order_subtotal' => 'required|numeric',
            // 'tax_rates' => 'required|numeric',
            // 'order_total' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response([
                'sucess' => false,
                'message' => $validator->errors()->first(),
                'error' => $validator->messages(),
            ], 200);
        }

        $order = Order::create([
            'created_by' => $request->user_id,
            'transporter' =>  $request->transporter,
        ]);

        $cartItems = Cart::where('created_by', $request->user_id)->get();

        $orderItems = [];
        $totalOrderAmount = 0;
        $totalTaxableAmount = 0;
        foreach ($cartItems as $item) {

            // Calculate Product Total Tax
            $itemTax = (($item->product->price * $item['qnt']) * $item->product->gst_rate) / 100;

            // Add Order Total Amount
            $totalOrderAmount += ((float)$item->product->price * $item['qnt']);

            // Add Order Total Taxable Amount
            $totalTaxableAmount += $itemTax;

            array_push($orderItems, [
                'order_id' => $order->id,
                'products_id' => $item['products_id'],
                'qnt' => $item['qnt'],
                'price' => $item['price'],
                'tax_rate' => $item->product->gst_rate,
                'tax_amount' => $itemTax,
            ]);
        }

        $discountAmount = $totalOrderAmount - (($totalOrderAmount * $order->user->discount) / 100);

        OrderItems::insert($orderItems);
        $order['order_subtotal'] = $totalOrderAmount;
        $order['discount'] = $order->user->discount;
        $order['tax_amount'] = $totalTaxableAmount;
        $order['order_total'] = $discountAmount;
        $order->save();

        // Cart::where('created_by', $request->user_id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order placeed successfully',
            'data' => ['order' => $order, 'products' => OrderItems::where('order_id', $order->id)->with('product')->get()]
        ], 200);
    }

    public function show(Order $order, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Cart Details',
            'data' => [
                'orderDetails' => Order::where('id', $id)->get()->first(),
                'products' => OrderItems::where('order_id', $id)->with('orderItems.product')->get()
            ],
        ], 200);
    }

    public function userOrders(Request $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'User Orders Details',
            'data' => [
                'orderDetails' => Order::where('created_by', $id)->with('orderItems.product')->get(),
            ],
        ], 200);
    }
}
