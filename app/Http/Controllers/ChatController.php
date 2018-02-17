<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Conversation;
use App\Events\MessagePosted;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => request()->get('message')
        ]);

        broadcast(new MessagePosted($message, $user))->toOthers();

        return ['status' => 'OK'];
    }

    public function getConversations()
    {
        $user = User::with('conversations')->find(Auth::user()->id);
        return $user->conversations;
    }

    public function getConversationUsers($conversation_id)
    {
        return Conversation::find($conversation_id)->users;
    }

    public function getMessages()
    {
        return Message::with('user')->get();
    }

    public function getChatMessages($conversation_id)
    {
        return Conversation::find($conversation_id)->messages;
    }
}
