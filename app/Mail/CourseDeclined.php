<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseDeclined extends Mailable
{
    use Queueable, SerializesModels;

    public $coursename,$email,$name;

    public function __construct($coursename, $email,$name)
    {
        $this->coursename = $coursename;
        $this->email = $email;
        $this->name=$name;
    }


 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ProjKonnect Course Decline Notification',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.course-declined',
        );
    }

  
    public function attachments(): array
    {
        return [];
    }
}
