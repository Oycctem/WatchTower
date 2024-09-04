<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionCongeResource\Pages;
use App\Filament\Resources\GestionCongeResource\RelationManagers;
use App\Models\GestionConge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GestionCongeResource extends Resource
{
    protected static ?string $model = GestionConge::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    protected static ?string $label = 'Leave management';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->schema([
                    Forms\Components\Select::make('staff_id')
                        ->label('Agents\' name')
                        ->options(function () {
                            return \App\Models\Staff::all()->pluck('full_name', 'id');
                        })
                        ->required()
                        ->columnSpan('full'),
                    Forms\Components\DatePicker::make('debut_conge')
                        ->label('Begin in')
                        ->suffixIcon('heroicon-m-calendar-days')
                        ->native(false)
                        ->required(),
                    Forms\Components\DatePicker::make('fin_conge')
                        ->label('End in')
                        ->suffixIcon('heroicon-m-calendar-days')
                        ->native(false)
                        ->required(),
                    Forms\Components\Textarea::make('raison_conge')
                        ->label('Reason')
                        ->required()
                        ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.full_name')
                    ->label('Agents\' name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('debut_conge')
                    ->label('Begin in')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fin_conge')
                    ->label('End in')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListGestionConges::route('/'),
            'create' => Pages\CreateGestionConge::route('/create'),
            'view' => Pages\ViewGestionConge::route('/{record}'),
            'edit' => Pages\EditGestionConge::route('/{record}/edit'),
        ];
    }
}
