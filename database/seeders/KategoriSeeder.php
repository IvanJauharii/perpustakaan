<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_buku')->insert([
            [
                'nama_kategori' => "Teknologi",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => "Komunikasi",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => "Psikologi",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
