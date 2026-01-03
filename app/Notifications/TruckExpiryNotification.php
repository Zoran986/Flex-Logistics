<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Filament\Notifications\Notification;
class TruckExpiryNotification extends Notification
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
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable): array
    {
        return [
            'truck_id' => $this->truck->id,
            'plate_number' => $this->truck->plate_number,
            'expire_date' => $this->truck->expire_date,
            'message' => "Truck {$this->truck->plate_number} expires in one month.",
        ];
    }
        
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Truck Expiry Reminder')
            ->line("Truck {$this->truck->plate_number} expires on {$this->truck->expire_date}.")
            ->line('Please take action.');
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
