<footer class="bg-gray-900 text-white py-12 px-4 md:px-0">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo and Address Section -->
        <div class="flex flex-col items-start">
            @guest
                <a href="/" class="inline-block">
                  <img class="h-18 -mt-8" src="{{ asset('img/car-4025379_640-removebg-preview.png') }}" alt="sewainajalogo">
                  <h2 class="font-bold text-purple-400 text-5xl mt-5">Sewain Aja!</h2>
                </a>
            @else
                <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                    class="inline-block">
                    <img class="h-18 -mt-8" src="{{ asset('img/car-4025379_640-removebg-preview.png') }}" alt="sewainajalogo">
                    <h2 class="font-bold text-purple-400 text-5xl mt-5">Sewain Aja!</h2>
                </a>
            @endguest
        </div>

        <!-- Spacer for Address Column Alignment -->
        <div class="hidden md:block">
            <p class="text-sm">Surakarta No. 10</p>
            <p class="text-sm">Jl. Slamet Riyadi</p>
            <p class="text-sm">Surakarta, Jawa Tengah 150211, Indonesia</p>
            <p class="text-sm mt-4">Telp: +62 21 3241 8351</p>
        </div>

        <!-- Links Section -->
        <div>
            <ul>
                <li class="mb-2"><a href="#" class="text-sm text-gray-400 hover:text-purple-500">Tentang
                        Kami</a></li>
                <li class="mb-2"><a href="#" class="text-sm text-gray-400 hover:text-purple-500">Sewa Mobil</a>
                </li>
                <li class="mb-2"><a href="#" class="text-sm text-gray-400 hover:text-purple-500">Hubungi
                        Kami</a></li>
            </ul>
        </div>

        <!-- Contact Center Section -->
        <div class="text-center md:text-right">
            <h2 class="text-xl font-semibold mb-4">Contact Center</h2>
            <div class="flex justify-center md:justify-end items-center mb-4">
                <img src="phone-icon.png" alt="Phone Icon" class="h-8 mr-3">
                <span class="text-3xl font-bold text-white">1500068</span>
            </div>
            <div class="flex justify-center md:justify-end space-x-6">
                <a href="#" class="text-gray-400 hover:text-purple-500"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-400 hover:text-purple-500"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-purple-500"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-700 mt-8 pt-6 text-center">
        <p class="text-sm text-gray-500">©2024, Sewain Aja. All Rights Reserved</p>
    </div>
</footer>
