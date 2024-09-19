<?php
namespace App\Core\Filament;

use Filament\Resources\Pages\CreateRecord;

class CoreCreateRecord extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
