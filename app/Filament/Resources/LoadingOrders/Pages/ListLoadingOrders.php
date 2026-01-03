<?php

namespace App\Filament\Resources\LoadingOrders\Pages;

use App\Filament\Resources\LoadingOrders\LoadingOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLoadingOrders extends ListRecords
{
    protected static string $resource = LoadingOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
