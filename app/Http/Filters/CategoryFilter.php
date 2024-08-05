<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    protected array $keys = [
        'title',
        'description',
        'item_title'
    ];

    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', '%' . $value . '%');
    }

    protected function description(Builder $builder, $value)
    {
        $builder->where('description', 'ilike', '%' . $value . '%');
    }

    protected function itemTitle(Builder $builder, $value)
    {
        $builder
            ->whereRelation('posts', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('pictures', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('videos', 'title', 'ilike', '%' . $value . '%');
    }
}
