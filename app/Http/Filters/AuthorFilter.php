<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class AuthorFilter extends AbstractFilter
{
    protected array $keys = [
        'title',
        'name',
        'login',
        'phone',
        'age_from',
        'age_to'
    ];

    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', '%' . $value . '%');
    }

    protected function name(Builder $builder, $value)
    {
        $builder
            ->whereRelation('profile', 'first_name', 'ilike', '%' . $value . '%')
            ->orWhererelation('profile', 'last_name', 'ilike', '%' . $value . '%');
    }

    protected function login(Builder $builder, $value)
    {
        $builder->whereRelation('profile', 'login', 'ilike', '%' . $value . '%');
    }

    protected function phone(Builder $builder, $value)
    {
        $builder->whereRelation('profile', 'phone', 'ilike', '%' . $value . '%');
    }

    protected function ageFrom(Builder $builder, $value)
    {
        $builder->whereRelation('profile', 'age', '>=', $value);
    }

    protected function ageTo(Builder $builder, $value)
    {
        $builder->whereRelation('profile', 'age', '<=', $value);
    }
}
