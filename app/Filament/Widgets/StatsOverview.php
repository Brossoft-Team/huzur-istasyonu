<?php

namespace App\Filament\Widgets;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Kategori Sayısı', MenuCategory::count()),
            Stat::make('Ürün Sayısı', MenuItem::count()),
            Stat::make('Ortalama Fiyat', MenuItem::avg("price"). " TL"),
        ];
    }
}
