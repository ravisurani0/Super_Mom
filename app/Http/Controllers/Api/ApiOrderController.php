<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Cms;
use App\Model\Order;
use App\Model\OrderItems;
use App\Model\Product;
use Exception;
use Hamcrest\Core\Every;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

use Illuminate\Validation\Rule;

class ApiOrderController extends Controller
{

    public function userOrders(Request $request)
    {
        $orderQuery = Order::where('created_by', auth()->user()->id)->withOrderItemsCount()->with('orderItems');


        if (isset($request->startDate)) {
            $orderQuery = $orderQuery->where('created_at', '>=', $request->startDate);
        }
        if (isset($request->endDate)) {
            $orderQuery = $orderQuery->where('created_at', '<=', $request->endDate);
        }
        if (isset($request->status)) {
            $orderQuery = $orderQuery->where('status', $request->status ? 1 : 0);
        }
        if (isset($request->month)) {
            $orderQuery = $orderQuery->whereMonth('created_at', $request->month);
        }

        if (isset($request->year)) {
            $orderQuery = $orderQuery->whereYear('created_at',  $request->year);
        }
        $orderData =  $orderQuery->get();

        return response()->json([
            'success' => true,
            'message' => 'User Orders Details',
            'data' => [
                'orderDetails' => $orderData,
                'orderCount' => count($orderData),
            ],
        ], 200);
    }

    public function show(Order $order, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Cart Details',
            'data' => [
                'orderDetails' => Order::where('id', $id)->get()->first(),
                'OrderProducts' => OrderItems::where('order_id', $id)->with('product', 'product.imageGallery')->get(),
                'itemCount' => OrderItems::where('order_id', $id)->count(),
            ],
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transporter' => 'required',
            'order_items' => 'required|array',
            'order_items.*.product_id' => 'required|integer',
            'order_items.*.qnt' => 'required|integer',
            // 'order_subtotal' => 'required|numeric',
            // 'tax_rates' => 'required|numeric',
            // 'order_total' => 'required|numeric',
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

        DB::beginTransaction();
        try {
            $cartItems = Cart::where('created_by', $user_id)->get();

            if (count($request->order_items)) {

                $order = Order::create([
                    'created_by' => $user_id,
                    'transporter' =>  $request->transporter,
                ]);

                $orderItems = [];
                $totalOrderAmount = 0;
                $totalTaxableAmount = 0;

                $isOrderItemsCorrent = true;

                foreach ($request->order_items as $item) {

                    if ((isset($item['product_id']) && $item['product_id'] != '') && (isset($item['qnt']) && $item['qnt'] != '')) {
                        $product =  Product::where('id', $item['product_id'])->first();

                        // Calculate Product Total Tax
                        $itemTax = (($product->price * $item['qnt']) * $product->gst_rate) / 100;

                        // Add Order Total Amount
                        $totalOrderAmount += ((float)$product->price * $item['qnt']);

                        // Add Order Total Taxable Amount
                        $totalTaxableAmount += $itemTax;

                        array_push($orderItems, [
                            'order_id' => $order->id,
                            'products_id' => $item['product_id'],
                            'qnt' => $item['qnt'],
                            'price' => $product->price,
                            'tax_rate' => $product->gst_rate,
                            'tax_amount' => $itemTax,
                        ]);
                    } else {
                        $isOrderItemsCorrent = false;
                        break;
                    }
                }
                if (!$isOrderItemsCorrent) {
                    Order::where('id', $order->id)->delete();
                    return response()->json([
                        'message' => 'Invalid order_items Array.',
                        'error' => ['Invalid order_items Array.'],
                        'data' => []
                    ], 403);
                }

                $discountAmount = $totalOrderAmount - (($totalOrderAmount * $order->user->discount) / 100);

                OrderItems::insert($orderItems);
                $order['order_subtotal'] = $totalOrderAmount;
                $order['discount'] = $order->user->discount;
                $order['tax_amount'] = $totalTaxableAmount;
                $order['order_total'] = $discountAmount;
                $order->save();


                $order = Order::where('id', $order->id)->get()->first();
                $fileName = 'PO_' . $order->id . '_' . date('YmdHis', strtotime($order->created_at)) . '.pdf';

                $file = storage_path('app/public/orders/') . $fileName;


                $orderTaxes = [];
                foreach ($order->orderItems as $item) {
                    if (array_key_exists($item->tax_rate, $orderTaxes)) {
                        $orderTaxes[$item->tax_rate] += $item->tax_amount;
                    } else {
                        $orderTaxes[$item->tax_rate] = $item->tax_amount;
                    }
                }

                $orderItems =  orderItems::where('order_id', $order->id)->get();
                $appLogo =  Cms::where('cms_key', 'app_logo')->pluck('cms_value')->first();


                $pdf = PDF::loadView('admin.Orders.show', compact('order', 'orderTaxes', 'orderItems', 'appLogo'))->setPaper('a4');
                $content = $pdf->download();
                Storage::put('public/orders/' . $fileName, $content);


                $order->update([
                    'order_pdf' => $fileName
                ]);

                $order = Order::where('id', $order->id)->get()->first();

                // Cart::where('created_by', $user_id)->delete();

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Order placeed successfully',
                    'data' => ['order' => $order, 'products' => OrderItems::where('order_id', $order->id)->with('product')->get()]
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Order Items is empty.',
                    'data' => ['Order Items is empty.']
                ], 400);
            }
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => $e->getMessage(),
                'error' =>  $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
}
