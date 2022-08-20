<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NOT_VALID = 'not_valid';

    protected function getCallbacks(): array
    {
        return [
            self::NOT_VALID => [$this, 'notValid'],
        ];
    }

    public function notValid(Builder $builder, $value)
    {
        $builder->where('not_valid', '!=' ,$value);
    }
}
