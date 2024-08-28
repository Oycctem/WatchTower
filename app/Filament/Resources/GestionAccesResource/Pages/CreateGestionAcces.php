<?php

namespace App\Filament\Resources\GestionAccesResource\Pages;

use App\Filament\Resources\GestionAccesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGestionAcces extends CreateRecord
{
    protected static string $resource = GestionAccesResource::class;

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
