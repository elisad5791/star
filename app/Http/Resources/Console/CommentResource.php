<?php

namespace App\Http\Resources\Console;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => Str::limit($this->content, 20),
            'profile_name' => $this->profile_name,
            'commentable_type' => $this->commentable_type,
            'commentable_title' => $this->commentable_title,
            'like_names' => $this->like_names
        ];
    }
}
