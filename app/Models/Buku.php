<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku'; // Nama tabel yang digunakan

    protected $fillable = [
        'poto_buku',
        'judul',
        'id_kategori',
        'penulis',
        'penerbit',
        'description',
        'code',
        'tahun_terbit',
        'jumlah',
        'status'
    ]; // Kolom yang boleh diisi menggunakan mass assignment
    public function relasi_kategori()
    {
        return $this->belongsTo(Kategoribuku::class, 'id_kategori', 'id');
    }
    public function listKategori()
    {
        return $this->hasMany(ListKategori::class, 'id_buku');
    }
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_buku');
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id');
    }
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id');
    }
    public function koleksi()
    {
        return $this->belongsToMany(KoleksiBuku::class, 'buku_koleksi', 'id_buku', 'id_koleksi_buku');
    }
}
