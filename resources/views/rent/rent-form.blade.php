<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Isi Formulir Penyewaan</h1>
        
        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            <form action="{{route('store')}}" method="POST">
                @csrf
                <input type="hidden" name="mobil_id" value="{{ $carDetails->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="flex justify-center">
                    <div class="mb-4 mt-8 px-2">
                        <label for="startDate" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                        <input type="date" id="startDate" name="start_date" value="{{ $startDate }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                       
                    <div class="mb-4 mt-8 px-2">
                        <label for="endDate" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                        <input type="date" id="endDate" name="end_date" value="{{ $endDate }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" readonly> 
                    </div>
                </div>

                <div class="mb-4 mt-8">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                    <input type="text" id="name" name="nama" value="{{ auth()->user()->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                </div>
                
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                    <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                </div>
                
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipe Penyewa:</label>
                    <select id="type" name="type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" disabled required>
                        <option value="individu" {{ (old('type', $type ?? '') == 'individu') ? 'selected' : '' }}>Individu</option>
                        <option value="perusahaan" {{ (old('type', $type ?? '') == 'perusahaan') ? 'selected' : '' }}>Perusahaan</option>
                    </select>
                   
                </div>

                <div class="mb-4">
                    <label for="harga_sewa" class="block text-sm font-medium text-gray-700">Harga Sewa:</label>
                    <input type="text" id="harga_sewa" name="harga_sewa" value="{{ $carDetails->harga_sewa * $rangeDate}} " class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" readonly>
                </div>
                
                <div class="mt-6">
                    <x-btn-submit w='100'>Lanjutkan ke Pembayaran</x-btn-submit>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
