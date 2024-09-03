<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoursePurchaseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$title,$description,$date,$price;

    public function __construct($username,$title,$description,$date,$price)
    {
        
        $this->username=$username;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->price = $price;
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Course Purchase Notification',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.course-purchase-email',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
