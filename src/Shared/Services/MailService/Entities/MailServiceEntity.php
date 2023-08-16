<?php

namespace Src\Shared\Services\MailService\Entities;

use Illuminate\Mail\Mailable;

class MailServiceEntity
{
    public function __construct(
        private readonly string $recipientEmail,
        private readonly Mailable $mailable,
    )
    {}

    /**
     * @return string
     */
    public function getRecipientEmail(): string
    {
        return $this->recipientEmail;
    }

    /**
     * @return Mailable
     */
    public function getMailable(): Mailable
    {
        return $this->mailable;
    }
}
