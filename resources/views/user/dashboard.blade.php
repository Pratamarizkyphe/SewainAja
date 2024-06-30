<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gray-100 py-12">

        <div class="bg-white container mx-auto p-16 mb-10 shadow-xl sm:rounded-lg">
            <div class="flex justify-center">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold mb-2">Selamat datang, {{ Auth::user()->name }}!</h2>
                    <p class="text-gray-700">Nikmati pengalaman menyewa mobil dengan SewainAjA!</p>
                </div>
            </div>
        </div>

        <!-- Menyesuaikan padding atas dan bawah -->
        <div class="bg-white flex flex-col text-black p-16 shadow-xl sm:rounded-lg">
            <div class="container mx-auto px-4 md:px-0">
                <!-- Menyesuaikan padding kiri kanan dan mengatur lebar konten -->
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="md:w-1/2">
                        <h1 class="md:text-3xl font-bold mb-4">SewainAjA! Rental mobil kesukaan kamu disini</h1>
                    </div>
                    <div class="md:w-1/2 flex justify-center md:justify-end">
                        <img src="{{ asset('img/mobil-rent.jpg') }}" class="w-96 md:max-w-xl mx-auto md:mx-0"> <!-- Menyesuaikan lebar gambar dengan ukuran maksimum pada desktop -->
                    </div>
                </div>
                <div class="mt-4">
                    <!-- Tombol dengan href ke halaman lain -->
                    <x-btn-primary href="/rent/selectDate">
                        Sewa Sekarang
                    </x-btn-primary>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
