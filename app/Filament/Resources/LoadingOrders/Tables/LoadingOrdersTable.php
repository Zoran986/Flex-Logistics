<?php

namespace App\Filament\Resources\LoadingOrders\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class LoadingOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('loading_order_number')
                ->label('Number')
                ->sortable()
                ->searchable(),
                TextColumn::make('driver'),
                TextColumn::make('truck_number'),
                TextColumn::make('destination'),
                TextColumn::make('date_of_loading')
                ->label('Date loading')
                 ->date('d/m/Y'),
                TextColumn::make('place_of_loading')
                ->label('Place loading'),
                TextColumn::make('cars.vin')
                ->label('VIN(s)')
                ->listWithLineBreaks()
                ->limitList(3) // optional: show first 3
                ->expandableLimitedList() // optional: expand on click
                ->wrap(),
                TextColumn::make('export_customs')
                ->label('Exp. customs'),
                TextColumn::make('import_customs')
                ->label('Imp. customs'),
                TextColumn::make('date_of_unloading')
                ->label('Date unloading')
                 ->date('d/m/Y'),
                TextColumn::make('place_of_unloading')
                ->label('Place unloading'),
                TextColumn::make('important'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('download_pdf')
                ->label('PDF')
                ->url(fn ($record) => route('loadingorder.pdf', $record->id))
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
