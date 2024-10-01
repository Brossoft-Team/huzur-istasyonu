<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'name' => 'Menemen',
            'price' => 15.00,
            'ingredient' => 'Domates, biber, yumurta',
            'category_id' => 1,
        ]);
        MenuItem::create([
            'name' => 'Kahvaltı Tabağı',
            'ingredient' => 'Domates, biber, yumurta',
            'price' => 20.00,
            'category_id' => 1,
        ]);
    }
}
