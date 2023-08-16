<?php

namespace Src\Register\Infrastructure\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Src\Shared\Requests\BaseFormRequest;

class CreatePatientRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|ValidationRule|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string',
            'email'         => 'required|email',
            'phone_number'  => 'required|numeric',
            'document_file' => 'required|file'
        ];
    }
}
