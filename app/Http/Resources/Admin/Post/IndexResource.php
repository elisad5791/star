<?php

namespace App\Http\Resources\Admin\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'profile_name' => $this->profile_name,
            'category_title' => $this->category_title,
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }
}
