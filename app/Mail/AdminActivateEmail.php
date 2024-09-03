<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminActivateEmail extends Mailable
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
            subject: 'Projkonnect Admin Account Activation',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admin-activate-email',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
