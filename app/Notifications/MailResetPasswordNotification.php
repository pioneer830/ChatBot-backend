<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;
    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
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
    public function toMail( $notifiable ) {
        $link = url( "/password/reset/" . $this->token );

        $message = ( new MailMessage )
            ->markdown('emails.reset-password')
            ->subject( 'Reset your password');
            //->line('You are receiving this email because we received a password reset request for your account.')
            //->action('Reset Password', url('password/reset', $this->token))
           // ->line('If you did not request a password reset, no further action is required.');

        $message->viewData['link'] = $link;

        return $message;
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
