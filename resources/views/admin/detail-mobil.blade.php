<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="flex justify-center my-8">
            <div class="w-full lg:w-2/3 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 px-4 py-2">
                    <h2 class="text-2xl font-bold text-gray-800">Detail Mobil</h2>
                </div>
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2 p-4">
                        <img src="{{ asset('storage/mobil/'.$mobil->gambar) }}" alt="Gambar Mobil" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="lg:w-1/2 p-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $mobil->nama }}</h3>
                        <p class="text-gray-600">Merk: {{ $mobil->merk }}</p>
                        <p class="text-gray-600">Tahun: {{ $mobil->tahun }}</p>
                        <p class="text-gray-600">Warna: {{ $mobil->warna }}</p>
                        <p class="text-gray-600">Harga Sewa: Rp{{ number_format($mobil->harga_sewa, 0, ',', '.') }}</p>
                        <p class="text-gray-600">Nomor Plat: {{ $mobil->nomor_plat }}</p>
                        <p class="text-gray-600">Ready: {{ $mobil->ready ? 'Yes' : 'No' }}</p>
                        <div class="mt-4">
                            <a href="{{ route('mobils.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
