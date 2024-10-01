<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuCategory::create(["name" => "Kahvaltılar"]);
        MenuCategory::create(["name"=>"Ana Yemekler"]);
        MenuCategory::create(["name"=>"Kebaplar"]);
        MenuCategory::create(["name"=>"Atıştırmalıklar"]);
        MenuCategory::create(["name"=>"İçecekler"]);
    }
}
