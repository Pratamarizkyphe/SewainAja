<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class log_penghasilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jumlah',
        'keterangan',
        'penyewaan_id',
    ];

    public function penyewaans(): BelongsTo
    {
        return $this->belongsTo(penyewaan::class);
    }

}
