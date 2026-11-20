<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller

{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)->take(3)->get();

        // Data dummy sementara jika database masih kosong
        if($featuredProducts->isEmpty()) {
            $featuredProducts = collect([
                (object)['name' => 'Buket Mawar Romantis', 'price' => 185000, 'image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?auto=format&fit=crop&w=600&q=80'],
                (object)['name' => 'Anggrek Bulan Premium', 'price' => 450000, 'image' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=600&q=80'],
                (object)['name' => 'Bunga Meja Cerah', 'price' => 220000, 'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=600&q=80'],
            ]);
        }

        return view('home', compact('featuredProducts'));
    }

    public function show($slug)
{
    // Mencari produk berdasarkan slug, jika tidak ada akan memunculkan error 404
    $product = Product::where('slug', $slug)->firstOrFail();

    return view('product-detail', compact('product'));
}
}
