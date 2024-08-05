<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProfileFilter extends AbstractFilter
{
    protected array $keys = [
        'name',
        'login',
        'phone',
        'age_from',
        'age_to',
        'role_title',
        'item_title',
        'like_title'
    ];

    protected function name(Builder $builder, $value)
    {
        $builder
            ->where('first_name', 'ilike', '%' . $value . '%')
            ->orWhere('last_name', 'ilike', '%' . $value . '%');
    }

    protected function login(Builder $builder, $value)
    {
        $builder->where('login', 'ilike', '%' . $value . '%');
    }

    protected function phone(Builder $builder, $value)
    {
        $builder->where('phone', 'ilike', '%' . $value . '%');
    }

    protected function ageFrom(Builder $builder, $value)
    {
        $builder->where('age', '>=', $value);
    }

    protected function ageTo(Builder $builder, $value)
    {
        $builder->where('age', '<=', $value);
    }

    protected function itemTitle(Builder $builder, $value)
    {
        $builder
            ->whereRelation('posts', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('pictures', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('videos', 'title', 'ilike', '%' . $value . '%');
    }

    protected function likeTitle(Builder $builder, $value)
    {
        $builder
            ->whereRelation('likedPosts', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('likedPictures', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('likedVideos', 'title', 'ilike', '%' . $value . '%');
    }
}
