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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('nama');
            $table->integer('tahun');
            $table->string('warna');
            $table->integer('harga_sewa');
            $table->string('nomor_plat');
            $table->string('gambar');
            $table->boolean('ready')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
