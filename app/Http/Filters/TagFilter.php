<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TagFilter extends AbstractFilter
{
    protected array $keys = [
        'title',
        'description',
        'post_title',
        'picture_title',
        'video_title',
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

    protected function postTitle(Builder $builder, $value)
    {
        $builder->whereRelation('posts', 'title', 'ilike', '%' . $value . '%');
    }

    protected function pictureTitle(Builder $builder, $value)
    {
        $builder->whereRelation('pictures', 'title', 'ilike', '%' . $value . '%');
    }

    protected function videoTitle(Builder $builder, $value)
    {
        $builder->whereRelation('videos', 'title', 'ilike', '%' . $value . '%');
    }

    protected function itemTitle(Builder $builder, $value)
    {
        $builder
            ->whereRelation('posts', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('pictures', 'title', 'ilike', '%' . $value . '%')
            ->orWhereRelation('videos', 'title', 'ilike', '%' . $value . '%');
    }
}
