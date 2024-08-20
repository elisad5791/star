<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'age' => $this->age,
            'role_title' => $this->role_title,
            'post_titles' => $this->post_titles,
            'picture_titles' => $this->picture_titles,
            'video_titles' => $this->video_titles,
            'comment_parts' => $this->comment_parts
        ];
    }
}
