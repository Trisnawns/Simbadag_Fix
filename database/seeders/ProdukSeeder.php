<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama' => 'Smartphone ABC',
                'kode' => 'PRD001',
                'kategori' => 'Elektronik',
                'satuan' => 'pcs',
                'stok' => 15,
                'stok_minim' => 3,
                'harga' => 2500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Buku Tulis A5',
                'kode' => 'PRD002',
                'kategori' => 'Alat Tulis',
                'satuan' => 'pcs',
                'stok' => 200,
                'stok_minim' => 20,
                'harga' => 5000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Shampoo Fresh',
                'kode' => 'PRD003',
                'kategori' => 'Alat Mandi',
                'satuan' => 'pcs',
                'stok' => 40,
                'stok_minim' => 5,
                'harga' => 18000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Keripik Pedas',
                'kode' => 'PRD004',
                'kategori' => 'Jajan',
                'satuan' => 'pcs',
                'stok' => 80,
                'stok_minim' => 10,
                'harga' => 7000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sandal Jepit Classic',
                'kode' => 'PRD005',
                'kategori' => 'Alas Kaki',
                'satuan' => 'pcs',
                'stok' => 50,
                'stok_minim' => 5,
                'harga' => 15000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bedak Halus Natural',
                'kode' => 'PRD006',
                'kategori' => 'Kecantikan',
                'satuan' => 'pcs',
                'stok' => 60,
                'stok_minim' => 8,
                'harga' => 30000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Wajan Anti Lengket',
                'kode' => 'PRD007',
                'kategori' => 'Alat Dapur',
                'satuan' => 'pcs',
                'stok' => 25,
                'stok_minim' => 4,
                'harga' => 85000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
