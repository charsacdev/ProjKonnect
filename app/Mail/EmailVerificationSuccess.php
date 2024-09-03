<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerificationSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Projkonnect Email Verification Success',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.email-verification-success',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
