<!-- resources/views/livewire/rent-date.blade.php -->
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-center space-x-4 mb-4">
        <button wire:click="setType('pribadi')" class="{{ $type === 'pribadi' ? 'bg-purple-500 text-white' : 'text-purple-500 border border-purple-500' }} hover:border-purple-700 hover:shadow-xl py-2 px-4 rounded-full">Pribadi</button>
        <button wire:click="setType('korporasi')" class="{{ $type === 'korporasi' ? 'bg-purple-500 text-white' : 'text-purple-500 border border-purple-500' }} hover:border-purple-700 hover:shadow-xl py-2 px-4 rounded-full">Korporasi</button>
    </div>
    <div class="flex justify-center">
        @if($type === 'pribadi')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700">Tanggal Mulai Sewa</label>
                    <input type="date" wire:model="startDate" class="w-full border border-gray-300 rounded-md p-2 hover:border-gray-400 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-gray-700">Tanggal Selesai Sewa</label>
                    <input type="date" wire:model="endDate" class="w-full border border-gray-300 rounded-md p-2 hover:border-gray-400 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700">Tanggal Mulai Sewa</label>
                    <input type="date" wire:model="startDate" class="w-full border border-gray-300 rounded-md p-2 hover:border-gray-400 focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                </div>
            </div>
        @endif
    </div>
    <div class="text-center mt-4">
        <button wire:click="" class="bg-purple-500 text-white py-2 px-6 rounded-full hover:bg-purple-600">Cari Mobil</button>
    </div>
</div>
