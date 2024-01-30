<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateCarRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'license_plate' => Rule::unique('cars', 'license_plate')->ignore($this->route('car')),
        ];
    }
}
