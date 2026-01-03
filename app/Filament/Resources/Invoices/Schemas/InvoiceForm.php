<?php

namespace App\Filament\Resources\Invoices\Schemas;

use App\Models\Car;
use App\Models\Route;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Invoice;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Contracts\Database\Eloquent\Builder;



class InvoiceForm
{
    /**
     * Configures the form schema for Invoice creation/editing.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('invoice_number')
                    ->label('Invoice Number')
                    ->default(fn() => (Invoice::max('invoice_number') ?? 0) + 1)
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                DatePicker::make('date_issued')
                    ->label('Date issued')
                    ->required()
                    ->displayFormat('d/m/Y')
                    ->native(false),

                DatePicker::make('date_payment')
                    ->label('Date payment')
                    ->required()
                    ->displayFormat('d/m/Y')
                    ->native(false),
                TextInput::make('amount')
                    ->type('number')
                    ->numeric()
                    ->required(),

                /* * COMPANY (FIX: Ensures 'name' is never null in options) 
                 */
                Select::make('company_id')
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
                    ->getOptionLabelUsing(
                        fn($value) =>
                        Car::find($value)?->vin ?? ''
                    )
                    ->statePath('car_ids')
                    ->reactive()
                    ->required(),


                /* * DRIVER (FIX: Already filtering by whereNotNull('name'), ensuring label is safe)
                 */
                Select::make('driver_id')
                    ->label('Driver')
                    ->options(function (callable $get) {
                        $carIds = $get('car_ids') ?? [];
                        if (empty($carIds))
                            return [];

                        $driverIds = Car::whereIn('id', $carIds)
                            ->whereNotNull('driver_id')
                            ->pluck('driver_id');

                        return Driver::whereIn('id', $driverIds)
                            // Crucially ensures no NULL names are returned as options
                            ->whereNotNull('name')
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->required()
                    ->reactive()
                    ->searchable(),

                /* * ROUTE (CRITICAL FIX: Ensures 'destination' is not null) 
                 * This was the MOST likely source of the error.
                 */
                Select::make('route_id')
                    ->label('Route')
                    ->options(function (callable $get) {
                        $driverId = $get('driver_id');

                        if (!$driverId)
                            return [];

                        // IMPORTANT: Filter out routes where destination is NULL before fetching the latest
                        $route = Route::where('driver_id', $driverId)
                            ->whereNotNull('destination') // <-- ADDED THIS CRITICAL LINE
                            ->latest()
                            ->first();

                        if (!$route)
                            return [];

                        // Since we filtered above, $route->destination should now be a string.
                        return [
                            $route->id => $route->destination,
                        ];
                    })
                    ->searchable()
                    ->required()
                    ->reactive(),

                TextInput::make('cmr')->required(),

                Toggle::make('paid')
                    ->label('Paid')
                    ->default(false),
            ]);
    }
}