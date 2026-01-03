<?php

namespace App\Filament\Resources\Companies\RelationManagers;

use App\Models\Car;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\DissociateBulkAction;
use Filament\Resources\RelationManagers\RelationManager;

class CarsRelationManager extends RelationManager
{
    protected static string $relationship = 'cars';


    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('mark')
                    ->required(),
                TextInput::make('model')
                    ->required(),
                TextInput::make('vin'),
                TextInput::make('car_mass')
                    ->label('Net mass'),
                TextInput::make('price'),
                TextInput::make('pickup_code'),
                Select::make('pickup_location')
                    ->options([
                        'Novo Mesto' => 'Novo Mesto',
                        'Pojatno' => 'Pojatno',
                    ])
                    ->native(false),
                Textarea::make('notes')
                    ->label('Notes')
                    ->rows(4)
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->label('Available')
                    ->default(true),

            ]);
    }


    public function table(Table $table): Table
    {
        return $table
            ->filters([
                Filter::make('active')
                    ->label('Active cars')
                    ->query(fn($query) => $query->whereNull('invoice_id'))
                    ->default(),

                Filter::make('old')
                    ->label('Old / Invoiced cars')
                    ->query(fn($query) => $query->whereNotNull('invoice_id')),

                // quick year
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')->displayFormat('d/m/Y'),
                        DatePicker::make('until')->displayFormat('d/m/Y'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['from'] ?? null,
                                fn($q, $date) => $q->whereDate('created_at', '>=', $date)
                            )
                            ->when(
                                $data['until'] ?? null,
                                fn($q, $date) => $q->whereDate('created_at', '<=', $date)
                            );
                    })

            ])

            ->columns([
                TextColumn::make('vin')
                    ->searchable(),

                TextColumn::make('mark')
                    ->searchable(),

                TextColumn::make('model')
                    ->searchable(),

                TextColumn::make('invoice.invoice_number')
                    ->label('Invoice')
                    ->placeholder('-'),

                IconColumn::make('invoice_id')
                    ->label('Locked')
                    ->boolean()
                    ->trueIcon('heroicon-o-lock-closed')
                    ->falseIcon('heroicon-o-lock-open')
                    ->trueColor('danger')
                    ->falseColor('success'),
            ])

            // 🔒 Grey out invoiced rows
            ->recordClasses(
                fn($record) =>
                $record->invoice_id
                ? 'opacity-50 pointer-events-none'
                : null
            )
            ->headerActions([
                // Create new car for this company only
                CreateAction::make(),

                // ❌ DO NOT use AssociateAction because it shows ALL cars
                // and ignores your filtering
                // Tables\Actions\AssociateAction::make(),
            ])

            ->recordActions([
                // ✏️ Edit only if NOT invoiced
                EditAction::make()
                    ->visible(fn($record) => is_null($record->invoice_id)),

                // 🗑 Delete only if NOT invoiced
                DeleteAction::make()
                    ->visible(fn($record) => is_null($record->invoice_id)),

                // 📄 Invoice PDF button (only if invoiced)
                Action::make('invoice_pdf')
                    ->label('Invoice PDF')
                    ->icon('heroicon-o-document-text')
                    ->color('gray')
                    ->visible(fn($record) => !is_null($record->invoice_id))
                    ->url(
                        fn($record) =>
                        route('invoice.pdf', $record->invoice_id)
                    )
                    ->openUrlInNewTab(),
            ]);
    }




}


