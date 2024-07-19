<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Hostel;

class ResidentInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $hostel;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Hostel $hostel, $token)
    {
        $this->user = $user;
        $this->hostel = $hostel;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resident_invitation')
                    ->subject('Hostel Invitation');
    }
}
