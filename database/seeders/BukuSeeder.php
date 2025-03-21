<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // mengambil Id Kategori dari tabel kategori_buku
        $kategoriPsikologi = DB::table('kategori_buku')->where('nama_kategori', 'Psikologi')->value('id');
        $kategoriKom = DB::table('kategori_buku')->where('nama_kategori', 'Komunikasi')->value('id');
        DB::table('buku')->insert([
            [
                'poto_buku' => 'https://upload.wikimedia.org/wikipedia/id/f/ff/Filsafat-teras-5c6141eec112fe4c8123aeb2.jpg?20200316095421',
                'judul' => 'Filosofi Teras',
                'id_kategori' => $kategoriPsikologi,
                'penulis' => 'Henry Manampiring',
                'penerbit' => 'Kompas',
                'description' => 'Buku tentang filosofi stoikisme dan cara berpikir lebih tenang dalam hidup.',
                'code' => 'B001',
                'tahun_terbit' => '2018',
                'jumlah' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poto_buku' => 'https://bintangpusnas.perpusnas.go.id/api/getImage/978-979-168-333-3.jpg',
                'judul' => 'Dari Penjara ke Penjara',
                'id_kategori' => $kategoriKom,
                'penulis' => 'Tan Malaka',
                'penerbit' => 'Narasi',
                'description' => 'Memoar perjuangan politik Tan Malaka.',
                'code' => 'B003',
                'tahun_terbit' => '1948',
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poto_buku' => 'https://cdn.gramedia.com/uploads/items/9786024246945_Laut-Bercerita.jpg',
                'judul' => 'Laut Bercerita',
                'id_kategori' => $kategoriKom,
                'penulis' => 'Leila S. Chudori',
                'penerbit' => 'Gramedia',
                'description' => 'Novel berlatar sejarah tragedi 1998 di Indonesia.',
                'code' => 'B002',
                'tahun_terbit' => '2017',
                'jumlah' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
