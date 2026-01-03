<?php

namespace App\Filament\Resources\TrucksServices\Pages;

use App\Filament\Resources\TrucksServices\TrucksServicesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrucksServices extends ListRecords
{
    protected static string $resource = TrucksServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
