<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kelola Produk Bunga</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#FAF7F2] text-stone-800 font-sans">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-serif font-bold">🌸 Admin Panel - Daftar Bunga</h1>
            <div class="space-x-3">
                <a href="/" target="_blank" class="text-sm bg-stone-200 px-4 py-2 rounded-lg hover:bg-stone-300 transition">Lihat Website</a>
                <a href="{{ route('admin.products.create') }}" class="bg-[#9CAF88] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-opacity-90 transition">+ Tambah Produk</a>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-stone-100">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100 text-xs text-stone-500 uppercase tracking-wider">
                        <th class="p-4 w-20">Gambar</th>
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Unggulan</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 text-sm">
                    @forelse($products as $product)
                    <tr class="hover:bg-stone-50/50 transition">
                        <td class="p-4">
                            <!-- Ditambahkan style fix width/height agar tidak besar meluber -->
                            <img src="{{ $product->image }}" style="width: 48px; height: 48px; min-width: 48px;" class="object-cover rounded-lg shadow-sm">
                        </td>
                        <td class="p-4 font-semibold text-stone-800">{{ $product->name }}</td>
                        <td class="p-4 text-[#9CAF88] font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="p-4">
                            @if($product->is_featured)
                                <span class="bg-amber-100 text-amber-800 text-xs px-2.5 py-1 rounded-full font-medium">Ya</span>
                            @else
                                <span class="bg-stone-100 text-stone-600 text-xs px-2.5 py-1 rounded-full">Tidak</span>
                            @endif
                        </td>
                        <td class="p-4 text-center">
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <td class="p-4 text-center flex items-center justify-center gap-2">
    <!-- Tombol Edit -->
    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-sky-600 hover:text-sky-800 text-xs font-semibold bg-sky-50 px-3 py-1.5 rounded-lg border border-sky-100 transition">
        Edit
    </a>

    <!-- Tombol Hapus -->
    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-rose-600 hover:text-rose-800 text-xs font-semibold bg-rose-50 px-3 py-1.5 rounded-lg border border-rose-100 transition">
            Hapus
        </button>
    </form>
</td>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-stone-500">Belum ada data produk bunga.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>