<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['string'],
            'second_name' => ['string'],
            'last_name' => ['string'],
            'login' => ['string'],
            'phone' => ['string'],
            'age' => ['integer'],
            'status' => ['integer']
        ];
    }
}
