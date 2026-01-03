<?php

namespace App\Filament\Resources\Trucks\Tables;

use App\Models\Truck;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class TrucksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('plate_number'),
                TextColumn::make('expire_date')
                    ->label('Expire Date')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('model'),
                TextColumn::make('vin'),
                TextColumn::make('certificate_date'),
                TextColumn::make('pp_service'),
                TextColumn::make('capacity'),
                IconColumn::make('status')
                    ->label('Active')
                    ->boolean(),
            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
