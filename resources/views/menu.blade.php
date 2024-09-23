<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebapçı Menü</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    @php
                $categories = collect([
                    (object)[
                        'id' => 1,
                        'name' => 'Tacos',
                        'menuItems' => collect([
                            (object)[
                                'name' => 'Salmon Tacos',
                                'price' => 12,
                                'ingredient' => 'Creamy pasta with salmon, completed by green beans and Indian salad.',
                                'image_url' => 'https://via.placeholder.com/200x150?text=Salmon+Tacos',
                            ],
                            (object)[
                                'name' => 'Chicken Tacos',
                                'price' => 10,
                                'ingredient' => 'Grilled chicken with Mexican salsa and fresh avocado.',
                                'image_url' => 'https://via.placeholder.com/200x150?text=Chicken+Tacos',
                            ],
                            (object)[
                                'name' => 'Veggie Tacos',
                                'price' => 8,
                                'ingredient' => 'Roasted veggies with guacamole and black beans.',
                                'image_url' => 'https://via.placeholder.com/200x150?text=Veggie+Tacos',
                            ]
                        ])
                    ],
                    (object)[
                        'id' => 2,
                        'name' => 'Burgers',
                        'menuItems' => collect([
                            (object)[
                                'name' => 'Beef Burger',
                                'price' => 14,
                                'ingredient' => 'Juicy beef patty with cheddar cheese and caramelized onions.',
                                'image_url' => 'https://via.placeholder.com/200x150?text=Beef+Burger',
                            ],
                            (object)[
                                'name' => 'Chicken Burger',
                                'price' => 12,
                                'ingredient' => 'Crispy chicken breast with lettuce and mayo.',
                                'image_url' => 'https://via.placeholder.com/200x150?text=Chicken+Burger',
                            ],
                            (object)[
                                'name' => 'Veggie Burger',
                                'price' => 10,
                                'ingredient' => 'Plant-based patty with fresh tomato and pickles.',
                                'image_url' => 'https://via.placeholder.com/200x150?text=Veggie+Burger',
                            ]
                        ])
                    ]
                ]);
    @endphp

    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-28">
            @foreach($categories as $category)
                @foreach($category->menuItems as $item)
                    <div class="max-w-26 overflow-hidden">
                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $item->name }}</h3>
                            <p class="text-gray-600 mb-2">{{ $item->ingredient }}</p>
                            <p class="text-red-600 text-lg font-bold mb-4">{{ $item->price }} ₺</p>
                            <span class="text-sm text-gray-500">Kategori: {{ $category->name }}</span>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

</body>
</html>
