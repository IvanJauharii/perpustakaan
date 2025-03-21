<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $fillable = [
        'id_peminjam',
        'id_buku',
        'jumlah',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
        'nama_petugas',
        'pesan'
    ];

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
