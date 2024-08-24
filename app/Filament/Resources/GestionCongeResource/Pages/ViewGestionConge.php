<?php

namespace App\Filament\Resources\GestionCongeResource\Pages;

use App\Filament\Resources\GestionCongeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestionConge extends ViewRecord
{
    protected static string $resource = GestionCongeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
