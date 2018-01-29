<?php

namespace App\Http\Controllers;

use Auth;
use App\Message;
use App\Events\MessagePosted;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function sendMessage()
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => request()->get('message')
        ]);

        broadcast(new MessagePosted($message, $user))->toOthers();

        return ['status' => 'OK'];
    }

    public function getMessages()
    {
        return Message::with('user')->get();
    }
}
