<?php

namespace App\Filament\Resources\MenuItemResource\Pages;

use App\Core\Filament\CoreEditRecord;
use App\Filament\Resources\MenuItemResource;
use Filament\Actions;

class EditMenuItem extends CoreEditRecord
{
    protected static string $resource = MenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
