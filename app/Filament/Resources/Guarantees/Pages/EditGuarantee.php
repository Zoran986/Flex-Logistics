<?php

namespace App\Filament\Resources\Guarantees\Pages;

use App\Models\Car;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Guarantees\GuaranteeResource;

class EditGuarantee extends EditRecord
{
    protected static string $resource = GuaranteeResource::class;

    protected function afterSave(): void
    {
        Car::where('guarantee_id', $this->record->id)
            ->update(['guarantee_id' => null]);

        Car::whereIn('id', $this->data['car_ids'] ?? [])
            ->update(['guarantee_id' => $this->record->id]);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
