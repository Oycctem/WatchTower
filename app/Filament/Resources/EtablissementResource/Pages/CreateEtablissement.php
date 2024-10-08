<?php

namespace App\Filament\Resources\EtablissementResource\Pages;

use App\Filament\Resources\EtablissementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEtablissement extends CreateRecord
{
    protected static string $resource = EtablissementResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect back to the index page after creation
        return $this->getResource()::getUrl('index');
    }
}
