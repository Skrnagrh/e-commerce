<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(Request $request)
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            $id = Auth::user()->id;
            $toko = Toko::where('user_id', '=', $id)->get();
            return view('toko.home', compact('toko'));
        } else {
            return view('toko.index',[
                'user' => User::all()
            ]);
        }
    }

    public function add_toko(Request $request)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $toko = new Toko;

            $toko->email = $user->email;
            $toko->user_id = $user->id;
            $toko->phone = $user->phone;
            
            $toko->name = $request->name;
            $toko->address = $request->address;
            $toko->infotoko = $request->infotoko;
            $toko->profile = $request->profile;
            $toko->usertoko = $request->usertoko;

            $toko->save();
            
            return view('toko.home');
        } else {
            return redirect('login');
        }
    }
}
