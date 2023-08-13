<?php

namespace Src\Shared\Services\MailService\Contracts;

use Src\Shared\Services\MailService\Entities\MailServiceEntity;

interface MailServiceManagement
{
    public function send(MailServiceEntity $mailEntity): void;
}
