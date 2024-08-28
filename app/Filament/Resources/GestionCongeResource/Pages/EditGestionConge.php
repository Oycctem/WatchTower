<?php

namespace App\Filament\Resources\GestionCongeResource\Pages;

use App\Filament\Resources\GestionCongeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionConge extends EditRecord
{
    protected static string $resource = GestionCongeResource::class;

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
