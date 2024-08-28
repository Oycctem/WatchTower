<?php

namespace App\Filament\Resources\CitiesResource\Pages;

use App\Filament\Resources\CitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCities extends EditRecord
{
    protected static string $resource = CitiesResource::class;

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
