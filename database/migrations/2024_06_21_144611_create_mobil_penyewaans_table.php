<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\penyewaan;
use App\Models\mobil;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mobil_penyewaans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(penyewaan::class);
            $table->foreignIdFor(mobil::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil_penyewaans');
    }
};
