<?php

namespace App\Filament\Resources\Drivers\Schemas;

use App\Models\Truck;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('surname'),
                Select::make('truck_id')
                    ->label('Truck')
                    ->searchable()
                    ->preload()
                    ->options(function ($record) {
                        return Truck::query()
                            // show trucks that are NOT assigned to any driver
                            ->whereDoesntHave('drivers')

                            // EDIT MODE → also show currently assigned truck
                            ->when($record, function ($query) use ($record) {
                                $query->orWhere('id', $record->truck_id);
                            })

                            ->pluck('plate_number', 'id');
                    })
                    ->nullable(),
                TextInput::make('address'),
                TextInput::make('city'),
                TextInput::make('postal_code'),
                TextInput::make('country'),
                TextInput::make('passport_number'),
                DatePicker::make('passport_date')
                    ->label('Passport Date')
                    ->native(false)
                    ->displayFormat('d.m.Y')
                    ->closeOnDateSelection(),
                TextInput::make('phone_number')
                    ->tel(),
                DatePicker::make('first_working_day')
                    ->label('Start')
                    ->native(false)
                    ->displayFormat('d.m.Y')
                    ->closeOnDateSelection(),
                DatePicker::make('last_working_day')
                    ->label('Finished')
                    ->native(false)
                    ->displayFormat('d.m.Y')
                    ->closeOnDateSelection(),
                Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
