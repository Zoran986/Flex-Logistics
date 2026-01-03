<?php

namespace App\Filament\Resources\LoadingOrders\Pages;

use App\Models\Car;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LoadingOrders\LoadingOrderResource;

class EditLoadingOrder extends EditRecord
{
    protected static string $resource = LoadingOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Car::where('loading_order_id', $this->record->id)
            ->update(['loading_order_id' => null]);

        Car::whereIn('id', $this->data['car_ids'] ?? [])
            ->update(['loading_order_id' => $this->record->id]);
    }
}
