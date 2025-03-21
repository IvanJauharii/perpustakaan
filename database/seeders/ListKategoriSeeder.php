<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data buku dan kategori dari database
        $buku = DB::table('buku')->pluck('id')->toArray();
        $kategori = DB::table('kategori_buku')->pluck('id')->toArray();

        // Jika salah satu kosong, hentikan seeder
        if (empty($buku) || empty($kategori)) {
            return;
        }

        // Tambahkan data ke list_kategori
        foreach ($buku as $id_buku) {
            DB::table('list_kategori')->insert([
                'id_kategori' => $kategori[array_rand($kategori)], // Ambil kategori secara acak
                'id_buku' => $id_buku,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
