<?php

namespace App\Providers;

use App\Services\Rate\Interfaces\RateServiceContract;
use App\Services\Rate\NbrbRate\NbrbRateService;
use Illuminate\Support\ServiceProvider;

class RateServiceProvider extends ServiceProvider
{
    // регистрируем контейнеры
    public function register()
    {
        // для сервисов и провайдеров
        $this->app->bind(RateServiceContract::class, function (){
            return new NbrbRateService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // для фасадов
        //$this->app->bind('weather', OpenWeatherService::class);
    }

}
