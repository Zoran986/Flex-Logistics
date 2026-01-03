<?php

namespace App\Filament\Resources\LoadingOrders\Pages;

use App\Models\Car;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\LoadingOrders\LoadingOrderResource;

class CreateLoadingOrder extends CreateRecord
{
    protected static string $resource = LoadingOrderResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    protected function afterCreate(): void
    {
        Car::whereIn('id', $this->data['car_ids'] ?? [])
            ->update(['loading_order_id' => $this->record->id]);
    }
}
