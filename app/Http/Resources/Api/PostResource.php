<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'is_commentable' => $this->is_commentable,
            'profile_name' => $this->profile_name,
            'category_title' => $this->category_title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
