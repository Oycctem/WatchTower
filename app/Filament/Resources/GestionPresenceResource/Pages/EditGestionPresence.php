<?php

namespace App\Filament\Resources\GestionPresenceResource\Pages;

use App\Filament\Resources\GestionPresenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionPresence extends EditRecord
{
    protected static string $resource = GestionPresenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Redirect back to the index page after creation
        return $this->getResource()::getUrl('index');
    }
}
