<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'merk',
        'nama',
        'tahun',
        'warna',
        'harga_sewa',
        'nomor_plat',
        'ready'
    ];
}
