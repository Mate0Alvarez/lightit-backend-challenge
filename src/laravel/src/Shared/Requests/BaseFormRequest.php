<?php

namespace Src\Shared\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Src\Shared\Enums\HttpResponseCodesEnum;

class BaseFormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => $validator->errors()],
                HttpResponseCodesEnum::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
