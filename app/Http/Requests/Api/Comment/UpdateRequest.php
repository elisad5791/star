<?php

namespace App\Http\Requests\Api\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'post_id' => ['required', 'integer', 'exists:categories,id'],
            'likes' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer']
        ];
    }
}
