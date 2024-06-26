<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Isi Formulir Penyewaan</h1>
        
        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            <form action="#" method="POST">
                @csrf
                <input type="hidden" name="car_id" value="{{ $carDetails->id }}">
                
                <div class="flex justify-center">
                    <div class="mb-4 mt-8 px-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="startDate" value="{{ $startDate }}" disabled>
                    </div>
                       
                    <div class="mb-4 mt-8 px-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" name="endDate" value="{{ $endDate }}" disabled> 
                    </div>
                </div>

                <div class="mb-4 mt-8">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                </div>
                
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                    <input type="text" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                </div>
                
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipe Penyewa:</label>
                    <select id="type" name="type" disabled class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                        <option value="individu">Individu</option>
                        <option value="perusahaan">Perusahaan</option>
                    </select>
                </div>
                
                <div class="mt-6">
                    <x-btn-submit w='100'>Lanjutkan ke Pembayaran</x-btn-submit>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
