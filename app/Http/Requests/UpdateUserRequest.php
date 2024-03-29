<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateUserRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore($this->route('user')),
            ],
        ];
    }
}
