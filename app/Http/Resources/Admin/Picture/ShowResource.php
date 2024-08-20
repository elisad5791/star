<?php

namespace App\Http\Resources\Admin\Picture;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'img_url' => $this->img_url,
            'profile_name' => $this->profile_name,
            'category_title' => $this->category_title,
            'tag_titles' => $this->tag_titles,
            'like_counter' => $this->like_counter,
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }
}
