<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. Menampilkan daftar produk di admin
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // 2. Menampilkan form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // 3. Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|url', // Bisa pakai link gambar (Unsplash) atau file upload
        ]);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk bunga berhasil ditambahkan!');
    }

    // 4. Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }

    // 5. Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // 6. Memperbarui data produk di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ]);

        $product = Product::findOrFail($id);
        
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk bunga berhasil diperbarui!');
    }
}