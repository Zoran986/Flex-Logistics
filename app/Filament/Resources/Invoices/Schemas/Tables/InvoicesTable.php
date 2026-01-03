<?php

namespace App\Filament\Resources\Invoices\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class InvoicesTable
{

    public static function mutateFormDataBeforeSave(array $data): array
    {
        session(['cars_selected' => $data['car_id'] ?? []]);
        unset($data['car_id']); // remove from main table (not needed)

        return $data;
    }

    public static function saved($record)
    {
        $cars = session('cars_selected', []);
        $record->cars()->sync($cars);
    }
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')->label('Invoice No')->sortable()->searchable(),
                TextColumn::make('date_issued')
                    ->label('Date')
                     ->date('d/m/Y')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('company.name')->label('Company')->sortable()->searchable(),
                TextColumn::make('route.destination')->label('Route')->sortable()->searchable(),
                TextColumn::make('driver.name')->label('Driver')->sortable()->searchable(),
                TextColumn::make('cmr')->label('CMR')->sortable()->searchable(),
                TextColumn::make('cars_count')
                    ->label('Cars')
                    ->counts('cars'),
                TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->getStateUsing(fn($record) => number_format($record->totalAmount(), 2))
                    ->sortable()
                    ->money('mk')
                    ->label('Total Amount')
                    ->color(fn($record) => $record->paid ? 'success' : 'danger')
                    ->sortable()->searchable(),
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
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('download_pdf')
                    ->label('PDF')
                    ->url(fn($record) => route('invoice.pdf', $record->id))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-printer'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);

    }
    public static function getRelations(): array
    {
        return [];
    }
}
