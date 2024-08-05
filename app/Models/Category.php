<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasFilter;

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
}
