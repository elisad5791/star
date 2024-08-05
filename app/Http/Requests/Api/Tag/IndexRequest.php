<?php

namespace App\Http\Requests\Api\Tag;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'post_title' => ['nullable', 'string'],
            'picture_title' => ['nullable', 'string'],
            'video_title' => ['nullable', 'string'],
            'item_title' => ['nullable', 'string']
        ];
    }
}
