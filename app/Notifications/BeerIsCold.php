<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BeerIsCold extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->error()
                    ->subject("Cerveja Gelada!")
                    ->greeting("Olá {$notifiable->name}")
                    ->lineIf($notifiable->id > 10, "Olá usuário novo")
                    ->line(" sua cerveja acabou de ficar geladinha")
                    ->action('Resgatar cerveja', url('/'))
                    ->line('Obrigado por comprar com a gente!')
                    ->salutation("Obrigado!")
                    // ->tag("invoice")
                    // ->attach("/patch/to/file") Caminho absoluto sempre
                    // ->attachMany(["/patch/to/file","/patch/to/file2"])
                    ;
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            "userId" => $notifiable->id,
            "name" => $notifiable->name
        ];
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
