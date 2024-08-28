<?php

namespace App\Filament\Resources\GestiondesVehiculesResource\Pages;

use App\Filament\Resources\GestiondesVehiculesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestiondesVehicules extends EditRecord
{
    protected static string $resource = GestiondesVehiculesResource::class;

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
