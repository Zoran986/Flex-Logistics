<?php

namespace App\Filament\Resources\Routes\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\ToggleColumn;

class RoutesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('travel_order')->label('Travel Order')->sortable()->searchable(),
                TextColumn::make('date_issued')
                    ->label('Date')
                    ->date('d/m/Y')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('destination')
                    ->label('Destination')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('driver.name')
                    ->label('Driver')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tour_payment')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('bank_amount')
                    ->label('Bank Amount')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('visa')
                    ->label('Visa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('cash')
                    ->label('Cash')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('balance')
                    ->label('Balance')
                    ->state(fn($record) => (float) ($record->tour_payment - $record->bank_amount - $record->cash))
                    ->numeric(decimalPlaces: 2)
                    ->color(fn($record) => $record->paid ? 'success' : 'danger'),
                IconColumn::make('paid')
                    ->label('Paid')
                    ->boolean(),
            ])
            ->filters([
                Filter::make('unpaid')
                    ->label('Unpaid')
                    ->query(fn($query) => $query->where('paid', 0)),
                Filter::make('paid')
                    ->label('Paid')
                    ->query(fn($query) => $query->where('paid', 1)),
                // quick year
               Filter::make('date_issued')
                    ->form([
                        DatePicker::make('from')->displayFormat('d/m/Y'),
                        DatePicker::make('until')->displayFormat('d/m/Y'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['from'] ?? null,
                                fn($q, $date) => $q->whereDate('date_issued', '>=', $date)
                            )
                            ->when(
                                $data['until'] ?? null,
                                fn($q, $date) => $q->whereDate('date_issued', '<=', $date)
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
