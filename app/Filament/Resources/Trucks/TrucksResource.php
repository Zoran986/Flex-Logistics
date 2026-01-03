<?php

namespace App\Filament\Resources\Trucks;

use App\Filament\Resources\Trucks\Pages\CreateTrucks;
use App\Filament\Resources\Trucks\Pages\EditTrucks;
use App\Filament\Resources\Trucks\Pages\ListTrucks;
use App\Filament\Resources\Trucks\Schemas\TrucksForm;
use App\Filament\Resources\Trucks\Tables\TrucksTable;
use App\Models\Truck;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrucksResource extends Resource
{
    protected static ?string $model = Truck::class;

     protected static ?string $recordTitleAttribute = 'yes';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Truck;

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return TrucksForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrucksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    

    public static function getPages(): array
    {
        return [
            'index' => ListTrucks::route('/'),
            'create' => CreateTrucks::route('/create'),
            'edit' => EditTrucks::route('/{record}/edit'),
        ];
    }

    
}
