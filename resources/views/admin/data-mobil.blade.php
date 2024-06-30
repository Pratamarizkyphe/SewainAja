<x-app-layout>
    <div class="flex justify-end w-full">
        <div class="flex px-0 my-6 space-x-3">
            {{-- 
            @auth
                @include('components.add-btn', ['url' => 'mobil', 'btn' => 'mobil'])
            @endauth

            @include('components.cetak-btn', ['url' => 'mobil', 'slug' => 'mobil', 'btn' => 'mobil']) --}}
            {{-- <x-search-input url="mobil" text="mobil"></x-search-input> --}}
            
            @include('components.btn-add', ['url' => route('mobils.create'), 'btn' => 'Tambah Mobil'])
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap bg-white divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Nama mobil</th>
                        <th class="px-4 py-3">Merk</th>
                        <th class="px-4 py-3">Tahun</th>
                        <th class="px-4 py-3">Warna</th>
                        <th class="px-4 py-3">Harga Sewa</th>
                        <th class="px-4 py-3">Nomor Plat</th>
                        <th class="px-4 py-3">Ready</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($mobils as $key => $mobil)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">{{ $mobils->firstItem() + $key }}</td>
                            <td class="px-4 py-3 text-sm"><img class="w-24" src="{{ asset('storage/mobil/'.$mobil->gambar) }}" alt="gambar-mobil"></td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->nama }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->merk }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->tahun }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->warna }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->harga_sewa }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->nomor_plat }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mobil->ready ? 'Yes' : 'No' }}</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('mobils.show', $mobil->id) }}" class="text-blue-600 hover:text-blue-900" aria-label="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    @auth
                                        <a href="{{route('mobils.edit', $mobil->id)}}" class="text-green-600 hover:text-green-900" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{route('mobils.destroy', $mobil->id)}}" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase bg-gray-50 sm:grid-cols-9">
            <span class="flex items-center col-span-3">
                Showing {{ $mobils->firstItem() }} - {{ $mobils->lastItem() }} of {{ $mobils->total() }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    {{ $mobils->links('pagination::tailwind') }}
                </nav>
            </span>
        </div>
    </div>
</x-app-layout>
