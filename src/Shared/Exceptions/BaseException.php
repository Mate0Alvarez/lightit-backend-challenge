<?php

namespace Src\Shared\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class BaseException extends Exception
{
    protected int $statusCode;
    protected string $errorMessage;

    public function __construct(string $errorMessage, int $statusCode = 500)
    {
        parent::__construct($errorMessage, $statusCode);
        $this->errorMessage  = $errorMessage;
        $this->statusCode = $statusCode;
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'message' => $this->errorMessage,
        ], $this->statusCode);
    }
}
