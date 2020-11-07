<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->getMessageBag()->toArray();

        throw (new ValidationException($validator, api_errors(config('code.common.validate_failed'), $errors)));
    }

    public function messages()
    {
        return [];
    }

}
