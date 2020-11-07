<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;
use App\Rules\PhoneNumber;

class AddUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => [new PhoneNumber, 'required'],
            'email' => ['email', 'required', 'unique:users,email']
        ];
    }
}
