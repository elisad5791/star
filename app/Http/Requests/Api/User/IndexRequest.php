<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer'],
            'age_to' => ['nullable', 'integer'],
            'role_title' => ['nullable', 'string'],
            'item_title' => ['nullable', 'string'],
            'like_title' => ['nullable', 'string']
        ];
    }
}
