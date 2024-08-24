<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RapportIncidentResource\Pages;
use App\Filament\Resources\RapportIncidentResource\RelationManagers;
use App\Models\RapportIncident;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RapportIncidentResource extends Resource
{
    protected static ?string $model = RapportIncident::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lieu_incident')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('gravite_incident')
                    ->options([
                        'mineur' => 'Mineur',
                        'modéré' => 'Modéré',
                        'majeur' => 'Majeur',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('date_incident')
                    ->suffixIcon('heroicon-m-calendar-days')
                    ->native(false)
                    ->required(),
                Forms\Components\TimePicker::make('heure_incident')
                    ->suffixIcon('heroicon-m-clock')
                    ->native(false)
                    ->required(),
                Forms\Components\Textarea::make('description_incident')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_incident')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('heure_incident')
                    ->Time()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lieu_incident')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gravite_incident'),
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
            'index' => Pages\ListRapportIncidents::route('/'),
            'create' => Pages\CreateRapportIncident::route('/create'),
            'view' => Pages\ViewRapportIncident::route('/{record}'),
            'edit' => Pages\EditRapportIncident::route('/{record}/edit'),
        ];
    }
}
