<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penyewaan extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'mobil_id',
        'user_id',
        'nama',
        'start_date',
        'end_date',
        'harga_sewa',
        'type',
        'status_pembayaran',
    ];

    public function mobils(): BelongsTo {
        return $this->belongsTo(mobil::class, 'mobil_id', 'id');
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function logPenghasilans(): HasMany
    {
        return $this->hasMany(log_penghasilan::class);
    }
}
