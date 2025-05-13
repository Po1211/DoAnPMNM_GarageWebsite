<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Pass appointment data into the email
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Email subject and envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận đặt lịch thành công'
        );
    }

    /**
     * The Blade view and data passed to it
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.appointment_confirmation', // your view file
            with: ['appointment' => $this->appointment]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
