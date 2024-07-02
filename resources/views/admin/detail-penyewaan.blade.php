<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Detail Penyewaan</h1>
        
        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama:</label>
                <p>{{ $penyewaan->nama }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Mulai:</label>
                <p>{{ $penyewaan->start_date }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Selesai:</label>
                <p>{{ $penyewaan->end_date }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Harga Sewa:</label>
                <p>{{ $penyewaan->harga_sewa }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status Pembayaran:</label>
                <p>{{ $penyewaan->status_pembayaran }}</p>
            </div>
            
            <h2 class="text-xl font-bold mt-4 mb-2">Detail Mobil</h2>
            <div class="mb-4">
                <img src="{{ asset('storage/mobil/' . $penyewaan->mobils->gambar) }}" alt="Gambar Mobil" style="width: 50%" class="mb-4">
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium text-gray-700">Nama:</label>
                <p>{{ $penyewaan->mobils->nama }}</p>
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium text-gray-700">Merk:</label>
                <p>{{ $penyewaan->mobils->merk }}</p>
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium text-gray-700">Tahun:</label>
                <p>{{ $penyewaan->mobils->merk }}</p>
            </div>
            <div class="mb-2">
                <label class="block text-sm font-medium text-gray-700">Warna:</label>
                <p>{{ $penyewaan->mobils->warna }}</p>
            </div>
            
            <div class="mt-6">
                <x-btn-primary href="{{ route('admin.data-penyewaan') }}">Kembali</x-btn-primary>
            </div>
        </div>
    </div>
</x-app-layout>
