<?php

namespace App\Filament\Resources\Companies\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class CompaniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
                TextColumn::make('address')
                ->label('Address')
                ->sortable()
                ->searchable(),
                TextColumn::make('phone_number'
                )->label('Phone')
                ->sortable()
                ->searchable(),
                TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable(),
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
