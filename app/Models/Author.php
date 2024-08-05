<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    use HasFilter;

    public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable');
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

    public function login(): Attribute
    {
        return new Attribute(
            get: fn() => $this->profile->login
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
}
