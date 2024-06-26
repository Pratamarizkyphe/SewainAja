<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Pembayaran Berhasil</h1>
        <p class="text-lg mb-4">Terima kasih! Pembayaran Anda berhasil dan penyewaan telah disimpan.</p>
        <x-btn-primary href="{{ route('user.dashboard') }}" class="mt-4">Kembali ke Halaman Utama</x-btn-primary>
    </div>
</x-app-layout>