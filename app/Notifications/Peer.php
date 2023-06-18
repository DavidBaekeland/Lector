<?php

namespace App\Notifications;

use App\Models\Chat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Peer extends Notification
{
    use Queueable;

    public $user_id;

    public ?string $chatName;
    private string $urlChatAccept;
    private string $urlChatDecline;
    private Chat $chat;


    /**
     * Create a new event instance.
     */
    public function __construct(Chat $chat, ?String $chatName = null)
    {
        $this->chat = $chat;
        $this->chatName = $chatName;

        $this->urlChatAccept = route('call.peer', $this->chat->id);
        $this->urlChatDecline = route('call.decline', $this->chat->id);
        $this->audioLink = asset('storage/soundEffects/call.mp3');
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     */
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'chat_id' => $this->chat->id,
            'chat_name' => ($this->chatName) ?: $this->chat->name,
            'url_chat_accept' => $this->urlChatAccept,
            'url_chat_decline' => $this->urlChatDecline,
            'audio_link' => $this->audioLink

        ]);
    }
}
