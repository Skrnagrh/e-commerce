<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::id()) {
            $carts = Cart::all();
            $product = Product::all();
            return view('home.index', compact('product', 'carts'), [
                // $id = Auth::user()->id,
                // 'total_product' => Cart::where('user_id', '=', $id)->get()->count(),
                    "title" => 'Jual Beli Sayur'
            ]);
        } else {
            $carts = Cart::get();
            $product = Product::all();
            return view('home.index', compact('product','carts'), [
                "title" => 'Jual Beli Sayur'
            ]);
        }
    }

    public function home()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            $product = Product::all();
            return view('admin.index', compact('product'), [
                'order' => Order::all(),
                "title" => 'Toko'
            ]);
        } else {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $product = Product::all();
            return view('home.index', compact('product', 'carts'), [
                // $id = Auth::user()->id,
                // 'total_product' => Cart::where('user_id', '=', $id)->get()->count(),
                "title" => 'Jual Beli Sayur'
            ]);
        }
    }
}
