<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SignupMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userDetails;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($userDetails, $cmsData)
    {
        $this->userDetails = $userDetails;
        $this->data = $cmsData;
    }

    public function build()
    {
        return $this->subject('Welcome To ' . config('app.name'))
            ->view('emails.SignUp');
    }
}
