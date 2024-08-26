<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionPresenceResource\Pages;
use App\Filament\Resources\GestionPresenceResource\RelationManagers;
use App\Models\GestionPresence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GestionPresenceResource extends Resource
{
    protected static ?string $model = GestionPresence::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $label = 'Attendance management';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('staff_id')
                    ->label('Nom agent')
                    ->options(function () {
                        return \App\Models\Staff::all()->pluck('full_name', 'id');
                    })
                    ->required(),
                Forms\Components\Select::make('statut_presence')
                    ->options([
                        'présent' => 'Présent',
                        'absent' => 'Absent',
                        'retard' => 'Retard',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('date_presence')
                    ->suffixIcon('heroicon-m-calendar-days')
                    ->native(false)
                    ->columnSpan('full')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom_agent')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_presence')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('statut_presence'),
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
            'index' => Pages\ListGestionPresences::route('/'),
            'create' => Pages\CreateGestionPresence::route('/create'),
            'view' => Pages\ViewGestionPresence::route('/{record}'),
            'edit' => Pages\EditGestionPresence::route('/{record}/edit'),
        ];
    }
}
