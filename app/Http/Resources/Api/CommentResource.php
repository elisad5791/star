<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'profile_name' => $this->profile_name,
            'commentable_type' => $this->commentable_type,
            'commentable_title' => $this->commentable_title,
            'like_names' => $this->like_names,
            'created_at' => $this->created_at
        ];
    }
}
