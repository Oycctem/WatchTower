<?php

namespace App\Filament\Resources\RapportIncidentResource\Pages;

use App\Filament\Resources\RapportIncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRapportIncidents extends ListRecords
{
    protected static string $resource = RapportIncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manage Incidents'; // Customize the title as needed
    }
}
