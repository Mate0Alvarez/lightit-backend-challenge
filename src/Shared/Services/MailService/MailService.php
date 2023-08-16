<?php

namespace Src\Shared\Services\MailService;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Src\Shared\Services\MailService\Entities\MailServiceEntity;

class MailService implements Contracts\MailServiceManagement
{
    public function send(MailServiceEntity $mailEntity): void
    {
        Mail::to($mailEntity->getRecipientEmail())
            ->send($mailEntity->getMailable());
    }
}
