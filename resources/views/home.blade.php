<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <!-- Hero Section -->
    <section class="bg-cover bg-center h-screen relative">
        <div class="bg-orange-600 bg-opacity-75 h-full flex flex-col justify-center items-center text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">SewainAjA Hadirkan Customer Portal yang Praktis dan Inovatif!</h1>
            <a href="#" class="mt-4 bg-white hover:bg-orange-700 text-orange-500 hover:text-white font-bold py-3 px-6 rounded-full">www.mpm-rent.com</a>
        </div>
        <!-- Search Box -->
        <div class="absolute bottom-0 left-0 right-0 bg-white py-6 shadow-lg">
            <div class="container mx-auto px-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex justify-center space-x-4 mb-4">
                        <button class="bg-orange-500 text-white py-2 px-4 rounded-full">Pribadi</button>
                        <button class="text-orange-500 border border-orange-500 py-2 px-4 rounded-full">Korporasi</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-gray-700">Lokasi</label>
                            <select class="w-full border border-gray-300 rounded-md p-2">
                                <option>Cari Lokasi</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
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
                    <div class="text-center mt-4">
                        <button class="bg-orange-500 text-white py-2 px-6 rounded-full">Cari Mobil</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>