<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class penyewaan extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'mobil_id',
        'start_date',
        'end_date',
        'harga_sewa',
        'type',
    ];

    public function mobils(): BelongsTo {
        return $this->belongsTo(mobil::class, 'foreign_key', 'local_key');
    }
}
