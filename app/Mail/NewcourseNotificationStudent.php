<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewcourseNotificationStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$proguideName,$coursename;

    public function __construct($username,$proguideName,$coursename)
    {
        
        $this->username=$username;
        $this->proguideName = $proguideName;
        $this->coursename = $coursename;
        
    }


 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ProjKonnect New Course Notification',
        );
    }
    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.newcourse-notification-student',
        );
    }

  
    public function attachments(): array
    {
        return [];
    }
}
