<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Detail Penyewaan</h1>

        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            <p><strong>Nama:</strong> {{ $penyewaan->nama }}</p>
            <p><strong>Tanggal Mulai:</strong> {{ $penyewaan->start_date }}</p>
            <p><strong>Tanggal Selesai:</strong> {{ $penyewaan->end_date }}</p>
            <p><strong>Harga Sewa:</strong> {{ $penyewaan->harga_sewa }}</p>
            <p><strong>Status Pembayaran:</strong> {{ $penyewaan->status_pembayaran }}</p>

            <h2 class="text-xl font-bold mt-4 mb-2">Detail Mobil</h2>
            <img>
            <img src="{{ asset('storage/mobil/' . $penyewaan->mobils->gambar) }}" alt="Gambar Mobil" style="width: 20%" class="mb-4">
            <p><strong>Nama:</strong> {{ $penyewaan->mobils->nama }}</p>
            <p><strong>Merk:</strong> {{ $penyewaan->mobils->merk }}</p>
            <p><strong>Tahun:</strong> {{ $penyewaan->mobils->tahun }}</p>
            <p><strong>Warna:</strong> {{ $penyewaan->mobils->warna }}</p>
        </div>

        <div class="mt-6">
            <x-btn-primary href="{{ route('user.riwayat-penyewaan') }}">Kembali</x-btn-primary>
        </div>  
        
    </div>
</x-app-layout>
