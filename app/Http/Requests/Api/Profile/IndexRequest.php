<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'login' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer'],
            'age_to' => ['nullable', 'integer'],
            'role_title' => ['nullable', 'string'],
            'item_title' => ['nullable', 'string'],
            'like_title' => ['nullable', 'string']
        ];
    }
}
