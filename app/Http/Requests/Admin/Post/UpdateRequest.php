<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string'],
            'slug' => ['string'],
            'content' => ['string'],
            'user_id' => ['integer', 'exists:users,id'],
            'category_id' => ['integer', 'exists:categories,id']
        ];
    }
}
