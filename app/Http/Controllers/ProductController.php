<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'products' => Product::paginate(2)->withQueryString(),
            'order' => Order::all(),
            "title" => 'Product '
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'category' => Category::all(),
            'order' => Order::all(),
            "title" => 'Product '
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|max:255',
            'quantity' => 'required|max:255',
            'price' => 'required|max:255',
            'discount_price' => 'required|max:255',
            'image' => 'image|file|max:10024',
        ]);
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        Product::create($validatedData);
        return redirect('/admin/product')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'product' => $product,
            'order' => Order::all(),
            "title" => 'Product '
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => Category::all(),
            'order' => Order::all(),
            "title" => 'Product '
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|max:255',
            'quantity' => 'required|max:255',
            'price' => 'required|max:255',
            'discount_price' => 'required|max:255',
            'image' => 'image|file|max:10024',
        ];

        $validatedData = $request->validate($rules);

         if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        
        Product::where('id', $product->id)
            ->update($validatedData);
        return redirect('/admin/product')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('/admin/product')->with('success', 'New post has been deleted!');
    }
}
