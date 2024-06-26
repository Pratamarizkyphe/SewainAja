<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class mobil extends Model
{
    use HasFactory;

     protected $fillable = [
        'merk',
        'nama',
        'tahun',
        'warna',
        'harga_sewa',
        'nomor_plat',
        'gambar',
    ];

    public function penyewaans(): HasOne {
        return $this->hasOne(penyewaan::class);    }
}
