<?php

namespace App\Http\Resources\Admin\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'permission_titles' => $this->permission_titles,
            'user_names' => $this->user_names,
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
