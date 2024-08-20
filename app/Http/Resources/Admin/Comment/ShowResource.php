<?php

namespace App\Http\Resources\Admin\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'commentable_type' => last(explode('\\', $this->commentable_type)),
            'commentable_title' => $this->commentable_title,
            'profile_name' => $this->profile_name,
            'like_counter' => $this->like_counter,
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
