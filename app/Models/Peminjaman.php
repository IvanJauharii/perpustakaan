<?php

namespace App\Models;

use App\Models\Peminjam;
use App\Models\Petugas;
use App\Models\Notifikasi;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Peminjaman extends Model
{
    protected $table = 'new_peminjamans';
    protected $fillable = [
        'id_peminjam',
        'id_petugas',
        'id_buku',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'tanggal_dikembalikan',
        'status',
        // 'tanggal_dikembalikan',
    ];
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
