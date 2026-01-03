<?php

namespace App\Filament\Resources\Invoices;

use UnitEnum;
use BackedEnum;
use App\Models\Car;
use App\Models\Invoice;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Invoices\Pages\EditInvoice;
use App\Filament\Resources\Invoices\Pages\ListInvoices;
use App\Filament\Resources\Invoices\Pages\CreateInvoice;
use App\Filament\Resources\Invoices\Schemas\InvoiceForm;
use App\Filament\Resources\Invoices\Tables\InvoicesTable;

    class InvoiceResource extends Resource
    {
        protected static ?string $model = Invoice::class;

        protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentCurrencyEuro;

        protected static ?string $recordTitleAttribute = 'yes'; 

        public static function getGloballySearchableAttributes(): array
        {
            return ['invoice_number', 'company.name', 'date_issued', 'date_payment', 'amount', 'paid'];
        }

        protected static string | UnitEnum | null $navigationGroup = 'Billing';

        protected static ?int $navigationSort = 3;

        public static function form(Schema $schema): Schema
        {
            return InvoiceForm::configure($schema);
        }

        public static function table(Table $table): Table
        {
            return InvoicesTable::configure($table);
        }

        public static function mutateFormDataBeforeSave(array $data): array
        {
            session(['cars_selected' => $data['car_ids'] ?? []]);

            unset($data['car_ids']); // cars не се поле на invoices

            return $data;
        }

        public static function afterSave($record): void
        {
            $newCarIds = session('cars_selected', []);

            // 1. Осоди ги сите стари коли од оваа фактура
            Car::where('invoice_id', $record->id)
                ->whereNotIn('id', $newCarIds)
                ->update(['invoice_id' => null]);

            // 2. Поврзи ги селектираните коли
            Car::whereIn('id', $newCarIds)
                ->update(['invoice_id' => $record->id]);
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListInvoices::route('/'),
                'create' => Pages\CreateInvoice::route('/create'),
                'edit' => Pages\EditInvoice::route('/{record}/edit'),
            ];
        }

        public static function getNavigationSort(): ?int
        {
            return 5;
        }
    }
