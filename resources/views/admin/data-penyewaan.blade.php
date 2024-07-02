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
                            <th class="py-3 px-6 text-left">Nama</th>
                            <th class="py-3 px-6 text-left">Tanggal Mulai</th>
                            <th class="py-3 px-6 text-left">Tanggal Selesai</th>
                            <th class="py-3 px-6 text-left">Harga Sewa</th>
                            <th class="py-3 px-6 text-left">Status Pembayaran</th>
                            <th class="py-3 px-6 text-mid">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($penyewaans as $penyewaan)
                            @php
                                $bgColorClass = '';
                                switch ($penyewaan->status_pembayaran) {
                                    case 'Sudah Lunas':
                                        $bgColorClass = 'bg-green-200';
                                        break;
                                    case 'Proses Pembatalan':
                                        $bgColorClass = 'bg-red-100';
                                        break;
                                    case 'Dibatalkan':
                                        $bgColorClass = 'bg-red-200';
                                        break;
                                    default:
                                        $bgColorClass = '';
                                        break;
                                }
                            @endphp

                            <tr class="border-b border-gray-200 hover:bg-gray-300 {{ $bgColorClass }}">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $penyewaan->nama }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->start_date }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->end_date }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->harga_sewa }}</td>
                                <td class="py-3 px-6 text-left">{{ $penyewaan->status_pembayaran }}</td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center space-x-2">
                                        <a class="text-blue-500" href="{{ route('admin.detailShow', $penyewaan->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        @if ($penyewaan->status_pembayaran == 'Sedang Diproses')
                                            <form action="{{ route('admin.verifyPayment', $penyewaan->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-transparent text-blue-500 px-4 py-2 hover:text-blue-700">Verifikasi</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.destroy', $penyewaan->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        @if ($penyewaan->status_pembayaran == 'Proses Pembatalan')
                                        <!-- Modal -->
                                        <div x-data="{ open: false, penyewaanId: null }">
                                            <button @click="open = true; penyewaanId = {{ $penyewaan->id }}" class="text-red-500 ml-2">
                                                Konfirmasi Pembatalan
                                            </button>
                                            <div x-show="open" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" style="display: none;">
                                                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                                    <div>
                                                        <h3 class="text-lg font-bold mb-4">Konfirmasi Pembatalan</h3>
                                                        <p class="mb-2">Apakah Anda yakin ingin membatalkan penyewaan ini?</p>
                                                        <form action="{{ route('admin.approveCancel', $penyewaan->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Terima</button>
                                                        </form>
                                                        <form action="{{ route('admin.rejectCancel', $penyewaan->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded">Tolak</button>
                                                        </form>
                                                        <button type="button" @click="open = false" class="px-4 py-2 bg-blue-500 text-white rounded">Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
