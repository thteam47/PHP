<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotifyVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otp, $email)
    {
        $this->otp = $otp;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.verify')
            ->from('youngtech2210@gmail.com')
            ->subject('Xác nhận tài khoản');
    }
}
