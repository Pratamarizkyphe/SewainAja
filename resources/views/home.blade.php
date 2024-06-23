<x-app-layout>     <!-- Hero Section -->
    <section class="p-10"> <!-- Menyesuaikan padding atas dan bawah -->
        <div class="bg-white flex flex-col text-black p-16">
            <div class="container mx-auto px-4 md:px-0"> <!-- Menyesuaikan padding kiri kanan dan mengatur lebar konten -->
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="md:w-1/2">
                        <h1 class="md:text-3xl font-bold mb-4">SewainAjA! Rental mobil kesukaan kamu disini</h1>
</h1>
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
