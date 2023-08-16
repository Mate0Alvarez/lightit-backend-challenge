<?php

namespace Src\Register\Domain\Repositories;

use Src\Register\Domain\Entities\EmailEntity;

interface EmailRepository
{
    public function createEmail(EmailEntity $emailEntity) : void;

    public function exist(string $email) : bool;
}
