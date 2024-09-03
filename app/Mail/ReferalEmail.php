<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReferalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$email,$refname;

    public function __construct($name,$email,$refname)
    {
        
        $this->name=$name;
        $this->email = $email;
        $this->refname = $refname;
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Referal Notification',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.referal-email',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
