<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_penghasilans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('jumlah', 10, 2);
            $table->string('keterangan')->nullable();
            $table->foreignId('penyewaan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_penghasilans');
    }
};
