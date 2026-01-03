<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->label('Name')
                ->required(),
                TextInput::make('address')
                ->label('Address')
                ->required(),
                TextInput::make('city')
                ->label('City')
                ->required(),
                TextInput::make('postal_code')
                ->required(),
                TextInput::make('country')
                ->label('Country')
                ->required(),
                TextInput::make('tax_id')
                ->label('Tax ID')
                ->required(),
                TextInput::make('phone_number')->label('Phone'),
                TextInput::make('email')->label('Email'),
            ]);
    }
}
