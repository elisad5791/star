<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use HasFilter;

    public function commentable()
    {
        return $this->morphTo();
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function likes()
    {
        return $this->morphToMany(Profile::class, 'likeable');
    }

    public function profileName(): Attribute
    {
        return new Attribute(
            get: fn() => trim($this->profile->first_name . ' ' . $this->profile->last_name)
        );
    }

    public function commentableTitle(): Attribute
    {
        return new Attribute(
            get: fn() => $this->commentable->title
        );
    }

    public function likeNames(): Attribute
    {
        return new Attribute(
            get: fn() => $this->likes->map(fn($like) => trim($like->first_name . ' ' . $like->last_name))->all()
        );
    }
}
