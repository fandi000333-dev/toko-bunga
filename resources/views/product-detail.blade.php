<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - BungaKita.id</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#FAF7F2] text-stone-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-serif font-bold text-stone-800">🌸 BungaKita.id</a>
            <a href="/" class="text-sm font-medium text-stone-600 hover:text-[#9CAF88]">← Kembali ke Beranda</a>
        </div>
    </header>

    <!-- Detail Content -->
    <main class="max-w-5xl mx-auto px-4 my-12">
        <div
            class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-stone-100">

            <!-- Gambar Produk -->
            <div>
                <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}" class="w-full h-[400px] object-cover rounded-xl shadow-inner">
            </div>

            <!-- Informasi & Form Pesan -->
            <div>
                <h1 class="text-2xl md:text-3xl font-serif font-bold text-stone-900">{{ $product->name }}</h1>
                <p class="text-2xl font-bold text-[#9CAF88] mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <p class="text-stone-600 mt-4 text-sm leading-relaxed">{{ $product->description }}</p>

                <hr class="my-6 border-stone-100">

                <!-- Form Simulasi Pesanan / Kartu Ucapan -->
                <form id="orderForm" onsubmit="sendToWhatsApp(event)" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Nama Pemesan</label>
                        <input type="text" id="customerName" required placeholder="Contoh: Siska Amelia"
                            class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Tanggal Pengiriman</label>
                        <input type="date" id="deliveryDate" required
                            class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-stone-700 mb-1">Pesan Kartu Ucapan (Gratis)</label>
                        <textarea id="cardMessage" rows="3" placeholder="Tulis pesan romantis atau ucapan selamat di sini..."
                            class="w-full border border-stone-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#9CAF88]"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#25D366] text-white font-semibold py-3 rounded-lg hover:bg-opacity-90 transition shadow-sm flex items-center justify-center gap-2">
                        <span>💬</span> Pesan & Kirim via WhatsApp
                    </button>
                </form>

                <!-- Script untuk otomatis menyusun format pesan WhatsApp -->
                <script>
                    function sendToWhatsApp(event) {
                        event.preventDefault();

                        const productName = "{{ $product->name }}";
                        const productPrice = "Rp {{ number_format($product->price, 0, ',', '.') }}";
                        const customerName = document.getElementById('customerName').value;
                        const deliveryDate = document.getElementById('deliveryDate').value;
                        const cardMessage = document.getElementById('cardMessage').value || '-';

                        // Nomor WhatsApp Admin (Ganti dengan nomor WhatsApp toko Anda, awali dengan 62 tanpa angka 0 di depan)
                        const adminPhone = "6281234567890";

                        const text = `Halo Admin BungaKita.id, saya ingin memesan produk berikut:
    
*Produk:* ${productName}
*Harga:* ${productPrice}
*Nama Pemesan:* ${customerName}
*Tanggal Kirim:* ${deliveryDate}
*Isi Kartu Ucapan:* "${cardMessage}"

Mohon konfirmasi ketersediaan dan total pembayarannya. Terima kasih!`;

                        const encodedText = encodeURIComponent(text);
                        window.open(`https://wa.me/${adminPhone}?text=${encodedText}`, '_blank');
                    }
                </script>
            </div>

        </div>
    </main>

</body>

</html>
