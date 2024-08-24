<?php

namespace App\Filament\Resources\GestiondesVehiculesResource\Pages;

use App\Filament\Resources\GestiondesVehiculesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestiondesVehicules extends ViewRecord
{
    protected static string $resource = GestiondesVehiculesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
