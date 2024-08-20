<?php

namespace App\Http\Resources\Admin\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => Str::limit($this->content, 50),
            'profile_name' => $this->profile_name
        ];
    }
}
