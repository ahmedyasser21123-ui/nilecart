<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => "Pharaoh's Legacy Hoodie",
            'description' => 'Premium cotton hoodie with golden pyramid print.',
            'price' => 449,
            'category' => 'Fashion',
            'image' => 'https://picsum.photos/id/1005/600/600'
        ]);

        Product::create([
            'name' => 'Ankh Life Necklace',
            'description' => 'Sterling silver Ankh pendant – symbol of eternal life.',
            'price' => 129,
            'category' => 'Jewelry',
            'image' => 'https://picsum.photos/id/1015/600/600'
        ]);

        Product::create([
            'name' => 'Cleopatra Scented Candle',
            'description' => 'Hand-poured candle with lotus & myrrh fragrance.',
            'price' => 89,
            'category' => 'Home',
            'image' => 'https://picsum.photos/id/201/600/600'
        ]);

        Product::create([
            'name' => 'Scarab Power Bracelet',
            'description' => 'Leather bracelet with genuine scarab charm.',
            'price' => 159,
            'category' => 'Jewelry',
            'image' => 'https://picsum.photos/id/133/600/600'
        ]);

        Product::create([
            'name' => 'Pyramid LED Lamp',
            'description' => 'Touch-activated pyramid night light with warm glow.',
            'price' => 299,
            'category' => 'Home',
            'image' => 'https://picsum.photos/id/160/600/600'
        ]);

        Product::create([
            'name' => 'Egyptian Cotton T-Shirt',
            'description' => 'Ultra-soft 100% Egyptian cotton.',
            'price' => 199,
            'category' => 'Fashion',
            'image' => 'https://picsum.photos/id/1009/600/600'
        ]);

        Product::create([
            'name' => 'Nefertiti Wireless Earbuds',
            'description' => 'Premium sound with golden Nefertiti case.',
            'price' => 399,
            'category' => 'Tech',
            'image' => 'https://picsum.photos/id/201/600/600'
        ]);

        Product::create([
            'name' => 'King Tut Phone Case',
            'description' => 'Shockproof case with Tutankhamun artwork.',
            'price' => 79,
            'category' => 'Tech',
            'image' => 'https://picsum.photos/id/1005/600/600'
        ]);

        Order::create([
            'customer_name' => 'Ahmed Mohamed',
            'total' => 578,
            'items' => json_encode([
                ['name' => "Pharaoh's Legacy Hoodie", 'price' => 449, 'qty' => 1],
                ['name' => 'Ankh Life Necklace', 'price' => 129, 'qty' => 1]
            ])
        ]);

        Order::create([
            'customer_name' => 'Sara Ahmed',
            'total' => 478,
            'items' => json_encode([
                ['name' => 'Cleopatra Scented Candle', 'price' => 89, 'qty' => 2],
                ['name' => 'Scarab Power Bracelet', 'price' => 159, 'qty' => 1]
            ])
        ]);
    }
}