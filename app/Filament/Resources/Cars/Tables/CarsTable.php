<?php

namespace App\Filament\Resources\Cars\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class CarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) =>
                $query->whereNull('invoice_id')
            )
            ->columns([
                TextColumn::make('driver.name')
                ->label('Driver')
                ->sortable()
                ->searchable(),
                TextColumn::make('company.name')
                ->label('Company')
                ->sortable()
                ->searchable(),
                TextColumn::make('mark')
                ->label('Mark')
                ->sortable()
                ->searchable(),
                TextColumn::make('model')
                ->label('Model')
                ->sortable()
                ->searchable(),
                TextColumn::make('vin')
                ->label('VIN')
                ->sortable()
                ->searchable(),
                TextColumn::make('car_mass')
                ->label('Net mass'),
                TextColumn::make('price'),
                TextColumn::make('pickup_code')
                ->label('Pickup Code')
                ->sortable()
                ->searchable(),
                TextColumn::make('pickup_location')
                ->label('Pickup Location')
                ->sortable()
                ->searchable(),
                TextColumn::make('notes')
                ->label('Notes')
                ->sortable()
                ->searchable(),
                IconColumn::make('status')
                    ->label('Available')
                    ->boolean(),
                    
            ])
            ->filters([
                //
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
