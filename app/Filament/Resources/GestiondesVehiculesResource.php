<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestiondesVehiculesResource\Pages;
use App\Filament\Resources\GestiondesVehiculesResource\RelationManagers;
use App\Models\GestiondesVehicules;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GestiondesVehiculesResource extends Resource
{
    protected static ?string $model = GestiondesVehicules::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Vehicle management';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'unavailable' => 'Unavailable',
                        'maintenance' => 'Maintenance',
                        'sold' => 'Sold',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('model')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                // Add filters if needed
                Tables\Filters\Filter::make('Available')->query(fn ($query) => $query->where('status', 'available')),
                Tables\Filters\Filter::make('Unavailable')->query(fn ($query) => $query->where('status', 'unavailable')),
                Tables\Filters\Filter::make('Maintenance')->query(fn ($query) => $query->where('status', 'maintenance')),
                Tables\Filters\Filter::make('Sold')->query(fn ($query) => $query->where('status', 'sold')),
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
            'index' => Pages\ListGestiondesVehicules::route('/'),
            'create' => Pages\CreateGestiondesVehicules::route('/create'),
            'view' => Pages\ViewGestiondesVehicules::route('/{record}'),
            'edit' => Pages\EditGestiondesVehicules::route('/{record}/edit'),
        ];
    }
}
