<?php

namespace App\Filament\Resources\GestionMaterielResource\Pages;

use App\Filament\Resources\GestionMaterielResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGestionMateriel extends EditRecord
{
    protected static string $resource = GestionMaterielResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
