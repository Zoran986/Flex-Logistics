<?php

namespace App\Filament\Resources\TrucksServices\Pages;

use App\Filament\Resources\TrucksServices\TrucksServicesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrucksServices extends EditRecord
{
    protected static string $resource = TrucksServicesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
