<?php

namespace App\Filament\Resources\LoadingOrders;

use App\Filament\Resources\LoadingOrders\Pages\CreateLoadingOrder;
use App\Filament\Resources\LoadingOrders\Pages\EditLoadingOrder;
use App\Filament\Resources\LoadingOrders\Pages\ListLoadingOrders;
use App\Filament\Resources\LoadingOrders\Schemas\LoadingOrderForm;
use App\Filament\Resources\LoadingOrders\Tables\LoadingOrdersTable;
use App\Models\LoadingOrder;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LoadingOrderResource extends Resource
{
    protected static ?string $model = LoadingOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

     protected static string | UnitEnum | null $navigationGroup = 'Billing';

        protected static ?int $navigationSort = 2;

     public static function getPluralLabel(): string
    {
        return 'Transport Order'; // plural
    }

    public static function form(Schema $schema): Schema
    {
        return LoadingOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LoadingOrdersTable::configure($table);
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
            'index' => ListLoadingOrders::route('/'),
            'create' => CreateLoadingOrder::route('/create'),
            'edit' => EditLoadingOrder::route('/{record}/edit'),
        ];
    }
}
