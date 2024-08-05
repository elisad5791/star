<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CommentFilter extends AbstractFilter
{
    protected array $keys = [
        'content',
        'profile_name',
        'commentable_type',
        'commentable_title',
        'created_at_from',
        'created_at_to'
    ];

    protected function content(Builder $builder, $value)
    {
        $builder->where('content', 'ilike', '%' . $value . '%');
    }

    protected function profileName(Builder $builder, $value)
    {
        $builder->whereHas('profile', function ($query) use ($value) {
            $query->where('first_name', 'ilike', '%' . $value . '%')
                ->orWhere('last_name', 'ilike', '%' . $value . '%');
        });
    }

    protected function commentableType(Builder $builder, $value)
    {
        $builder->where('commentable_type', 'ilike', '%' . $value . '%');
    }

    protected function commentableTitle(Builder $builder, $value)
    {
        $builder->whereRelation('commentable', 'title', 'ilike', '%' . $value . '%');
    }

    protected function createdAtFrom(Builder $builder, $value)
    {
        $builder->whereDate('created_at', '>=', $value);
    }

    protected function createdAtTo(Builder $builder, $value)
    {
        $builder->whereDate('created_at', '<=', $value);
    }
}
