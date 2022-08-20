<?php

namespace App\Services\Rate\NbrbRate\Models;

use App\Services\Rate\Interfaces\Models\RateModelContract;

class RateModel implements RateModelContract
{

    private $officialRate;
    private $scale;
    private $date;

    public function __construct(object $data)
    {
        $this->officialRate = $data->Cur_OfficialRate;
        $this->scale = $data->Cur_Scale;
        $this->date = $data->Date;
    }

    public function getRate(): float|null
    {
        return $this->officialRate;
    }

    public function getScale(): float|null
    {
        return $this->scale;
    }

    public function getDate()
    {
        return $this->date;
    }
}
