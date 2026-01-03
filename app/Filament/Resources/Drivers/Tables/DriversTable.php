<?php

namespace App\Filament\Resources\Drivers\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class DriversTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('truck.plate_number')
                ->label('Truck')
                 ->placeholder('-')
                ->sortable()
                ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('surname')
                    ->searchable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('postal_code')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('passport_number')
                    ->searchable(),
                 TextColumn::make('passport_date')
                    ->label('Passport expired')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->searchable(),        
                TextColumn::make('phone_number')
                    ->searchable(),
                IconColumn::make('status')
                    ->label('Active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('first_working_day')
                    ->label('Start')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('last_working_day')
                    ->label('Finished')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),
                    
        ])
        ->filters([
            Filter::make('pending_reminders')
                ->label('Pending Reminders')
                ->query(fn ($query) => $query->where('registration_reminder_sent', false)
                    ->whereNotNull('registration_date')
                    ->where('registration_date', '>', now()->addWeek()))
                ->default(),
                
            Filter::make('reminder_due_soon')
                ->label('Reminder Due Soon (Next 3 days)')
                ->query(fn ($query) => $query->where('registration_reminder_sent', false)
                    ->whereNotNull('registration_date')
                    ->whereDate('registration_date', '<=', now()->addWeek()->addDays(3))
                    ->whereDate('registration_date', '>', now())),
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
