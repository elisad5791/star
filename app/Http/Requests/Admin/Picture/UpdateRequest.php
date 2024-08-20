<?php

namespace App\Http\Requests\Admin\Picture;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'image' => ['nullable', 'file'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'tags' => ['nullable', 'array']
        ];
    }

    public function passedValidation()
    {
        $data = $this->validated();
        $preparedValues = [];
        if (!empty($this->tags)) {
            $preparedValues['tags'] = array_column($this->tags, 'id');
        }
        if (!empty($this->image)) {
            $preparedValues['url'] = Storage::disk('public')->put('images', $this->image);
        }
        return $this->replace([...$data, ...$preparedValues]);
    }
}
