<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
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
        JavaScript::put(["urlChat" => url('chat'), "user" => auth()->user()->id]);

        return view('chat.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $message = Message::create([
            "message" => $request->message,
            "chat_id" => 1,
            "user_id" => auth()->user()->id
        ]);

        event(new \App\Events\Message($message));

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
