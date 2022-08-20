<?php

namespace App\Services\Rate\Interfaces\Models;

interface RateModelContract
{
    function getRate(): float|null;
    function getScale(): float|null;
    function getDate();
}
