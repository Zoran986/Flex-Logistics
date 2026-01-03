<?php

namespace App\Filament\Resources\TruckLocations\Pages;

use App\Filament\Resources\TruckLocations\TruckLocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTruckLocations extends ListRecords
{
    protected static string $resource = TruckLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
