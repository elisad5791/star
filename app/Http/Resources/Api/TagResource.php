<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'post_titles' => $this->post_titles,
            'picture_titles' => $this->picture_titles,
            'video_titles' => $this->video_titles
        ];
    }
}
