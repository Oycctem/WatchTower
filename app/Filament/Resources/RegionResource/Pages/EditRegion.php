<?php

namespace App\Filament\Resources\RegionResource\Pages;

use App\Filament\Resources\RegionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegion extends EditRecord
{
    protected static string $resource = RegionResource::class;

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
