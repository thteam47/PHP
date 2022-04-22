<?php

namespace App\Jobs;

use App\Mail\MailNotifyVerify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailVerify implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $otp;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($otp, $email)
    {
        $this->otp = $otp;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new MailNotifyVerify($this->otp, $this->email));
    }
}
