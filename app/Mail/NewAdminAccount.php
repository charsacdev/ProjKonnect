<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewAdminAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$useremail,$role;

    public function __construct($username,$useremail,$role)
    {
        
        $this->useremail = $useremail;
        $this->username=$username;
        $this->role=$role;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Projkonnect New Admin Account',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.new-admin-account',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
