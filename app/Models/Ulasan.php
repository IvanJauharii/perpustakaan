<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $fillable = [
        'id_peminjam',
        'id_buku',
        'ulasan'
    ];

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
