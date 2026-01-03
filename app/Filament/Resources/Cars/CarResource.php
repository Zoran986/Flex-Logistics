<?php

namespace App\Filament\Resources\Cars;

use Dom\Text;
use BackedEnum;
use App\Models\Car;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\Cars\Pages\EditCar;
use App\Filament\Resources\Cars\Pages\ListCars;
use App\Filament\Resources\Cars\Pages\CreateCar;
use App\Filament\Resources\Cars\Schemas\CarForm;
use App\Filament\Resources\Cars\Tables\CarsTable;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocument;

    protected static ?string $recordTitleAttribute = 'yes';

    protected static ?int $navigationSort = 1;

    public static function getPluralLabel(): string
    {
        return 'Orders'; // plural
    }


    public static function getGloballySearchableAttributes(): array
    {
        return ['model', 'vin', 'pickup_code', 'company.name', 'driver.name'];
    }

    public static function form(Schema $schema): Schema
    {
        return CarForm::configure($schema);
       
    }

    public static function table(Table $table): Table
    {
        return CarsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canEdit(Model $record): bool
    {
        return is_null($record->invoice_id);
    }

    public static function canDelete(Model $record): bool
    {
        return is_null($record->invoice_id);
    }



    public static function getPages(): array
    {
        return [
            'index' => ListCars::route('/'),
            'create' => CreateCar::route('/create'),
            'edit' => EditCar::route('/{record}/edit'),
        ];
    }
}
