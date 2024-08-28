<?php

namespace App\Filament\Resources\GestionCongeResource\Pages;

use App\Filament\Resources\GestionCongeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGestionConges extends ListRecords
{
    protected static string $resource = GestionCongeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New'),
        ];
    }

    public function getTitle(): string
    {
        return 'Manage Leave'; // Customize the title as needed
    }
}
