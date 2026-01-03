<?php

namespace App\Filament\Resources\Invoices\Pages;

use App\Models\Car;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Invoices\InvoiceResource;

class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['car_ids'] = $this->record->cars()->pluck('id')->toArray();

        return $data;
    }
        
    

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

  
}
