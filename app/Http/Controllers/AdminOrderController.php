<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $total_revenue = 0;
        foreach ($order as $order) {
            $total_revenue = $total_revenue + $order->price;
        }
        return view('admin.order.index', compact('total_revenue'),[
            'orders' => Order::paginate(10)->withQueryString(),
            'order' => Order::all()
        ]);
    }


    public function edit($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Selesai';

        $order->save();

        return redirect()->back();
        // return view('admin.order.edit');
    }
}
