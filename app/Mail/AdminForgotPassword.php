<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $email,$auth,$username;

    public function __construct($email,$auth,$username)
    {
        $this->email = $email;
        $this->auth = $auth;
        $this->username = $username;
        
    }


   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ProjKonnect Admin Password Reset',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admin-forgot-password',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
