<?php

namespace App\Filament\Resources\Cars\Schemas;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Company;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        
            ->components([
                Select::make('company_id')
                ->options(Company::query()->pluck('name', 'id'))
                ->label('Company')
                ->searchable(),
                Select::make('driver_id')
                ->label('Driver')
                ->options(Driver::query()
                ->whereNotNull('status')
                ->pluck('name', 'id'))
                ->preload()
                ->searchable(),
                TextInput::make('mark'), 
                TextInput::make('model')
                ->label('Model'),
                TextInput::make('vin')
                ->label('Vin'),
                TextInput::make('car_mass')
                ->label('Net mass'),
                TextInput::make('price')
                ->label('Price'),
                TextInput::make('pickup_code')
                ->label('Pickup Code'),
                Select::make('pickup_location')
                ->label('Pickup Location')
                 ->options([
                    'Novo Mesto' => 'Novo Mesto',
                    'Pojatno' => 'Pojatno',
                ])
                ->native(false),
                Toggle::make('status')
                    ->label('Available')
                    ->default(true)
                ->required(),  
                Textarea::make('notes')
                ->label('Notes')
                ->rows(4)
                ->columnSpanFull(), 
                
            ]);
    }

    
}
