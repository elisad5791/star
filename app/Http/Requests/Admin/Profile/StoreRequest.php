<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'second_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'login' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'profilable_type' => ['required', 'string'],
            'profilable_id' => ['required', 'integer']
        ];
    }
}
