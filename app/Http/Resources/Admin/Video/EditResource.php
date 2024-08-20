<?php

namespace App\Http\Resources\Admin\Video;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EditResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'img_url' => $this->img_url,
            'category_id' => $this->category_id,
            'tags' => $this->tag_array
        ];
    }
}
