<?php

namespace App\Http\Requests\Admin\Picture;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'image' => ['required', 'file'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'tags' => ['nullable', 'array']
        ];
    }

    public function passedValidation()
    {
        return $this->merge([
            'url' => Storage::disk('public')->put('images', $this->image),
            'tags' => array_column($this->tags, 'id')
        ]);
    }
}
