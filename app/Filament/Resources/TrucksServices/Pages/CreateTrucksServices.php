<?php

namespace App\Filament\Resources\TrucksServices\Pages;

use App\Filament\Resources\TrucksServices\TrucksServicesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTrucksServices extends CreateRecord
{
    protected static string $resource = TrucksServicesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
