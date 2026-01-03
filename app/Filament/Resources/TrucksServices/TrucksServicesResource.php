<?php

namespace App\Filament\Resources\TrucksServices;

use App\Filament\Resources\TrucksServices\Pages\CreateTrucksServices;
use App\Filament\Resources\TrucksServices\Pages\EditTrucksServices;
use App\Filament\Resources\TrucksServices\Pages\ListTrucksServices;
use App\Filament\Resources\TrucksServices\Schemas\TrucksServicesForm;
use App\Filament\Resources\TrucksServices\Tables\TrucksServicesTable;
use App\Models\TruckService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrucksServicesResource extends Resource
{
    protected static ?string $model = TruckService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::WrenchScrewdriver;

    protected static ?string $recordTitleAttribute = 'yes';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return TrucksServicesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrucksServicesTable::configure($table);
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
            'index' => ListTrucksServices::route('/'),
            'create' => CreateTrucksServices::route('/create'),
            'edit' => EditTrucksServices::route('/{record}/edit'),
        ];
    }
}
