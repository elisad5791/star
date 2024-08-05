<?php

namespace App\Http\Requests\Api\Author;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'login' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'age_from' => ['nullable', 'integer'],
            'age_to' => ['nullable', 'integer']
        ];
    }
}
