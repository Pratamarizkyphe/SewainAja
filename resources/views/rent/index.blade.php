<x-app-layout>
    <section class="bg-gray-100 py-12">
        <!-- Menyesuaikan padding atas dan bawah -->
        <div class="bg-white flex flex-col text-black p-16 shadow-xl sm:rounded-lg">
            <div class="container mx-auto px-4 md:px-0">
                <!-- Menyesuaikan padding kiri kanan dan mengatur lebar konten -->
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <form action="" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai: </label>
                            <input type="date" name="startDate" id="startDate" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai: </label>
                            <input type="date" name="endDate" id="endDate" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-purple-500 text-white px-4 py-2 hover:bg-purple-600">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('startDate').setAttribute('min', today);
            document.getElementById('endDate').setAttribute('min', today);
        });
    </script>
</x-app-layout>
