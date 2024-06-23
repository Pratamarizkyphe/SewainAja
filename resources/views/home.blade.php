<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <!-- Hero Section -->
    <section class="bg-cover bg-center h-screen relative">
        <div class="bg-cover bg-center h-screen relative" style="background-image: url('{{ asset('img/banyak_mobil.png') }}')">
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
                    <div class="md:w-1/2 flex justify-center md:justify-end">
                        <img src="{{ asset('img/mobil-rent.jpg') }}" class="w-96 md:max-w-xl mx-auto md:mx-0"> <!-- Menyesuaikan lebar gambar dengan ukuran maksimum pada desktop -->
                    </div>
                </div>
                <div class="container mx-auto px-4"> <!-- Menyesuaikan padding dan lebar konten rent-date -->
                    @livewire('rent-date')
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
