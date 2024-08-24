<?php

namespace App\Filament\Resources\GestionAccesResource\Pages;

use App\Filament\Resources\GestionAccesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionAcces extends EditRecord
{
    protected static string $resource = GestionAccesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
