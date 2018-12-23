<?php

namespace App\Jobs;

use App\Mail\VerifyEmployeeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class SendVerificationEmployeeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $company;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$company)
    {
        $this->user = $user;
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email = new VerifyEmployeeMail($this->user,$this->company);
        Mail::to($this->user->email)->send($email);

    }
}