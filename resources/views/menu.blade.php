<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huzur Menü</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lora', serif;
        }
        /* Sidebar için transition efektleri */
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-open {
            transform: translateX(0);
        }

        /* Sidebar açıldığında arkaya yarı şeffaf bir katman ekleyelim */
        .backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9;
        }
    </style>
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
                                'image_url' => 'https://saraylidoner.com/wp-content/uploads/2021/09/karisik.jpg',
                            ],
                            (object)[
                                'name' => 'Chicken Tacos',
                                'price' => 10,
                                'ingredient' => 'Grilled chicken with Mexican salsa and fresh avocado.',
                                'image_url' => 'https://kebapmakinesi.com/wp-content/uploads/2019/12/Kebap-Resmi-4.jpg?v=1615136936',
                            ],
                            (object)[
                                'name' => 'Veggie Tacos',
                                'price' => 8,
                                'ingredient' => 'Roasted veggies with guacamole and black beans.',
                                'image_url' => 'https://cdn.yemek.com/mnresize/1250/833/uploads/2021/06/ezmeli-kebap-tarifi-1.jpg',
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
                                'image_url' => 'https://iasbh.tmgrup.com.tr/eb9266/650/344/0/40/812/467?u=https://isbh.tmgrup.com.tr/sbh/2018/11/26/acili-kebap-nasil-yapilir-malzemeler-neler-1543243963585.jpg',
                            ],
                            (object)[
                                'name' => 'Chicken Burger',
                                'price' => 12,
                                'ingredient' => 'Crispy chicken breast with lettuce and mayo.',
                                'image_url' => 'https://silivribalabankebap.com/wp-content/uploads/2024/06/postkebap1.jpg',
                            ],
                            (object)[
                                'name' => 'Veggie Burger',
                                'price' => 10,
                                'ingredient' => 'Plant-based patty with fresh tomato and pickles.',
                                'image_url' => 'https://www.sutispangalti.com/wp-content/uploads/2020/07/adana-kebap-1-sutis-600x600.jpg',
                            ]
                        ])
                    ]
                ]);
    @endphp

        <!-- Header -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Huzur İstasyonu</h1>
        <!-- Hamburger Icon -->
        <div id="hamburger-icon" class="cursor-pointer">
            <!-- Hamburger icon (3 bars) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </div>
    </header>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-gray-900 text-white p-6 z-10 sidebar flex flex-col justify-between">
        <div>
            <h2 class="text-xl font-semibold mb-4">Kategoriler</h2>
            <ul class="space-y-4">
                @foreach($categories as $category)
                    <li><a href="#" class="text-gray-300 hover:text-white sidebar-link">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <!-- İletişim Kısmı -->
        <div class="text-gray-400 mt-6">
            <p>Adres: Atatürk Cd 217, İstiklal - Kurtpınar OSB, 59700 Muratlı/Tekirdağ</p>
            <p class="mt-4">Telefon: (123) 456-7890</p>
        </div>
    </div>

    <div class="banner">
        <img src="{{ asset('assets/example-photo.png') }}" alt="Banner Image" class="w-full h-60 md:h-96 object-cover">
    </div>

    <div class="container mx-auto py-6">
        
            @foreach($categories as $category)
                <!-- Her kategori için bir başlık -->
                <div class="col-span-3 m-4">
                    <h2 class="text-2xl font-bold mb-1">{{ $category->name }}</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 md:gap-28">
                    @foreach($category->menuItems as $item)
                        <div class="overflow-hidden col-span-3 md:col-span-1 mx-4">
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-52 object-cover">
                            <div class="p-4">
                                <h3 class="text-2xl font-semibold mb-2">{{ $item->name }}</h3>
                                <p class="text-gray-600 mb-2">{{ $item->ingredient }}</p>
                                <div class='flex justify-between items-center'>
                                    <span class="text-sm text-gray-500">Kategori: {{ $category->name }}</span>
                                    <p class="text-red-600 text-lg font-bold mb-2">{{ $item->price }} ₺</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
    </div>


    <script>
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const sidebar = document.getElementById('sidebar');
        let backdrop = null;

        // Sidebar'ı açma/kapama işlevi
        function toggleSidebar() {
            sidebar.classList.toggle('sidebar-open');
            toggleBackdrop();
        }

        // Hamburger icon click event
        hamburgerIcon.addEventListener('click', () => {
            toggleSidebar();
        });

        // Sayfanın geri kalanına tıklayınca sidebar'ı kapat
        document.addEventListener('click', (event) => {
            // Tıklanan yer hamburger iconu veya sidebar değilse kapat
            if (!sidebar.contains(event.target) && !hamburgerIcon.contains(event.target)) {
                if (sidebar.classList.contains('sidebar-open')) {
                    toggleSidebar();
                }
            }
        });

        // Sidebar linklerine tıklanınca sidebar'ı kapat
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                if (sidebar.classList.contains('sidebar-open')) {
                    toggleSidebar();
                }
            });
        });

        // Arkaya yarı şeffaf backdrop ekle/kaldır
        function toggleBackdrop() {
            if (!backdrop) {
                backdrop = document.createElement('div');
                backdrop.className = 'backdrop';
                document.body.appendChild(backdrop);

                // Backdrop'a tıklayınca sidebar'ı kapat
                backdrop.addEventListener('click', () => {
                    toggleSidebar();
                });
            } else {
                backdrop.remove();
                backdrop = null;
            }
        }
    </script>

</body>
</html>
