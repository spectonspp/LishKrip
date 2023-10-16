<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', Order::STATUS['0'])
            ->whereNotNull('slip')->get();
        return view('backend.transaction', compact('orders'));
    }
    public function approve(Order $order)
    {
        $order_details = OrderDetail::where(['order_id' => $order->order_id])->get();
        foreach ($order_details as $order_detail) {
            $quantity = Product::where(['product_id' => $order_detail->product_id])->first('product_quantity')->product_quantity;
            Product::where(['product_id' => $order_detail->product_id])->update([
                'product_quantity' => $quantity - $order_detail->quantity
            ]);
        }
        $order->update([
            'status' => 'approve'
        ]);
        return back()->with('success', 'success');
    }
    public function reject(Order $order)
    {
        $order->update([
            'status' => 'reject'
        ]);
        return back()->with('success', 'success');
    }
    public function cancel(Order $order)
    {
        $order->update([
            'status' => 'cancel'
        ]);
        return back()->with('success', 'success');
    }
}
