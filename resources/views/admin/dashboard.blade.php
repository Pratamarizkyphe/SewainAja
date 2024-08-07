<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Total Mobil -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                <img src="{{ asset('img/car_1680168.png') }}" class="h-5">
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">Total Mobil</p>
                                <p class="text-lg font-semibold text-gray-700">{{ $mobils }}</p>
                            </div>
                        </div>
                        <!-- Total User -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">Total User</p>
                                <p class="text-lg font-semibold text-gray-700">{{ $users }}</p>
                            </div>
                        </div>
                        <!-- Total Penyewaan -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">Total Penyewaan</p>
                                <p class="text-lg font-semibold text-gray-700">{{ $penyewaans }}</p>
                            </div>
                        </div>
                        <!-- Total Penghasilan -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full">
                                <svg class="w-6 h-6" fill="currentColor" stroke="black" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">Total Penghasilan</p>
                                <p class="text-lg font-semibold text-gray-700">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
