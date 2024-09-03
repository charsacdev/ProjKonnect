<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$useremail;

    public function __construct($username,$useremail)
    {
        
        $this->useremail = $useremail;
        $this->username=$username;
    }


 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ProjKonnect Contact Us Notification',
        );
    }


    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-us',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
