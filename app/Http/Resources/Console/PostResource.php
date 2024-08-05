<?php

namespace App\Http\Resources\Console;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => Str::limit($this->content, 20),
            'profile_name' => $this->profile_name,
            'category_title' => $this->category_title,
            'tag_titles' => $this->tag_titles,
            'comment_parts' => $this->comment_parts,
            'like_names' => $this->like_names
        ];
    }
}
