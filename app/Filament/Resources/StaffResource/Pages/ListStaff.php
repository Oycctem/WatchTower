<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaff extends ListRecords
{
    protected static string $resource = StaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New'),
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New Presence Record') // Updated label to be more specific
                ->color('success') // Change button color
                ->icon('heroicon-o-plus') // Button icon
                ->modalHeading('Create a New Presence Record') // Modal heading text
                ->modalWidth('lg') // Modal size
                ->requiresConfirmation() // Requires confirmation before proceeding
                ->visible(fn () => auth()->user()->can('create', GestionPresence::class)), // Show button based on permissions
        ];
    }
}
