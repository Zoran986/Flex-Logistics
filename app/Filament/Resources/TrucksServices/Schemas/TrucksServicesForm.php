<?php

namespace App\Filament\Resources\TrucksServices\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextInputColumn;

class TrucksServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('service_date'),
                TextInput::make('shop_name'),
                TextInput::make('shop_invoice'),
                Select::make('truck_id')
                ->relationship('truck', 'plate_number')
                ->required()
                ->searchable()
                ->preload(),
                TextInput::make('service_type'),
                TextInput::make('mileage')
                ->numeric(),
                Textarea::make('notes'),
                TextInput::make('price')
                ->numeric(),
                Toggle::make('status')
                    ->label('Status')
                    ->default(true),
            ]);
    }
}
