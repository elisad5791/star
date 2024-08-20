<?php

namespace App\Http\Resources\Admin\Tag;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'post_counter' => $this->post_counter,
            'picture_counter' => $this->picture_counter,
            'video_counter' => $this->video_counter,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
