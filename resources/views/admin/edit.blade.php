<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Mobil</h1>
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('mobils.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mobil</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full" value="{{ old('nama', $mobil->nama) }}" required>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full">
                {{-- @if ($mobil->gambar)
                    <img src="{{ asset('storage/mobil/' . $mobil->gambar) }}" alt="Gambar Mobil" class="mt-2" width="100">
                @endif --}}
            </div>
            <div class="mb-4">
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk</label>
                <input type="text" name="merk" id="merk" class="mt-1 block w-full" value="{{ old('merk', $mobil->merk) }}" required>
            </div>
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" id="tahun" class="mt-1 block w-full" value="{{ old('tahun', $mobil->tahun) }}" required>
            </div>
            <div class="mb-4">
                <label for="warna" class="block text-sm font-medium text-gray-700">Warna</label>
                <input type="text" name="warna" id="warna" class="mt-1 block w-full" value="{{ old('warna', $mobil->warna) }}" required>
            </div>
            <div class="mb-4">
                <label for="harga_sewa" class="block text-sm font-medium text-gray-700">Harga Sewa</label>
                <input type="number" name="harga_sewa" id="harga_sewa" class="mt-1 block w-full" value="{{ old('harga_sewa', $mobil->harga_sewa) }}" required>
            </div>
            <div class="mb-4">
                <label for="nomor_plat" class="block text-sm font-medium text-gray-700">Nomor Plat</label>
                <input type="text" name="nomor_plat" id="nomor_plat" class="mt-1 block w-full" value="{{ old('nomor_plat', $mobil->nomor_plat) }}" required>
            </div>
            <div class="mb-4">
                <label for="ready" class="block text-sm font-medium text-gray-700">Ready</label>
                <select name="ready" id="ready" class="mt-1 block w-full" required>
                    <option value="1" {{ old('ready', $mobil->ready) == 1 ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('ready', $mobil->ready) == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
