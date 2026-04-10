<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $book;

    // Passiamo il libro all'email quando la creiamo
    public function __construct($book)
    {
        $this->book = $book;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Conferma Prenotazione: ' . $this->book->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reservation',
             with: [
                'bookTitle' => $this->book->title,
                'reservationDate' => now()->toFormattedDateString(),
            ],
        );
    }
}
