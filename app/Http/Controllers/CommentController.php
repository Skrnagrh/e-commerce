<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function add_comment(Request $request)
    {
        if (Auth::id()) {


            $comment = new Comment;
            // $product = Product::all();

            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->product_id = $request->productid;
            $comment->comment = $request->comment;

            $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);
            
            if ($request->hasfile('filename')) {
                
                foreach ($request->file('filename') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move(public_path() . '/comment-images/', $name);
                    $data[] = $name;
                }
            }
            $comment->filename = json_encode($data);
            $comment->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function delete_comment($id)
    {
        $comment =  Comment::find($id);
        $comment->delete();
        return redirect()->back(); 
    }
}
