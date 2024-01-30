<?php

namespace App\Http\Requests;

class StoreUserRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['string', 'required'],
        ];
    }
}
