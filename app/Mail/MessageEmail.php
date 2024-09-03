<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $proguideName,$studenName,$proguideEmail,$messagCount;

    public function __construct($proguideName,$studenName,$proguideEmail,$messagCount)
    {
        
        $this->proguideName = $proguideName;
        $this->studenName=$studenName;
        $this->proguideEmail=$proguideEmail;
        $this->messagCount=$messagCount;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Chat Message Notification',
        );
    }


   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.message-email',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
