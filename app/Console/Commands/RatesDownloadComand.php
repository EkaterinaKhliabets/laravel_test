<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Console\Command;

class RatesDownloadComand extends Command
{

    protected $signature = 'download:rates';


    protected $description = 'The command downloads exchange rates from the site nbrb.by';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(\App\Services\Rate\Interfaces\RateServiceContract $rateService)
    {
        $cur_bel = Currency::where('id_number','=' ,'933')->first();
        $currencies = Currency::all()->except($cur_bel->id);

        foreach ($currencies as $currency){
            $date = $rateService->rate($currency->id_number)->getDate();
            $rate = $rateService->rate($currency->id_number)->getRate();
            $scale = $rateService->rate($currency->id_number)->getScale();

            Rate::create(['date' => $date, 'rate' => $rate, 'scale' => $scale, 'currency_id' => $currency->id] );
        }

        return 0;
    }
}
