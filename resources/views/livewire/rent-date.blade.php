<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-center space-x-4 mb-4">
        <button wire:click="setType('pribadi')" class="{{ $type === 'pribadi' ? 'bg-[#9B86BD] text-white' : 'text-[#9B86BD] border border-[#9B86BD]' }} py-2 px-4 rounded-full">Pribadi</button>
        <button wire:click="setType('korporasi')" class="{{ $type === 'korporasi' ? 'bg-[#9B86BD] text-white' : 'text-[#9B86BD] border border-[#9B86BD]' }} py-2 px-4 rounded-full">Korporasi</button>
    </div>
    <div class="flex justify-center">
        @if($type === 'pribadi')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700">Tanggal Mulai Sewa</label>
                    <input type="date" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-gray-700">Tanggal Selesai Sewa</label>
                    <input type="date" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-gray-700">Durasi Sewa (Hari)</label>
                    <input type="number" min="1" class="w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700">Tanggal Mulai Sewa</label>
                    <input type="date" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-gray-700">Tanggal Selesai Sewa</label>
                    <input type="date" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-gray-700">Durasi Sewa (Tahun)</label>
                    <input type="number" min="1" class="w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>
        @endif
    </div>
    <div class="text-center mt-4">
        <button class="bg-[#9B86BD] text-white py-2 px-6 rounded-full">Cari Mobil</button>
    </div>
</div>