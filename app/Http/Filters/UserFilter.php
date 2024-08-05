<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    protected array $keys = [
        'email',
        'name',
        'age_from',
        'age_to',
        'role_title',
        'item_title',
        'like_title'
    ];

    protected function email(Builder $builder, $value)
    {
        $builder->where('email', 'ilike', '%' . $value . '%');
    }

    protected function name(Builder $builder, $value)
    {
        $builder->whereHas('profile', function ($query) use ($value) {
            $query->where('first_name', 'ilike', '%' . $value . '%')
                ->orWhere('last_name', 'ilike', '%' . $value . '%');
        });
    }

    protected function ageFrom(Builder $builder, $value)
    {
        $builder->whereRelation('profile', 'age', '>=', $value);
    }

    protected function ageTo(Builder $builder, $value)
    {
        $builder->whereRelation('profile', 'age', '<=', $value);
    }

    protected function itemTitle(Builder $builder, $value)
    {
        $builder
            ->whereHas('profile', function ($query) use ($value) {
                $query->whereRelation('posts', 'title', 'ilike', '%' . $value . '%');
            })
            ->orWhereHas('profile', function ($query) use ($value) {
                $query->whereRelation('videos', 'title', 'ilike', '%' . $value . '%');
            })
            ->orWhereHas('profile', function ($query) use ($value) {
                $query->whereRelation('pictures', 'title', 'ilike', '%' . $value . '%');
            });
    }

    protected function likeTitle(Builder $builder, $value)
    {
        $builder
            ->whereHas('profile', function ($query) use ($value) {
                $query->whereRelation('likedPosts', 'title', 'ilike', '%' . $value . '%');
            })
            ->orWhereHas('profile', function ($query) use ($value) {
                $query->whereRelation('likedPictures', 'title', 'ilike', '%' . $value . '%');
            })
            ->orWhereHas('profile', function ($query) use ($value) {
                $query->whereRelation('likedVideos', 'title', 'ilike', '%' . $value . '%');
            });
    }
}
