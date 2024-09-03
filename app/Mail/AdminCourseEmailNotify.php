<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCourseEmailNotify extends Mailable
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
            subject: 'ProjKonnect New Course Notification',
        );
    }

 
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admin-course-email-notify',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
