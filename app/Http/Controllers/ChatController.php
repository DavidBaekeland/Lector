<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;


class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        //$this->authorizeResource(Chat::class, 'chat');
    }

    public function index()
    {
        JavaScript::put(["urlChat" => url('chat'), "userId" => auth()->user()->id, "userName" => auth()->user()->first_name, 'chatId' => auth()->user()->latestChat()->id]);
        return view('chat.index');
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
