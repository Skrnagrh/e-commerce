<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Questreply;

class QuestreplyController extends Controller
{
    public function question(Request $request)
    {
        if (Auth::id()) {
            $question = new question;
            $question->name = Auth::user()->name;
            $question->user_id = Auth::user()->id;
            $question->product_id = $request->productid;
            $question->question = $request->question;

            $question->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function delete_question($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->back(); 
    }

    public function questreply(Request $request)
    {
        if(Auth::id())
        {
            $questreply = new Questreply;
            $questreply->name = Auth::user()->name;
            $questreply->user_id = Auth::user()->id;
            $questreply->question_id = $request->questId;
            $questreply->questreply = $request->questreply;
            $questreply->save();
            return redirect()->back();
            
        }else{
            return redirect('login');
        }
    }

    public function delete_questreply($id)
    {
        $questreply =  Questreply::find($id);
        $questreply->delete();
        return redirect()->back(); 
    }
}
