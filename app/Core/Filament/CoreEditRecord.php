<?php
namespace App\Core\Filament;

use Filament\Resources\Pages\EditRecord;

class CoreEditRecord extends EditRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
