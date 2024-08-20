<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'article' => ['required', 'array'],
            'article.title' => ['required', 'string'],
            'article.content' => ['required', 'string'],
            'article.category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'tags' => ['nullable', 'array']
        ];
    }
}
