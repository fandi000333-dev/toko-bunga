<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk Bunga - Admin</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#FAF7F2] text-stone-800 font-sans">
    <div class="max-w-2xl mx-auto px-4 py-10">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-serif font-bold">✏️ Edit Produk Bunga</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-stone-600 hover:text-stone-900">← Kembali</a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">Nama Produk Bunga</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required 
                           class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" required 
                           class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">URL Foto Bunga (Link Gambar)</label>
                    <input type="text" name="image" value="{{ old('image', $product->image) }}" required 
                           class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">Deskripsi Produk</label>
                    <textarea name="description" rows="3" required 
                              class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }} class="w-4 h-4 text-[#9CAF88] rounded border-stone-300">
                    <label for="is_featured" class="text-sm font-medium text-stone-700">Tampilkan sebagai Bunga Pilihan Minggu Ini (Featured)</label>
                </div>

                <button type="submit" class="w-full mt-4 bg-[#9CAF88] text-white font-semibold py-3 rounded-lg hover:bg-opacity-90 transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</body>
</html>