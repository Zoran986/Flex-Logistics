<?php

namespace App\Providers;


use App\Models\Truck;
use App\Observers\TruckObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Truck::observe(TruckObserver::class);
    }
}
