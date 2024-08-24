<?php

namespace App\Filament\Resources\GestionMaterielResource\Pages;

use App\Filament\Resources\GestionMaterielResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestionMateriel extends ViewRecord
{
    protected static string $resource = GestionMaterielResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
