<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use App\Models\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasFilter, HasRolesAndPermissions;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    protected $appends = ['is_admin'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles->contains('title', 'Admin');
    }

    public function firstName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->first_name
        );
    }

    public function lastName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->last_name
        );
    }

    public function phone(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->phone
        );
    }

    public function age(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->age
        );
    }

    public function posts(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->posts
        );
    }

    public function postTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->posts->pluck('title')->all()
        );
    }

    public function pictures(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->pictures
        );
    }

    public function pictureTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->pictures->pluck('title')->all()
        );
    }

    public function videos(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->videos
        );
    }

    public function videoTitles(): Attribute
    {
        return new Attribute(
            get: fn() => $this->videos->pluck('title')->all()
        );
    }

    public function comments(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->comments
        );
    }

    public function commentParts(): Attribute
    {
        return new Attribute(
            get: fn() => $this->comments->map(fn($comment) => Str::limit($comment->content, 20))->all()
        );
    }

    public function likedPosts(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->likedPosts
        );
    }

    public function likedPictures(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->likedPictures
        );
    }

    public function likedVideos(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->likedVideos
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
}
