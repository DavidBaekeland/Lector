<?php

namespace App\Notifications;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;

    public Message $message;
    public Chat $chat;
    public ?string $chatName;


    /**
     * Create a new notification instance.
     */
    public function __construct(Message $message, Chat $chat, ?String $chatName = null)
    {
        $this->message = $message;
        $this->chat = $chat;
        $this->chatName = $chatName;
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
            'chatName' => ($this->chat->name) ? $this->chat->name : $this->chatName,
            'message' => $this->message->message,
        ]);
    }
}
