<?php

namespace App\Filament\Resources\Guarantees;

use App\Filament\Resources\Guarantees\Pages\CreateGuarantee;
use App\Filament\Resources\Guarantees\Pages\EditGuarantee;
use App\Filament\Resources\Guarantees\Pages\ListGuarantees;
use App\Filament\Resources\Guarantees\Schemas\GuaranteeForm;
use App\Filament\Resources\Guarantees\Tables\GuaranteesTable;
use App\Models\Guarantee;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GuaranteeResource extends Resource
{
    protected static ?string $model = Guarantee::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentPlus;


    protected static string | UnitEnum | null $navigationGroup = 'Billing';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'Guarantee';

    public static function form(Schema $schema): Schema
    {
        return GuaranteeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GuaranteesTable::configure($table);
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
            'index' => ListGuarantees::route('/'),
            'create' => CreateGuarantee::route('/create'),
            'edit' => EditGuarantee::route('/{record}/edit'),
        ];
    }
}
