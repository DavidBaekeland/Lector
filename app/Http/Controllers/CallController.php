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
        $peer = Peer::create(["uuid" => Str::uuid()->toString(), "user_id" => auth()->user()->id]);

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
        event(new \App\Events\Peer($peer->uuid, $request->chat_id, "sdqfqsdf"));

        return view('chat.call', ["peerUuid" => $peer->uuid, "otherPeerId" => false]);
    }

    public function answer(string $otherPeerId)
    {
        return view('chat.call', ["peerUuid" => false, "otherPeerId" => $otherPeerId]);
    }

    public function declineOtherPeer(string $otherPeerId)
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
