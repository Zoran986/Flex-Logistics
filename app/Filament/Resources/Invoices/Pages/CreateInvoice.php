<?php

namespace App\Filament\Resources\Invoices\Pages;

use App\Models\Car;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Invoices\InvoiceResource;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Invoice created successfully';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Save selected cars into session
        session(['cars_selected' => $data['car_ids'] ?? []]);

        unset($data['car_ids']); // remove from invoice table

        return $data;
    }

    protected function afterCreate(): void
    {
        $invoice = $this->record;

        $carIds = $this->data['car_ids'] ?? [];

        // Assign cars to invoice
        Car::whereIn('id', $carIds)
            ->update(['invoice_id' => $invoice->id]);
    }

}
