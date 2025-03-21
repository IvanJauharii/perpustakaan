<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoribuku extends Model
{
    use HasFactory;
    protected $table = 'kategori_buku';

    protected $fillable = [
        'nama_kategori'
    ];

    public function relasi_buku()
    {
        return $this->hasMany(Buku::class, 'id_kategori');
    }

    public function listKategori()
    {
        return $this->hasMany(ListKategori::class, 'id_kategori');
    }
}
