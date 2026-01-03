<?php

namespace App\Filament\Resources\TruckLocations;

use App\Filament\Resources\TruckLocations\Pages\CreateTruckLocation;
use App\Filament\Resources\TruckLocations\Pages\EditTruckLocation;
use App\Filament\Resources\TruckLocations\Pages\ListTruckLocations;
use App\Filament\Resources\TruckLocations\Schemas\TruckLocationForm;
use App\Filament\Resources\TruckLocations\Tables\TruckLocationsTable;
use App\Models\TruckLocation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TruckLocationResource extends Resource
{
    protected static ?string $model = TruckLocation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TruckLocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TruckLocationsTable::configure($table);
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
            'index' => ListTruckLocations::route('/'),
            'create' => CreateTruckLocation::route('/create'),
            'edit' => EditTruckLocation::route('/{record}/edit'),
        ];
    }
}
