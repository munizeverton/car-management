<?php

namespace App\Http\Requests;

class StoreCarRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'license_plate' => ['string', 'required', 'unique:cars,license_plate'],
            'brand' => ['required',],
        ];
    }
}
