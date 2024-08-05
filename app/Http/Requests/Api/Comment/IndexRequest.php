<?php

namespace App\Http\Requests\Api\Comment;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['nullable', 'string'],
            'profile_name' => ['nullable', 'string'],
            'commentable_type' => ['nullable', 'string'],
            'commentable_title' => ['nullable', 'string'],
            'created_at_from' => ['nullable', 'date_format:Y-m-d'],
            'created_at_to' => ['nullable', 'date_format:Y-m-d']
        ];
    }
}
