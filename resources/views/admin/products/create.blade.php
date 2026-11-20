<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru - Admin</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#FAF7F2] text-stone-800 font-sans">
    <div class="max-w-2xl mx-auto px-4 py-10">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-serif font-bold">➕ Tambah Produk Bunga Baru</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-stone-600 hover:text-stone-900">← Kembali</a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100">
            <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">Nama Produk Bunga</label>
                    <input type="text" name="name" required placeholder="Contoh: Buket Tulip Pastel" 
                           class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" required placeholder="Contoh: 250000" 
                           class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">URL Foto Bunga (Link Gambar)</label>
                    <input type="url" name="image" required placeholder="https://images.unsplash.com/..." 
                           class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                    <p class="text-xs text-stone-500 mt-1">Anda bisa menyalin link gambar dari Unsplash atau internet.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">Deskripsi Produk</label>
                    <textarea name="description" rows="3" required placeholder="Deskripsikan keindahan bunga..." 
                              class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]"></textarea>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" class="w-4 h-4 text-[#9CAF88] rounded border-stone-300">
                    <label for="is_featured" class="text-sm font-medium text-stone-700">Tampilkan sebagai Bunga Pilihan Minggu Ini (Featured)</label>
                </div>

                <button type="submit" class="w-full mt-4 bg-[#9CAF88] text-white font-semibold py-3 rounded-lg hover:bg-opacity-90 transition">
                    Simpan Produk
                </button>
            </form>
        </div>
    </div>J
</body>
</html>