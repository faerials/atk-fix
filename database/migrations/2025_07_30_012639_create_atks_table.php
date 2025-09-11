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
        Schema::create('atks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Alat Jepit & Klip', 'Alat Tulis', 'Baterai', 'Kertas & Amplop', 'Perekat & Isolasi', 'Perlengkapan Arsip', 'Perlengkapan Meja Kantor', 'Staples & Pelubang', 'Tinta & Cartridge']);
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atks');
    }
};
