<?php

namespace App\Filament\Resources\GestionAccesResource\Pages;

use App\Filament\Resources\GestionAccesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGestionAcces extends ListRecords
{
    protected static string $resource = GestionAccesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manage Access'; // Customize the title as needed
    }
}
