<?php

namespace App\Http\Requests\Admin\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'post_id' => ['required', 'integer', 'exists:posts,id'],
            'likes' => ['integer'],
            'status' => ['integer']
        ];
    }
}
