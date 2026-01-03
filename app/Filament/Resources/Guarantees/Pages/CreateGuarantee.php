<?php

namespace App\Filament\Resources\Guarantees\Pages;

use App\Models\Car;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Guarantees\GuaranteeResource;

class CreateGuarantee extends CreateRecord
{
    protected static string $resource = GuaranteeResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


     protected function afterCreate(): void
    {
        Car::whereIn('id', $this->data['car_ids'] ?? [])
            ->update(['guarantee_id' => $this->record->id]);
    }
}
