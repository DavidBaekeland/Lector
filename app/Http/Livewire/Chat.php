<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Role;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use Livewire\Component;

class Chat extends Component
{
    public \App\Models\Chat $chatLivewire;
    public $messageLivewire;


    public function notifyMessage()
    {
        $this->dispatchBrowserEvent('newMessage');
    }


    public function chat(\App\Models\Chat $chat)
    {
        JavaScript::put(["urlChat" => url('chat'), "userId" => auth()->user()->id, "userName" => auth()->user()->first_name, 'chat' => $chat->id]);

        $this->chatLivewire = $chat;
    }

    public function getListeners()
    {
        $chatsEcho = [];

        foreach (auth()->user()->chats as $chat)
        {
            $chatsEcho["echo-private:chat.{$chat->id},Chat"] = 'notifyMessage';
        }

        return $chatsEcho;
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
