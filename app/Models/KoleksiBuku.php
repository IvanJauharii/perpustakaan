<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiBuku extends Model
{
    use HasFactory;
    protected $table = 'koleksi_buku';
    protected $fillable = ['id_peminjam', 'nama'];

    // Relasi Many to One: KoleksiBuku ke Peminjam
    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }
    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'buku_koleksi', 'id_koleksi_buku', 'id_buku');
    }
}
