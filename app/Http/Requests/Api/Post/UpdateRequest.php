<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'content' => ['required', 'string'],
            'profile_id' => ['required', 'integer', 'exists:profiles,id'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id']
        ];
    }
}
