<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected string $url, protected string $firstName)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Reset Wachtwoord Notificatie')
                    ->greeting('Beste '.$this->firstName)
                    ->line('U ontvangt deze e-mail, omdat we een verzoek hebben ontvangen om uw wachtwoord opnieuw in te stellen.')
                    ->action('Reset Wachtwoord', $this->url)
                    ->line('Deze wachtwoord reset link zal vervallen binnen de 60 minuten.')
                    ->line('Indien u geen verzoek heeft ingediend voor het veranderen van uw wachtwoord, dan moet u geen verdere actie ondernemen.')
                    ->salutation('Met vriendelijke groetjes');
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
}
