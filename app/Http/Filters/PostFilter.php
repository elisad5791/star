<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    protected array $keys = [
        'created_at_from',
        'created_at_to',
        'title',
        'content',
        'is_commentable',
        'profile_name',
        'category_title'
    ];

    protected function createdAtFrom(Builder $builder, $value)
    {
        $builder->whereDate('created_at', '>=', $value);
    }

    protected function createdAtTo(Builder $builder, $value)
    {
        $builder->whereDate('created_at', '<=', $value);
    }

    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', '%' . $value . '%');
    }

    protected function content(Builder $builder, $value)
    {
        $builder->where('content', 'ilike', '%' . $value . '%');
    }

    protected function isCommentable(Builder $builder, $value)
    {
        $builder->where('is_commentable', $value);
    }

    protected function profileName(Builder $builder, $value)
    {
        $builder->whereHas('profile', function ($query) use ($value) {
            $query->where('first_name', 'ilike', '%' . $value . '%')
                ->orWhere('last_name', 'ilike', '%' . $value . '%');
        });
    }

    protected function categoryTitle(Builder $builder, $value)
    {
        $builder->whereRelation('category', 'title', 'ilike', '%' . $value . '%');
    }
}
