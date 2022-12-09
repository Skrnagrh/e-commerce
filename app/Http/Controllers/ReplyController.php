<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new Reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->save();
            return redirect()->back();
            
        }else{
            return redirect('login');
        }
    }

    public function delete_reply($id)
    {
        $reply =  Reply::find($id);
        $reply->delete();
        return redirect()->back(); 
    }
}
