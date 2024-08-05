<?php

namespace App\Http\Requests\Admin\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['string'],
            'user_id' => ['integer', 'exists:users,id'],
            'post_id' => ['integer', 'exists:posts,id'],
            'likes' => ['integer'],
            'status' => ['integer']
        ];
    }
}
