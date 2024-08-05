<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'created_at_from' => ['nullable', 'date_format:Y-m-d'],
            'created_at_to' => ['nullable', 'date_format:Y-m-d'],
            'title' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'is_commentable' => ['nullable', 'boolean'],
            'profile_name' => ['nullable', 'string'],
            'category_title' => ['nullable', 'string']
        ];
    }
}
