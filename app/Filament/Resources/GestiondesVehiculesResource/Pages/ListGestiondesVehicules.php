<?php

namespace App\Filament\Resources\GestiondesVehiculesResource\Pages;

use App\Filament\Resources\GestiondesVehiculesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGestiondesVehicules extends ListRecords
{
    protected static string $resource = GestiondesVehiculesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
