<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Bulk_Email extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$useremail,$answermessage;

    public function __construct($username,$useremail,$answermessage)
    {
        
        $this->useremail = $useremail;
        $this->username=$username;
        $this->answermessage=$answermessage;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Broadcast Email Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.bulk-email',
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
