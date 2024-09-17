<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'profile_name' => ['nullable', 'string'],
            'category_title' => ['nullable', 'string'],
            'created_at_from' => ['nullable', 'date_format:Y-m-d'],
            'created_at_to' => ['nullable', 'date_format:Y-m-d'],
            'element' => ['nullable', 'string'],
        ];
    }
}
