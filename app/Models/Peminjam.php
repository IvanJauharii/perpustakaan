<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjam';
    protected $fillable = ['email', 'id_user', 'nama_lengkap'];
    protected $attributes = [
        'poto' => 'https://api.dicebear.com/9.x/lorelei/svg',
    ];

    public function koleksi()
    {
        return $this->hasMany(KoleksiBuku::class, 'id_peminjam');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_peminjam');
    }
}
