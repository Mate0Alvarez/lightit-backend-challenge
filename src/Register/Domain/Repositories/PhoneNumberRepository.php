<?php

namespace Src\Register\Domain\Repositories;

use Src\Register\Domain\Entities\PhoneNumberEntity;

interface PhoneNumberRepository
{
    public function createPhoneNumber(PhoneNumberEntity $phoneNumberEntity) : void;
}
