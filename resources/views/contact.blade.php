<x-app-layout>
    <section class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl font-bold">
                        Hubungi Kami
                    </div>
                    <div class="mt-6 text-gray-500">
                        <p>
                            Kami selalu siap untuk membantu Anda. Jangan ragu untuk menghubungi kami melalui informasi di bawah ini atau mengisi formulir kontak.
                        </p>
                    </div>
                </div>
                <div class="p-6 bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold">Informasi Kontak</h3>
                            <p class="mt-4 text-gray-500">
                                <strong>Alamat:</strong> Jl Gg.buntu No 40 Jebres, Surakarta, Jawa Tengah
                            </p>
                            <p class="mt-2 text-gray-500">
                                <strong>Telepon:</strong> 081311245677
                            </p>
                            <p class="mt-2 text-gray-500">
                                <strong>Email:</strong> sewainaja@official.com
                            </p>
                            <p class="mt-2 text-gray-500">
                                <strong>Jam Operasional:</strong> Senin - Jumat, 08:00 - 17:00
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Formulir Kontak</h3>
                            <form class="mt-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                    <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div class="mt-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div class="mt-4">
                                    <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                                    <textarea id="message" name="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="w-full px-4 py-2 bg-purple-800 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
