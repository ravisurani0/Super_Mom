<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use PDF;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="orders/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Details</a>';
                    // <a href="delete_orders/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete User" class="delete btn btn-danger btn btn-danger btn-sm mr-3"><i class="icon-sm fas fa-trash"></i>Delete</a>
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Orders.list');
    }

    public function create()
    {
        return view('admin.Orders.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'company_name' => 'required|string|unique:users',
            'mobile_no' => 'required|string|unique:users',
            'whatsapp_no' => 'required|string|unique:users',
            'address' => 'required|string',
            'email' => 'required|string|unique:users',
            'role' => 'nullable',
            'seller_id' => 'required|string|unique:users',
            'requested_seller_id' => 'nullable',
            'discount' => 'nullable',
            'commission' => 'nullable',
            'account_balance' => 'nullable',
            'user_status' => 'nullable',
            'password' => 'nullable',
        ]);

        $users = Order::create([
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'whatsapp_no' => $request->whatsapp_no,
            'address' => $request->address,
            'email' => $request->email,
            'role' => 0,
            'seller_id' => $request->seller_id,
            'requested_seller_id' => $request->requested_seller_id,
            'discount' => $request->discount,
            'commission' => $request->commission,
            'account_balance' => $request->account_balance,
            'user_status' => $request->user_status,
            'password' => '$2y$10$E4ihg/xn8R3wdQ9je6okjeUKSOTtp8EESVZOo6nfHCJDobDgn00qS',
        ]);

        return redirect('admin/users');
    }

    public function show(Order $order)
    {
        $fileName = 'PO_' . $order->id . '_' . date('YmdHis', strtotime($order->created_at)) . '.pdf';

        $file = storage_path('app/public/orders/') . $fileName;

        if (isset($order->order_pdf) && $order->order_pdf != '' && file_exists($file)) {

            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->file($file, $headers);
        } else {
            $orderTaxes = [];
            foreach ($order->orderItems as $item) {

                if (array_key_exists($item->tax_rate, $orderTaxes)) {
                    $orderTaxes[$item->tax_rate] += $item->tax_amount;
                } else {
                    $orderTaxes[$item->tax_rate] = $item->tax_amount;
                }
            }
            $nowTime = Carbon::now();
            $pdf = PDF::loadView('admin.Orders.show', compact('order', 'orderTaxes'))->setPaper('a4');

            $order->update([
                'order_pdf' => $fileName
            ]);

            $content = $pdf->download()->getOriginalContent();
            Storage::put('public/orders/' . $fileName, $content);

            return  $pdf->stream($fileName);
            return view('admin.Orders.show', compact('order', 'orderTaxes'));
        }
    }

    public function edit(Order $order)
    {
        return view('admin.Orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'company_name' => 'required|string',
            'mobile_no' => 'required|string',
            'whatsapp_no' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'role' => 'nullable',
            'seller_id' => 'required|string',
            'discount' => 'nullable',
            'commission' => 'nullable',
            'account_balance' => 'nullable',
            'user_status' => 'nullable',
            'password' => 'nullable',
        ]);


        $order = $order->update([
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'whatsapp_no' => $request->whatsapp_no,
            'address' => $request->address,
            'email' => $request->email,
            'role' => 0,
            'seller_id' => $request->seller_id,
            'discount' => $request->discount,
            'commission' => $request->commission,
            'account_balance' => $request->account_balance,
            'user_status' => $request->user_status,
        ]);
        return redirect('admin/orders');
    }

    public function destroy(Order $order, $order_id)
    {


        return redirect(route('orders.index'))->with(['success' => 'Order Deleted successfully']);
    }
}
