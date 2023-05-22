<?php

namespace App\Http\Controllers;

use App\Models\Peer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function call(Request $request)
    {

//    $chat = \App\Models\Chat::where("id", $request->chat_id)->first();
//    $users = $chat->users;
//
//    foreach ($users as $user)
//    {
//        $tempUsers = $users->filter(function ($tempUser) use ($user){
//            return $user->id != $tempUser->id;
//        });
//
//        $chatName = $tempUsers->pluck("name")->implode(', ');
//
//    }
        event(new \App\Events\Peer($request->chat_id));
        return view('chat.call', ["chat_id" => $request->chat_id]);
    }

    public function answer(string $chat_id)
    {
        return view('chat.call', ["chat_id" => $chat_id]);
    }

    public function declineOtherPeer(string $chat_id)
    {
        // melding sturen naar persoon die gesprek gestart is

        return redirect()->back();
    }

    public function stopCall()
    {
        // JS
        // Voor iedereen?
        return redirect()->route('chat');
    }

}
