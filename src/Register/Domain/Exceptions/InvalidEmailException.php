<?php

namespace Src\Register\Domain\Exceptions;

use Src\Shared\Enums\HttpResponseCodesEnum;

class InvalidEmailException extends \Src\Shared\Exceptions\BaseException
{
    public function __construct()
    {
        parent::__construct(
            'Invalid email',
            HttpResponseCodesEnum::HTTP_CONFLICT);
    }
}
