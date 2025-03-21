<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = [
        'id_user',
        'email',
        'nama_lengkap',
        'role'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_petugas');
    }
}
