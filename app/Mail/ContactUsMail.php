<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;


    public $details;
    public $applogo;

    public function __construct($details,  $applogo)
    {
        $this->details = $details;
        $this->applogo = $applogo;
    }

    public function build()
    {
        return $this->subject('Thankyou for contacting us.')
            ->view('emails.ContactUs');
    }
}
