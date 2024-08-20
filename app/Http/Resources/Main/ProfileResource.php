<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'age' => $this->age,
            'email' => $this->email,
            'post_titles' => $this->post_titles,
            'picture_titles' => $this->picture_titles,
            'video_titles' => $this->video_titles,
            'comment_parts' => $this->comment_parts,
            'liked_post_titles' => $this->liked_post_titles,
            'liked_picture_titles' => $this->liked_picture_titles,
            'liked_video_titles' => $this->liked_video_titles,
            'liked_comment_parts' => $this->liked_comment_parts
        ];
    }
}
