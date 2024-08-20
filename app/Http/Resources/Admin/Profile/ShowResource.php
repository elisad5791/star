<?php

namespace App\Http\Resources\Admin\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'last_name' => $this->last_name,
            'login' => $this->login,
            'phone' => $this->phone,
            'age' => $this->age,
            'profileable_type' => last(explode('\\', $this->profileable_type)),
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
