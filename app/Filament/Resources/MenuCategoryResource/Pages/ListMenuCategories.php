<?php

namespace App\Filament\Resources\MenuCategoryResource\Pages;

use App\Filament\Resources\MenuCategoryResource;
use Filament\Resources\Pages\ListRecords;

class ListMenuCategories extends ListRecords
{
    protected static string $resource = MenuCategoryResource::class;
}