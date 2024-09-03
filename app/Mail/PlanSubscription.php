<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlanSubscription extends Mailable
{
    use Queueable, SerializesModels;

    public $username,$planprice,$plantype,$planduration;

    public function __construct($username,$planprice,$plantype,$planduration)
    {
        
        $this->username=$username;
        $this->planprice = $planprice;
        $this->plantype = $plantype;
        $this->planduration=$planduration;
       
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ProjKonnect Plan Subscription',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.plan-subscription',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
