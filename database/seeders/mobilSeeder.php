<?php

namespace Database\Seeders;

use App\Models\mobil;
use Illuminate\Database\Seeder;

class mobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMobil = [
            [
                'merk' => 'Toyota',
                'nama' => 'Avanza',
                'tahun' => 2020,
                'warna' => 'Putih',
                'harga_sewa' => 350000,
                'nomor_plat' => 'B 1234 ABC',
                'ready' => true,
            ],
            [
                'merk' => 'Honda',
                'nama' => 'Civic',
                'tahun' => 2019,
                'warna' => 'Hitam',
                'harga_sewa' => 450000,
                'nomor_plat' => 'B 5678 DEF',
                'ready' => true,
            ],
            [
                'merk' => 'Suzuki',
                'nama' => 'Ertiga',
                'tahun' => 2021,
                'warna' => 'Merah',
                'harga_sewa' => 400000,
                'nomor_plat' => 'B 9101 GHI',
                'ready' => false,
            ],
            // Add more entries as needed
        ];

        foreach ($dataMobil as $data) {
            Mobil::create($data);
            echo "Inserted: " . $data['nama'] . "\n";
        }
    }
}
