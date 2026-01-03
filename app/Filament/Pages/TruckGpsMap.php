<?php

namespace App\Filament\Pages;

use App\Models\Truck;
use Filament\Pages\Page;
use App\Models\TruckLocation;
use Filament\Support\Icons\Heroicon;

class TruckGpsMap extends Page
{
    
     protected string $view = 'filament.pages.truck-gps-map';
   public function getTrucksWithLocations()
    {
        return Truck::with('locations')->get()->map(function($truck) {
            return [
                'plate_number' => $truck->plate_number,
                'model' => $truck->model,
                'locations' => $truck->locations->map(function($loc){
                    return [
                        'latitude' => $loc->latitude,
                        'longitude' => $loc->longitude,
                        'speed' => $loc->speed,
                        'recorded_at' => $loc->recorded_at ? $loc->recorded_at->format('Y-m-d H:i:s') : null,
                    ];
                }),
            ];
        });
    }

    // Последна локација за auto-refresh
    public function getLatestTruckLocations()
    {
        return Truck::with(['locations' => function($query){
            $query->orderByDesc('recorded_at')->limit(1);
        }])->get()->map(function($truck){
            $last = $truck->locations->first();
            return [
                'plate_number' => $truck->plate_number,
                'model' => $truck->model,
                'latitude' => $last->latitude ?? null,
                'longitude' => $last->longitude ?? null,
                'speed' => $last->speed ?? null,
                'recorded_at' => $last->recorded_at ? $last->recorded_at->format('Y-m-d H:i:s') : null,
            ];
        });
    }
}