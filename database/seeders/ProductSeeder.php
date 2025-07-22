<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop Keren',
            'description' => 'Laptop super cepat dengan prosesor terbaru.',
            'price' => 12000000,
            'stock' => 15,
        ]);

        Product::create([
            'name' => 'Mouse Gaming',
            'description' => 'Mouse dengan DPI tinggi untuk para gamer sejati.',
            'price' => 750000,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Keyboard Mekanikal',
            'description' => 'Keyboard dengan switch biru yang memuaskan.',
            'price' => 1100000,
            'stock' => 30,
        ]);
    }
}
