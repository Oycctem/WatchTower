<?php

namespace App\Filament\Resources\GestionPresenceResource\Pages;

use App\Filament\Resources\GestionPresenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGestionPresence extends ViewRecord
{
    protected static string $resource = GestionPresenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
