<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = Cache::get("menu_items",function (){
            return MenuItem::with('category')->get()->groupBy('category.name');
        });
        return view('menu', compact('menuItems'));
    }
}
