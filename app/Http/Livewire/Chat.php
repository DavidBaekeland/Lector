<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Role;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use Livewire\Component;

class Chat extends Component
{
    public ?\App\Models\Chat $chatLivewire;

    public $authUserChats;

    public function mount()
    {
        $this->chatLivewire = auth()->user()->latestChat();

        $this->authUserChats = auth()->user()->chats->sortByDesc('updated_at');

        if ($this->chatLivewire)
        {
            JavaScript::put(["urlChat" => url('chat'), "userId" => auth()->user()->id, "userName" => auth()->user()->first_name, 'chatId' => $this->chatLivewire->id]);
        }else
        {
            JavaScript::put(["urlChat" => url('chat'), "userId" => auth()->user()->id, "userName" => auth()->user()->first_name, 'chatId' => null]);
        }
    }

    public function notifyMessage()
    {
        $this->dispatchBrowserEvent('newMessage');
        $this->authUserChats = auth()->user()->chats->sortByDesc('updated_at');
    }


    public function chat(\App\Models\Chat $chat)
    {
        JavaScript::put(["urlChat" => url('chat'), "userId" => auth()->user()->id, "userName" => auth()->user()->first_name, 'chatId' => $chat->id]);

        $this->chatLivewire = $chat;
        $this->dispatchBrowserEvent('newMessage');

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
