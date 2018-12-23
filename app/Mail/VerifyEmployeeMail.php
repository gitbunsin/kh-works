<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmployeeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$company)
    {
        $this->user = $user;
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.verifyEmployee')->with([
            'email_token' => $this->user->email_token,
            'name'=>$this->company->name
        ]);
    }
}