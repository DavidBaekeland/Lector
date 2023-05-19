<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Peer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $peer_id;

    public $user_id;

    public $chat_id;

    public $chat_name;


    /**
     * Create a new event instance.
     */
    public function __construct($peer_id, $chat_id, $chat_name)
    {
        $this->peer_id = $peer_id;
        $this->user_id = auth()->user()->id;
        $this->chat_id = $chat_id;
        $this->chat_name = $chat_name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("chat.{$this->chat_id}"),
        ];
    }
}
