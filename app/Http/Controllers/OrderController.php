<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    public function order()
    {
        $user =  Auth::user();
        $userid = $user->id;
        
        $data = Cart::where('user_id', '=', $userid)->get();
        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'We have Received You Order. we will connect with you soon');
    }
}
