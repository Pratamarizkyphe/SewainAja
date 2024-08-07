<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'ready'
    ];

    public function penyewaans(): HasMany {
        return $this->hasMany(penyewaan::class);    }
}
