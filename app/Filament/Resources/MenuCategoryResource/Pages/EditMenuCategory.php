<?php

namespace App\Filament\Resources\MenuCategoryResource\Pages;

use App\Core\Filament\CoreEditRecord;
use App\Filament\Resources\MenuCategoryResource;
use Filament\Actions;

class EditMenuCategory extends CoreEditRecord
{
    protected static string $resource = MenuCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
