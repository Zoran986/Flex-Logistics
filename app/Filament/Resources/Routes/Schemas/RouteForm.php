<?php

namespace App\Filament\Resources\Routes\Schemas;

use Date;
use App\Models\Route;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class RouteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('travel_order')
                ->label('Travel Order')
                ->default(function () {
                    return (Route::max('travel_order') ?? 0) + 1;
                })
                ->disabled()      // user sees it but cannot change it
                ->dehydrated()    // required so value is actually saved
                ->required(),
                DatePicker::make('date_issued')
                    ->label('Date')
                    ->native(false)
                    ->format('Y-m-d')
                    ->displayFormat('d/m/Y')
                    ->required(),
                TextInput::make('destination')->label('Destination'),
                 Select::make('driver_id')
                    ->relationship(name: 'driver', titleAttribute: 'name')
                    ->preload()
                    ->searchable(),
                TextInput::make('tour_payment')
                ->label('Tour Payment')
                ->type('number'),
                TextInput::make('bank_amount')
                ->label('Bank Amount')
                ->type('number'),
                TextInput::make('visa')
                ->label('Visa')
                ->type('number'), 
                TextInput::make('cash')
                ->label('Cash')
                ->type('number'),
                TextInput::make('balance')
                    ->label('Balance')
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $bank_amount = $get('bank_amount') ?? 0;
                    $cash = $get('cash') ?? 0;
                    $set('balance', $bank_amount - $cash);
                    })
                    ->disabled()
                    ->dehydrated(false)
                    ->hidden(),
                Toggle::make('paid')
                    ->label('Paid')
                    ->default(false)
                ->required(), 
                ]);
    }
}
