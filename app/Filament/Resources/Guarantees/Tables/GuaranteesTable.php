<?php

namespace App\Filament\Resources\Guarantees\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class GuaranteesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('Number'),
                TextColumn::make('firm'),
                TextColumn::make('place'),
                TextColumn::make('custom_destination'),
                TextColumn::make('carrier'),
                TextColumn::make('vehicle_registration'),
                TextColumn::make('cars_total_mass')
                ->label('Total Weight')
                ->getStateUsing(fn ($record) =>
                    $record->cars->sum('car_mass') . ' kg'
                )
                ->alignRight(),
                TextColumn::make('cars_total_price')
                ->label('Total Price')
                ->getStateUsing(fn ($record) =>
                    '€ ' . number_format($record->cars->sum('price'), 2)
                )
                ->sortable()
                ->alignRight(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('download_pdf')
                ->label('PDF')
                ->url(fn ($record) => route('guarantee.pdf', $record->id))
                ->openUrlInNewTab()
                ->icon('heroicon-o-printer'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
