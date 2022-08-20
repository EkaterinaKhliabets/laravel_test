<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();
        return view('rates.index', ['rates' => $rates]);
    }

    public function download(\App\Services\Rate\Interfaces\RateServiceContract $rateService)
    {
        $cur_bel = Currency::where('id_number','=' ,'933')->first();
        $currencies = Currency::all()->except($cur_bel->id);

        foreach ($currencies as $currency){
            $date = $rateService->rate($currency->id_number)->getDate();
            $rate = $rateService->rate($currency->id_number)->getRate();
            $scale = $rateService->rate($currency->id_number)->getScale();

            Rate::create(['date' => $date, 'rate' => $rate, 'scale' => $scale, 'currency_id' => $currency->id] );
        }

        return redirect()->route('rates.index');
    }

    public function findRate($currency, $date){
        $rate = Rate::where('currency_id' , '=', $currency)->where('date', '<=',$date)->orderBy('created_at', 'desc')->first();
        return $rate;
    }
}
