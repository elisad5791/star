<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Picture extends Model
{
    use HasFactory;
    use HasFilter;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
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

    public function categoryTitle(): Attribute
    {
        return new Attribute(
            get: fn() => $this->category->title
        );
    }

    public function tagTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->tags->pluck('title')->all()
        );
    }

    public function commentParts(): Attribute
    {
        return new Attribute(
            get: fn() => $this->comments->pluck('content')->map(fn($content) => Str::limit($content, 20))->all()
        );
    }

    public function likeNames(): Attribute
    {
        return new Attribute(
            get: fn() => $this->likes->map(fn($like) => trim($like->first_name . ' ' . $like->last_name))->all()
        );
    }

    public function getLikeCounterAttribute()
    {
        return $this->likes()->count();
    }

    public function getTagArrayAttribute()
    {
        return $this->tags->map(fn($item) => $item->only('id', 'title'))->toArray();
    }

    public function getImgUrlAttribute()
    {
        if (Str::startsWith($this->url, 'https://')) {
            return $this->url;
        }
        return Storage::disk('public')->url($this->url);
    }
}
