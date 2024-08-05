<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'post_titles' => $this->post_titles,
            'picture_titles' => $this->picture_titles,
            'video_titles' => $this->video_titles,
            'liked_post_titles' => $this->liked_post_titles,
            'liked_picture_titles' => $this->liked_picture_titles,
            'liked_video_titles' => $this->liked_video_titles
        ];
    }
}
