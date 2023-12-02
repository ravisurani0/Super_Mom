<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderItems;
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
                    // <a href="delete-orders/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete User" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>
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

    public function show(Order $order)
    {
        return view('admin.Orders.edit', compact('order'));
    }

    public function orderPdf(Request $request, $order_id)
    {
        $order = Order::where('id', $order_id)->get()->first();
        $fileName = 'PO_' . $order->id . '_' . date('YmdHis', strtotime($order->created_at)) . '.pdf';

        $file = storage_path('app/public/orders/') . $fileName;

        if (isset($order->order_pdf) && $order->order_pdf != '' && file_exists($file)) {

            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->file($file, $headers);
        } else {

            $orderItems = OrderItems::where('order_id', $order->id)->withTrashed();
            $orderTaxes = [];
            foreach ($orderItems as $item) {
                if (array_key_exists($item->tax_rate, $orderTaxes)) {
                    $orderTaxes[$item->tax_rate] += $item->tax_amount;
                } else {
                    $orderTaxes[$item->tax_rate] = $item->tax_amount;
                }
            }

            $pdf = PDF::loadView('admin.Orders.show', compact('order', 'orderItems', 'orderTaxes'))->setPaper('a4');

            $content = $pdf->download();

            Storage::put('public/orders/' . $fileName, $content);
            $order->update([
                'order_pdf' => $fileName
            ]);

            return  $pdf->stream($fileName);
            return view('admin.Orders.show', compact('order', 'orderTaxes'));
        }
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'orderItems' => 'nullable',
        ]);

        OrderItems::where('order_id', $order->id)->update(['status' => 0]);

        if (isset($request->orderItems)) {
            OrderItems::whereIn('id', $request->orderItems)->update(['status' => 1]);
        }
        if (OrderItems::where([['order_id', $order->id], ['status', 0]])->get()->count() == 0) {
            $order->update(['status' => true]);
        } else {
            $order->update(['status' => false]);
        }

        return redirect('admin/orders/' . $order->id);
    }

    // public function destroy(Order $order, $order_id)
    // {
    //     return redirect(route('orders.index'))->with(['success' => 'Order Deleted successfully']);
    // }
}
