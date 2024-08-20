<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory;
    use HasFilter;

    public function profileable()
    {
        return $this->morphTo();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }

    public function likedPictures()
    {
        return $this->morphedByMany(Picture::class, 'likeable');
    }

    public function likedVideos()
    {
        return $this->morphedByMany(Video::class, 'likeable');
    }

    public function likedComments()
    {
        return $this->morphedByMany(Comment::class, 'likeable');
    }

    public function email(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profileable->email
        );
    }

    public function postTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->posts->pluck('title')->all()
        );
    }

    public function pictureTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->pictures->pluck('title')->all()
        );
    }

    public function videoTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->videos->pluck('title')->all()
        );
    }

    public function commentParts(): Attribute
    {
        return new Attribute(
            get: fn() => $this->comments->map(fn($comment) => Str::limit($comment->content, 20))->all()
        );
    }

    public function likedPostTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->likedPosts->pluck('title')->all()
        );
    }

    public function likedPictureTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->likedPictures->pluck('title')->all()
        );
    }

    public function likedVideoTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->likedVideos->pluck('title')->all()
        );
    }

    public function likedCommentParts(): Attribute
    {
        return new Attribute(
            get: fn() => $this->likedComments->map(fn($comment) => Str::limit($comment->content, 20))->all()
        );
    }

    public function getProfileableTitleAttribute()
    {
        return $this->profileable->title;
    }
}
