<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProguideCourseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$useremail,$coursename;

    public function __construct($username,$useremail,$coursename)
    {
        
        $this->username=$username;
        $this->useremail = $useremail;
        $this->coursename = $coursename;
        
    }


 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ProjKonnect Course Notification',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.proguide-course-email',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
