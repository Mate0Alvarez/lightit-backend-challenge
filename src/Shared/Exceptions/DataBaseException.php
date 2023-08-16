<?php

namespace Src\Shared\Exceptions;

use Src\Shared\Enums\HttpResponseCodesEnum;

class DataBaseException extends BaseException
{
    public function __construct()
    {
        parent::__construct(
            'An internal error has happened',
            HttpResponseCodesEnum::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
