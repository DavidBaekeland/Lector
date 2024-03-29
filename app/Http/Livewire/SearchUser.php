<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class SearchUser extends Component
{
    public string $user;

    public $selectedUsers;

    public $messageInput;

    public $choiceUsers;

    public function selectUser($user)
    {
        $this->selectedUsers[] = $user;
        $this->user = "";
        $this->choiceUsers = "";
    }

    public function updatedUser()
    {
        if ($this->user == null)
        {
            $this->choiceUsers = null;
        } else
        {
            $this->choiceUsers = User::where("first_name", "like", $this->user.'%')->where("id", "!=", auth()->user()->id)->get();
        }
    }

    public function submit()
    {
        $chat = \App\Models\Chat::create();

        $chat->users()->sync([...$this->selectedUsers, auth()->user()->id]);


        $message = Message::create([
            "message" => $this->messageInput,
            "chat_id" => $chat->id,
            "user_id" => auth()->user()->id
        ]);

        $users = $chat->users;

        foreach ($users as $user)
        {
            Notification::send($user, new NewMessage($message, $chat));
        }

        return redirect()->route('chat');
    }

    public function render()
    {
        return view('livewire.search-user');
    }
}
