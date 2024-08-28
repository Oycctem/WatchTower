<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionAccesResource\Pages;
use App\Models\GestionAcces;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GestionAccesResource extends Resource
{
    protected static ?string $model = GestionAcces::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $label = 'Access management';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->schema([
                    Forms\Components\Select::make('staff_id')
                        ->label('Agent\'s name')
                        ->options(function () {
                            return \App\Models\Staff::all()->pluck('full_name', 'id');
                        })
                        ->required()
                        ->columnSpan('full'),
                    Forms\Components\DatePicker::make('date_acces')
                        ->label('Access date')
                        ->suffixIcon('heroicon-m-calendar-days')
                        ->native(false)
                        ->required(),
                    Forms\Components\TimePicker::make('heure_acces')
                        ->label('Access time')
                        ->suffixIcon('heroicon-m-clock')
                        ->native(false)
                        ->required(),
                    Forms\Components\Select::make('type_acces')
                        ->label('Access type')
                        ->options([
                            'entrée' => 'Entrée',
                            'sortie' => 'Sortie',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('lieu_acces')
                        ->required()
                        ->maxLength(255),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.full_name') // Correct column to show staff's full name
                    ->label('Agent')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_acces')
                    ->label('Access Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('heure_acces')
                    ->label('Access Time')
                    ->sortable(),
                Tables\Columns\TextColumn::make('lieu_acces')
                    ->label('Access Place')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_acces')
                    ->label('Access Type'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Define any filters if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define any relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGestionAcces::route('/'),
            'create' => Pages\CreateGestionAcces::route('/create'),
            'view' => Pages\ViewGestionAcces::route('/{record}'),
            'edit' => Pages\EditGestionAcces::route('/{record}/edit'),
        ];
    }
}
