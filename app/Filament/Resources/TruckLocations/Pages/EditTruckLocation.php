<?php

namespace App\Filament\Resources\TruckLocations\Pages;

use App\Filament\Resources\TruckLocations\TruckLocationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTruckLocation extends EditRecord
{
    protected static string $resource = TruckLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
