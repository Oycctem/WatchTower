<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionMaterielResource\Pages;
use App\Filament\Resources\GestionMaterielResource\RelationManagers;
use App\Models\GestionMateriel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GestionMaterielResource extends Resource
{
    protected static ?string $model = GestionMateriel::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $label = 'Material management';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_equipement')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nom_equipement')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('statut_equipement')
                    ->options([
                        'en bon état' => 'En bon état',
                        'en réparation' => 'En réparation',
                        'hors service' => 'Hors service',
         
                    ])
                    ->columnSpan('full')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_equipement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nom_equipement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('statut_equipement'),
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
            'index' => Pages\ListGestionMateriels::route('/'),
            'create' => Pages\CreateGestionMateriel::route('/create'),
            'view' => Pages\ViewGestionMateriel::route('/{record}'),
            'edit' => Pages\EditGestionMateriel::route('/{record}/edit'),
        ];
    }
}
