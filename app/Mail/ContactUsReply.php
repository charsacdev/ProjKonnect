<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsReply extends Mailable
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
            subject: 'ProjKonnect Message Reply Notification',
        );
    }


    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-us-reply',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
