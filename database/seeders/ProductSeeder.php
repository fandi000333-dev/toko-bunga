<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Buket Mawar Romantis',
                'slug' => Str::slug('Buket Mawar Romantis'),
                'description' => 'Rangkaian mawar merah pilihan dengan bungkus premium.',
                'price' => 185000,
                'image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
            ],
            [
                'name' => 'Anggrek Bulan Premium',
                'slug' => Str::slug('Anggrek Bulan Premium'),
                'description' => 'Anggrek bulan elegan dalam pot keramik eksklusif.',
                'price' => 450000,
                'image' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
            ],
            [
                'name' => 'Bunga Meja Cerah',
                'slug' => Str::slug('Bunga Meja Cerah'),
                'description' => 'Kombinasi bunga matahari dan lili segar untuk mempercantik ruangan.',
                'price' => 220000,
                'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
            ],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}