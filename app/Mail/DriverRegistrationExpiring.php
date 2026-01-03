<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DriverRegistrationExpiring extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    /**
     * Get the message envelope.
     */
    public function build()
{
    return $this->subject('Driver Registration Expiring Soon')
                ->view('emails.driver-registration-expiring');
}
    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Driver Registration Expiring',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
