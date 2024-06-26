<!-- resources/views/admin/total-income.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Total Pemasukan</h1>

        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            <p class="text-lg">Total Pemasukan dari Penyewaan yang Sudah Lunas: Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
        </div>
    </div>
</x-app-layout>
