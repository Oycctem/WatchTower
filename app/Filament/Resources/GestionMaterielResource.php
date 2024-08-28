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
                Forms\Components\Section::make('')
                ->schema([
                    Forms\Components\TextInput::make('id_equipement')
                        ->label('Equipement id')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nom_equipement')
                        ->label('Equipement name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('statut_equipement')
                        ->label('Equipement status')
                        ->options([
                            'in good condition' => 'In good condition',
                            'under maintenance' => 'Under maintenance',
                            'out of service' => 'Out of service',
            
                        ])
                        ->columnSpan('full')
                        ->required(),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_equipement')
                    ->label('Equipement id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nom_equipement')
                    ->label('Equipement name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('statut_equipement')
                    ->label('Equipement status'),
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
