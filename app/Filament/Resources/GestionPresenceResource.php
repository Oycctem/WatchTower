<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GestionPresenceResource\Pages;
use App\Models\GestionPresence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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
                Forms\Components\Section::make('')
                ->schema([
                    Forms\Components\Select::make('staff_id')
                        ->label('Agent\'s name')
                        ->options(function () {
                            return \App\Models\Staff::all()->pluck('full_name', 'id');
                        })
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn (callable $set, $state) => $set('staff.full_name', \App\Models\Staff::find($state)?->full_name ?? '')),
                    Forms\Components\Select::make('statut_presence')
                        ->label('Status')
                        ->options([
                            'présent' => 'Present',
                            'absent' => 'Absent',
                            'retard' => 'Late',
                        ])
                        ->required(),
                    Forms\Components\DatePicker::make('date_presence')
                        ->label('Date')
                        ->suffixIcon('heroicon-m-calendar-days')
                        ->native(false)
                        ->columnSpan('full')
                        ->required(),
                        ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.full_name')
                    ->label('Full name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_presence')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('statut_presence')
                    ->label('Status'),
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
