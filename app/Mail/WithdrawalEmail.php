<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WithdrawalEmail extends Mailable
{
    use Queueable, SerializesModels;

    

    public $name,$email,$amount,$balance,$bankdetails;

    public function __construct($name,$email,$amount,$balance,$bankdetails)
    {
        
        $this->name=$name;
        $this->email=$email;
        $this->amount=$amount;
        $this->balance=$balance;
        $this->bankdetails=$bankdetails;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Withdrawal Request Notification',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.withdrawal-email',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
