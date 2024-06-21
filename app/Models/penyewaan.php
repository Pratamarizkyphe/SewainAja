<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyewaan extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'harga_sewa',
        'type',
    ];
}
