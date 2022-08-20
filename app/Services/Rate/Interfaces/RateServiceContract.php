<?php

namespace App\Services\Rate\Interfaces;

use App\Services\Rate\Interfaces\Models\RateModelContract;

interface RateServiceContract
{
    function responce($currency_id): object;
    function rate($currency_id): RateModelContract;

}
