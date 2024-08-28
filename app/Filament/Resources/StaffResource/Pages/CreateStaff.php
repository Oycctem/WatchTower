<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect back to the index page after creation
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Create New Agent';
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Agenst successfully added!'; // Customize the notification message here
    }
}
