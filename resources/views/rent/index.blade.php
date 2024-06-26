<x-app-layout>
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4 md:px-0">
            <div class="bg-white p-8 shadow-xl sm:rounded-lg">
                 @if (session('error'))
                    <div class="bg-red-500 text-white p-4 mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('selectDate') }}" method="GET">
                    @csrf
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Tipe Penyewa:</label>
                        <select id="type" name="type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 shadow-sm" required>
                            <option value="individu" {{ (old('type', $type ?? '') == 'individu') ? 'selected' : '' }}>Individu</option>
                            <option value="perusahaan" {{ (old('type', $type ?? '') == 'perusahaan') ? 'selected' : ''}}>Perusahaan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="startDate" class="block text-sm font-medium text-gray-700">Tanggal Mulai:</label>
                        <input type="date" id="startDate" name="startDate" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('startDate', $startDate ?? '') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50" required onclick="this.showPicker()">
                    </div>
                    <div class="mb-4">
                        <label for="endDate" class="block text-sm font-medium text-gray-700">Tanggal Selesai:</label>
                        <input type="date" id="endDate" name="endDate" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('endDate', $endDate ?? '') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50" required onclick="this.showPicker()">
                    </div>

                    <x-btn-submit w='20'>Cari Mobil</x-btn-submit>
                </form>
            </div>
        </div>

        @if (!session('error'))
            @if (isset($availableCars) && count($availableCars) > 0)
            <div class="container mx-auto px-4 md:px-0 mt-8">
                <h2 class="text-xl font-semibold mb-4">Mobil Tersedia</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($availableCars as $car)
                        <div class="border p-4 rounded-md shadow-sm">
                            <img src="{{ asset('storage/' . $car->gambar) }}" alt="{{ $car->merk }} {{ $car->nama }}" class="w-full h-48 object-cover mb-4">
                            <h3 class="text-lg font-semibold">{{ $car->merk }} {{ $car->nama }}</h3>
                            <p>{{ $car->tahun }} - {{ $car->warna }}</p>
                            <p>Harga Sewa: Rp{{ number_format($car->harga_sewa, 0, ',', '.') }}</p>
                            <form action="{{route('fillForm')}}" method="GET" class="mt-4">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <input type="hidden" name="startDate" value="{{ $startDate }}">
                                <input type="hidden" name="endDate" value="{{ $endDate }}">
                                <input type="hidden" name="rangeDate" value="{{$rangeDate}}">
                                <input type="hidden" name="type" value="{{$type}}">
                                <x-btn-submit w='35' url=''>Pilih Mobil</x-btn-submit>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            @elseif (isset($startDate) && isset($endDate))
                <p class="text-red-500">Tidak ada mobil tersedia untuk tanggal yang dipilih.</p>
            @endif
        @endif
    </section>
</x-app-layout>
