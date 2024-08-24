<?php

namespace App\Filament\Resources\GestionPresenceResource\Pages;

use App\Filament\Resources\GestionPresenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGestionPresences extends ListRecords
{
    protected static string $resource = GestionPresenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
