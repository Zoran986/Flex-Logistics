<?php

namespace App\Filament\Resources\TrucksServices\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;

class TrucksServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service_date')
                ->searchable()
                ->date('d/m/Y'),
                TextColumn::make('shop_name')
                ->searchable(),
                TextColumn::make('shop_invoice')
                ->label('Invoice number')
                ->searchable(),
                TextColumn::make('truck.plate_number')
                ->searchable()
                ->label('Truck'),
                TextColumn::make('service_type')
                ->searchable(),
                TextColumn::make('service_date')
                ->searchable()
                ->date('d/m/Y'),
                TextColumn::make('mileage')
                ->numeric()
                ->searchable(),
                TextColumn::make('notes')
                ->searchable(),
                TextColumn::make('price')
                ->numeric(decimalPlaces: 2)
                ->color(fn($record) => $record->status ? 'success' : 'danger'),
                IconColumn::make('status')
                ->boolean(),
            ])
            ->filters([
                Filter::make('service_date')
                    ->form([
                        DatePicker::make('from')->displayFormat('d/m/Y'),
                        DatePicker::make('until')->displayFormat('d/m/Y'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['from'] ?? null,
                                fn($q, $date) => $q->whereDate('service_date', '>=', $date)
                            )
                            ->when(
                                $data['until'] ?? null,
                                fn($q, $date) => $q->whereDate('service_date', '<=', $date)
                            );
                    })
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
