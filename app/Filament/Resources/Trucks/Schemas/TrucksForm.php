<?php

namespace App\Filament\Resources\Trucks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;

class TrucksForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plate_number'),
                DatePicker::make('expire_date')
                ->displayFormat('d/m/Y')
                ->native(false),
                TextInput::make('model'),
                TextInput::make('vin'),
                DatePicker::make('certificate_date'),
                DatePicker::make('pp_service')
                ->label('PP Service')
                    ->required()
                    ->displayFormat('d/m/Y')
                    ->native(false),
                TextInput::make('capacity'),
                Toggle::make('status')
                    ->label('Status')
                    ->default(true),
            ]);
    }
}
