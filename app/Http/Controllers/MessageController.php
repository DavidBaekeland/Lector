<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Notifications\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        $chat = \App\Models\Chat::find($request->chat_id);

        if (! Gate::allows('store_message', $chat)) {
            return response()->json("Your are not allowed to send a message in this chat.", 403);
        }

        $message = Message::create([
            "message" => $request->message,
            "chat_id" => $request->chat_id,
            "user_id" => auth()->user()->id
        ]);

        $chat->updated_at = now();
        $chat->save();

        event(new \App\Events\Chat($message));

        foreach ($chat->users as $user)
        {
            Notification::send($user, new NewMessage($message, $chat));
        }

        return response()->json("succes");
    }
}
