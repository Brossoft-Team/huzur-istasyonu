<?php

namespace App\Filament\Resources\MenuItemResource\Pages;

use App\Core\Filament\CoreCreateRecord;
use App\Filament\Resources\MenuItemResource;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Cache;

class CreateMenuItem extends CoreCreateRecord
{
    protected static string $resource = MenuItemResource::class;

    public function afterCreate()
    {
        Cache::set('menu_items',  MenuItem::with('category')->get()->groupBy('category.name'));
    }

}
