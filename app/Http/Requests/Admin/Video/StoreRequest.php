<?php

namespace App\Http\Requests\Admin\Video;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'file'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'tags' => ['nullable', 'array']
        ];
    }

    public function passedValidation()
    {
        $result = [];

        $urlArray = [];
        foreach ($this->images as $image) {
            $urlArray[] = Storage::disk('public')->put('images', $image);
        }
        $result['url'] = $urlArray;

        if (!empty($this->tags)) {
            $result['tags'] = array_column($this->tags, 'id');
        }

        return $this->merge($result);
    }
}
