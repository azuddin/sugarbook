<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Http\Requests;

class MessageController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $message = auth()
            ->user()
            ->messages()
            ->where('sender_id', $user_id)
            ->orWhere('receiver_id', $user_id)
            ->get();

        return $message;
    }

    public function store(Request $request)
    {
        $message = Message::create([
            'sender_id'   => $request->input('sender_id'),
            'receiver_id' => $request->input('receiver_id'),
            'message'     => $request->input('message'),
        ]);

        broadcast(new MessageSent($message));

        return $message->fresh();
    }
}
