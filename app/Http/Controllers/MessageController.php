<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.compose');
    }

    public function create(Request $request)
    {
        $message = new Message();

        $message->sender_id = Auth::user()->id;
        $message->content = $request->message;

        $message->save();

        return redirect('/message');
    }
}
