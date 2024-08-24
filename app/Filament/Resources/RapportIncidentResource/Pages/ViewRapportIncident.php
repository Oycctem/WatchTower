<?php

namespace App\Filament\Resources\RapportIncidentResource\Pages;

use App\Filament\Resources\RapportIncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRapportIncident extends ViewRecord
{
    protected static string $resource = RapportIncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
