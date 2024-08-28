<?php

namespace App\Filament\Resources\CitiesResource\Pages;

use App\Filament\Resources\CitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCities extends CreateRecord
{
    protected static string $resource = CitiesResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect back to the index page after creation
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Create New City';
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'City successfully added!'; // Customize the notification message here
    }
}
