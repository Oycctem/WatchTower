<?php

namespace App\Filament\Resources\GestionMaterielResource\Pages;

use App\Filament\Resources\GestionMaterielResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGestionMateriels extends ListRecords
{
    protected static string $resource = GestionMaterielResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manage Materials'; // Customize the title as needed
    }
}
