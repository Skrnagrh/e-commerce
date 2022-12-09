<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Question;
use App\Models\Reply;
use App\Models\Questreply;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function product_details($id)
    {
        if (Auth::id()) {
            // $cart = Cart::all();
            $product = Product::find($id);
            $comment = Comment::orderby('id', 'desc')->get();
            $reply = Reply::all();
            $question = Question::orderby('id', 'desc')->get();
            $questreply = Questreply::all();
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('home.product_detail', compact('cart', 'product', 'comment', 'reply', 'question', 'questreply'),[
                "title" => ' ' . $product->title,
                "carts" => Cart::all()
            ]);
        } else {
            $cart = Cart::all();
            $product = Product::find($id);
            $comment = Comment::orderby('id', 'desc')->get();
            $reply = Reply::all();
            $question = Question::orderby('id', 'desc')->get();
            $questreply = Questreply::all();
            return view('home.product_detail', compact('cart', 'product', 'comment', 'reply', 'question', 'questreply'),[
                "title" => ' ' . $product->title
            ]);
        }
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if ($product->discount_price != null) {
                if ($total = (1- $product->discount_price / 100) * $product->price);
                // if ($total = $product->price - $total_disc);

                $cart->price =  number_format($total * $request->quantity,3,'.','.');
            } else {
                $cart->price = number_format($product->price * $request->quantity,3,'.','.');
            }
            

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;;

            $cart->save();
            return redirect()->back()->with('success', 'New post has been added!');
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            $product = Product::all();
            return view('home.show_cart', compact('cart', 'product'),[
                "title" => 'Keranjang',
                "carts" => Cart::all()
            ]);
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart =  Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
