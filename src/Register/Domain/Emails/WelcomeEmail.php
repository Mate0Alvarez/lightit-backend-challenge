<?php

namespace Src\Register\Domain\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Src\Register\Domain\Entities\PatientEntity;

class WelcomeEmail extends \Illuminate\Mail\Mailable
{
    use Queueable, SerializesModels;

    public PatientEntity $patient;

    public function __construct(PatientEntity $patient)
    {
        $this->patient = $patient;
        $this->subject('Welcome to our platform!');
    }

    public function build(): WelcomeEmail
    {
        return $this->view('emails.welcome');
    }
}
