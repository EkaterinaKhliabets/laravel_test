<?php

namespace App\Services\Rate\NbrbRate;

//use App\Services\Rate\Interfaces\RateModelContract;
use App\Services\Rate\Interfaces\RateServiceContract;
use App\Services\Rate\NbrbRate\Models\RateModel;
use Illuminate\Support\Facades\Http;

class NbrbRateService implements RateServiceContract
{

    private $responce = null;

    public function responce($currency_id): object
    {
       // if ($this->responce == null) {
            $this->responce = Http::get(config('rate.nbrb-rote-service.link') . $currency_id,
                [
                    'parammode' => config('rate.nbrb-rote-service.parammode'),
                ]
            );
      //  }

        return $this->responce;
    }

    function rate($currency_id): RateModel
    {
        return new RateModel($this->responce($currency_id)->object());
    }
}
