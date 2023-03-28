<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token;
    public $user;

    public function __construct($token, $user) {
        $this->token = $token;
        $this->user = $user;
    }

    public function build()
    {

            $mailData = [
                'userFullName' => $this->user->firstname . ' ' . $this->user->lastname,
                'userEmail' => $this->user->email,
                'resetPasswordURL' => "127.0.0.1:8000/reset",
            ];

            return $this->subject('Réinitialisation de mot de passe')
            ->view('emails.send-password-reset')
            ->with([
                'token' => $this->token,
                'mailData' => $mailData
            ]);
    }
}
