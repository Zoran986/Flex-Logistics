<?php

namespace App\Filament\Resources\Trucks\Pages;

use App\Models\Truck;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Trucks\TrucksResource;

class ListTrucks extends ListRecords
{
    protected static string $resource = TrucksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTrucks()
    {
        return Truck::query()
            ->with(['latestLocation:id,truck_id,latitude,longitude,speed,recorded_at'])
            ->get();
    }
    }
