<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserBlockEmail extends Mailable
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
            subject: 'Your Projkonnect Account Deactivation',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.user-block-email',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}