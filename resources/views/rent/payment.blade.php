<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Pembayaran</h1>
        
        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('processPayment') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Metode Pembayaran:</label>
                    <select id="paymentMethod" name="paymentMethod" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="bank_transfer">Transfer Bank</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                
                <div class="mt-6">
                    <x-primary-button w='100'>Bayar</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
