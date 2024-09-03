<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRegistration extends Mailable
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
            subject: 'ProjKonnect Account Registration',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.new-registration',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
