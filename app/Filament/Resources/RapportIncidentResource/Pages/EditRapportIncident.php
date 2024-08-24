<?php

namespace App\Filament\Resources\RapportIncidentResource\Pages;

use App\Filament\Resources\RapportIncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRapportIncident extends EditRecord
{
    protected static string $resource = RapportIncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
