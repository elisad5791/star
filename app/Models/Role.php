<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function getPermissionTitlesAttribute()
    {
        return $this->permissions->pluck('title')->toArray();
    }

    public function getUserNamesAttribute()
    {
        return $this->users->map(fn($item) => $item->first_name . ' ' . $item->last_name)->toArray();
    }
}
