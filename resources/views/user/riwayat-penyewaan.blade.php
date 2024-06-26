<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Riwayat Penyewaan</h1>

        @if ($penyewaans->isEmpty())
            <p class="text-lg">Tidak ada riwayat penyewaan yang ditemukan.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">Tanggal Mulai</th>
                            <th class="py-3 px-6 text-left">Tanggal Selesai</th>
                            <th class="py-3 px-6 text-left">Harga Sewa</th>
                            <th class="py-3 px-6 text-left">Status Pembayaran</th>
                            <th class="py-3 px-6 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($penyewaans as $penyewaan)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $penyewaan->start_date }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->end_date }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->harga_sewa }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->status_pembayaran }}</td>
                                <td class="py-3 px-6 text-left">
                                    <a href="{{ route('user.detail-riwayat', $penyewaan->id) }}" class="text-blue-500 hover:text-blue-700">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
