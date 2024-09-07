<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use App\Models\Cities;  // Updated model name
use App\Models\Etablissement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Agents';

    protected static ?string $navigationGroup = 'Staff';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal details')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('cin')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('passport')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\Select::make('region_id')
                            ->relationship('region', 'name')
                            ->reactive()
                            ->required(),
                        Forms\Components\Select::make('city_id')
                            ->label('City')
                            ->relationship('city', 'name')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('etablissement_id', null))
                            ->options(function (callable $get) {
                                $regionId = $get('region_id');
                                if ($regionId) {
                                    return Cities::where('region_id', $regionId)->pluck('name', 'id');
                                }
                                return Cities::pluck('name', 'id');
                            }),
                        Forms\Components\Select::make('etablissement_id')
                            ->label('Etablissement')
                            ->relationship('etablissement', 'name')
                            ->required()
                            ->reactive()
                            ->options(function (callable $get) {
                                $cityId = $get('city_id');
                                if ($cityId) {
                                    return Etablissement::where('city_id', $cityId)->pluck('name', 'id');
                                }
                                return Etablissement::pluck('name', 'id');
                            }),
                        Forms\Components\Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required(),
                        Forms\Components\Select::make('marital_status')
                            ->options([
                                'single' => 'Single',
                                'married' => 'Married',
                                'divorced' => 'Divorced',
                                'other' => 'Other',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('phone_number_one')
                            ->tel()
                            ->required()
                            ->maxLength(15),
                    ])->columns(2),
                Forms\Components\Section::make('Emergency_contact')
                    ->schema([
                        Forms\Components\TextInput::make('Emergency_Contact_Name')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('Emergency_Contact_Phone')
                            ->numeric()
                            ->maxLength(15),
                    ])->columns(2),
                Forms\Components\Section::make('Additional Details')
                    ->schema([
                        Forms\Components\TextInput::make('picture')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('age')
                            ->numeric(),
                        Forms\Components\Select::make('sexe')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('clothes_size')
                            ->maxLength(10),
                        Forms\Components\TextInput::make('boots_size')
                            ->maxLength(5),
                        Forms\Components\TextInput::make('badge_id')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('driver_license')
                            ->maxLength(50),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passport')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('etablissement_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('marital_status'),
                Tables\Columns\TextColumn::make('phone_number_one')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EmergencyContactPhone '),
                Tables\Columns\TextColumn::make('picture')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sexe'),
                Tables\Columns\TextColumn::make('clothes_size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('boots_size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('badge_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('driver_license')
                    ->searchable(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'view' => Pages\ViewStaff::route('/{record}'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
