<?php

namespace App\Filament\Resources\GestionAccesResource\Pages;

use App\Filament\Resources\GestionAccesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestionAcces extends ViewRecord
{
    protected static string $resource = GestionAccesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
