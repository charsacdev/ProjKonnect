<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoursePurchaseEmailProguide extends Mailable
{
    use Queueable, SerializesModels;

    public $proguideUsername,$title,$studentName,$date,$price;

    public function __construct($proguideUsername,$title,$studentName,$date,$price)
    {
        
        $this->proguideUsername=$proguideUsername;
        $this->title = $title;
        $this->studentName = $studentName;
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
            markdown: 'mail.course-purchase-email-proguide',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
