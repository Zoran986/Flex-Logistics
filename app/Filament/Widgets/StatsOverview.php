<?php

namespace App\Filament\Widgets;


use App\Models\Car;
use App\Models\Route;
use App\Models\Truck;
use App\Models\Driver;
use App\Models\Invoice;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Cars ready for transport', Car::where('status', true)
            ->where('invoice_id', null)
            ->count())
                ->icon('heroicon-o-truck'),
            
            Stat::make('Invoice unpaid'  , Invoice::where('paid', false)->count())
                ->icon('heroicon-o-currency-dollar'),

            Stat::make('Route unpaid', Route::where('paid', false)->count())
                ->icon('heroicon-o-document-text'),

            Stat::make('Truk plate expire', Truck::whereBetween('expire_date', [
                now(), now()->addDays(30)
            ])->count())
                ->color('secondary'),
            
        // ...
        ];
    }
}
