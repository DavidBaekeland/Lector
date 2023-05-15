<?php

namespace App\Http\Controllers;

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
        //$this->authorizeResource(Chat::class, 'chat');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
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

        event(new \App\Events\Chat($message));

        $users = $chat->users;

        foreach ($users as $user)
        {
            $tempUsers = $users->filter(function ($tempUser) use ($user){
                return $user->id != $tempUser->id;
            });

            $chatName = $tempUsers->pluck("name")->implode(', ');

            Notification::send($user, new NewMessage($message, $chat, $chatName));
        }

        return response()->json("succes");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
