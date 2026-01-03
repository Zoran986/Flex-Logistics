<?php

namespace App\Filament\Resources\TruckLocations\Tables;

use App\Models\Truck;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class TruckLocationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('truck.id')
                    
                    ->label('Truck')
                    ->searchable(),

               TextColumn::make('latitude')
                    ->label('Lat'),

                TextColumn::make('longitude')
                    ->label('Lng'),

                TextColumn::make('speed')
                    ->label('Speed km/h'),

                TextColumn::make('recorded_at')
                    ->label('Updated')
                    ->since(),
            ])
            ->poll('10s')// auto refresh
            
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
