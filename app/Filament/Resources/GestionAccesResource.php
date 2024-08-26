<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionAccesResource\Pages;
use App\Filament\Resources\GestionAccesResource\RelationManagers;
use App\Models\GestionAcces;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Agent')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_acces')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('heure_acces'),
                Tables\Columns\TextColumn::make('lieu_acces')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_acces'),
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
                //
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
            //
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
