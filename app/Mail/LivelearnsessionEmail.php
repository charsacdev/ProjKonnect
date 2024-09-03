<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LivelearnsessionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$title,$description,$date,$price;

    public function __construct($username,$title,$description,$date,$price)
    {
        
        $this->username=$username;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->price = $price;
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Livelearn Registration Notification',
        );
    }


    public function content(): Content
    {
        return new Content(
            markdown: 'mail.livelearnsession-email',
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
