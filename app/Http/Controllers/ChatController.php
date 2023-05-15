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
        $chatId = null;
        if (auth()->user()->latestChat())
        {
            $chatId = auth()->user()->latestChat()->id;
        }
        JavaScript::put(["urlChat" => url('chat'), "userId" => auth()->user()->id, "userName" => auth()->user()->first_name, 'chatId' => $chatId]);
        return view('chat.index');
    }

    public function create()
    {
        return view('chat.create');
    }

    public function store(Request $request)
    {
        //
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
