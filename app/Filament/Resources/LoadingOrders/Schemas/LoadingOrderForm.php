<?php

namespace App\Filament\Resources\LoadingOrders\Schemas;

use App\Models\Car;
use App\Models\Company;
use App\Models\LoadingOrder;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class LoadingOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('loading_order_number')
                ->label('Load. Order Number')
                ->default(function () {
                    return (LoadingOrder::max('loading_order_number') ?? 0) + 1;
                })
                ->disabled()      // user sees it but cannot change it
                ->dehydrated()    // required so value is actually saved
                ->required(),
                TextInput::make('driver')
                ->required(),
                TextInput::make('truck_number')
                ->required(),
                TextInput::make('destination'),
                DatePicker::make('date_of_loading')
                ->required(),
                TextInput::make('place_of_loading')
                ->required(),
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->label('Company')
                    ->options(Company::query()->whereNotNull('name')->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive(),
                
                Select::make('car_ids')
                ->label('Cars')
                ->multiple()
                ->options(function ($record, callable $get) {
                    $companyId = $get('company_id');

                    if (!$companyId) {
                        return [];
                    }

                    $query = Car::where('company_id', $companyId)
                        ->whereNotNull('driver_id');

                    if ($record) {
                        // EDIT MODE → allow assigned cars + free cars
                        $query = $query->where(function ($q) use ($record) {
                            $q->whereNull('invoice_id')
                            ->orWhere('invoice_id', $record->id);
                        });
                    } else {
                        // CREATE MODE → only free cars
                        $query = $query->whereNull('invoice_id');
                    }

                    return $query->pluck('vin', 'id');
                })
                ->preload() // <— SUPER IMPORTANT
                ->searchable()
                ->getOptionLabelUsing(fn ($value) =>
                    Car::find($value)?->vin ?? ''
                )
                ->statePath('car_ids')
                ->reactive()
                ->required(),
                TextInput::make('export_customs')
                ->required(),
                TextInput::make('import_customs'),
                DatePicker::make('date_of_unloading'),
                TextInput::make('place_of_unloading')
                ->required(),
                TextInput::make('important'),
            ]);
    }
}
