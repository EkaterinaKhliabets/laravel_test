<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter
{
    public const USER_ID = 'user_id';

    protected function getCallbacks(): array
    {
        return [
            self::USER_ID => [$this, 'userId'],
        ];
    }

    public function userId(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }
}
