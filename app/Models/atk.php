<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atk extends Model
{
    protected $fillable = ['nama', 'kategori', 'stok', 'deskripsi', 'gambar', 'lokasi',];
        public static function getKategoriList()
    {
        return['Alat Jepit & Klip', 'Alat Tulis', 'Baterai', 'Kertas & Amplop', 'Perekat & Isolasi', 'Perlengkapan Arsip', 'Perlengkapan Meja Kantor', 'Staples & Pelubang', 'Tinta & Cartridge'];
    }
    
}
