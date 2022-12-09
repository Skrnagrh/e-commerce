<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Cart;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $carts = Cart::all();
        return view('layouts.guest', compact('carts'));
    }
}
