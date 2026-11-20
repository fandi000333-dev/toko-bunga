<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BungaKita Fandi - Toko Bunga Online</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#FAF7F2] text-stone-800 font-sans">
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-serif font-bold text-stone-800">🌸 BungaKita-Fandi</a>
            <span class="bg-[#9CAF88] text-white px-4 py-2 rounded-full text-sm font-medium">Keranjang (0)</span>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-4 mt-6">
        <div class="relative rounded-2xl overflow-hidden bg-stone-800 text-white h-[360px] flex items-center shadow-md">
            <img src="https://images.unsplash.com/photo-1563241527-3004b7be0ffd?auto=format&fit=crop&w=1400&q=80"
                class="absolute inset-0 w-full h-full object-cover opacity-50">
            <div class="relative z-10 max-w-xl px-8 md:px-14">
                <span
                    class="uppercase tracking-widest text-xs bg-[#9CAF88] px-3 py-1 rounded-full text-white font-semibold">Pengiriman
                    Hari Ini</span>
                <h1 class="text-3xl md:text-4xl font-serif font-bold mt-3 leading-tight">Custom-Designed Luxury Bouquet
                </h1>
                <p class="mt-3 text-stone-200 text-sm md:text-base">Rangkaian bunga segar pilihan dirangkai khusus untuk
                    setiap momen berharga Anda.</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 my-12">
        <h2 class="text-2xl font-serif font-bold mb-6">Bunga Pilihan Minggu Ini</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach ($featuredProducts as $product)
                <!-- Ganti bagian card produk pada home.blade.php -->
                <div
                    class="bg-white rounded-xl shadow-sm overflow-hidden border border-stone-100 flex flex-col justify-between">
                    <div>
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                                class="w-full h-52 object-cover hover:opacity-95 transition">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <h3 class="font-semibold text-stone-800 text-lg hover:text-[#9CAF88]">
                                    {{ $product->name }}</h3>
                            </a>
                            <p class="text-[#9CAF88] font-bold mt-1">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="px-4 pb-4">
                        <a href="{{ route('product.show', $product->slug) }}"
                            class="block text-center bg-stone-800 text-white text-sm py-2.5 rounded-lg font-medium hover:bg-stone-700">
                            Lihat & Pesan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</body>

</html>
