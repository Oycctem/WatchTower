<?php

namespace App\Filament\Resources\GestionPresenceResource\Pages;

use App\Filament\Resources\GestionPresenceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGestionPresence extends CreateRecord
{
    protected static string $resource = GestionPresenceResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect back to the index page after creation
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Create New Report';
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Report successfully added!'; // Customize the notification message here
    }
}
