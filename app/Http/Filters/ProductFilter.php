<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const PROD = 'prod';

    protected function getCallbacks(): array
    {
        return [
            self::PROD => [$this, 'product'],
        ];
    }

    public function product(Builder $builder, $value)
    {
        $builder->where('name', 'like' ,"%{$value}%");
    }

}
