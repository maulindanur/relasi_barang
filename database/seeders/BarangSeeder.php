<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabel_barang')->insert([
            [
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Indomie Goreng',
                'id_kategori' => 1,
                'harga_barang' => 3500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Beras Premium 5kg',
                'id_kategori' => 2,
                'harga_barang' => 65000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Gula Pasir 1kg',
                'id_kategori' => 2,
                'harga_barang' => 15000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'BRG004',
                'nama_barang' => 'Minyak Goreng 1L',
                'id_kategori' => 3,
                'harga_barang' => 14000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
