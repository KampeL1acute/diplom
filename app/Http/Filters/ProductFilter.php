<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{

    const CATEGORIES = 'categories';
    const TAGS = 'tags';

    protected function getCallbacks(): array
    {
        [
            self::CATEGORIES => [$this, 'categories'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    protected function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }

    protected function tags(Builder $builder, $value)
    {
        $builder->whereIn('tag_id', $value);
    }
}