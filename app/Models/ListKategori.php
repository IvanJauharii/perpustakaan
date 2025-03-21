<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listkategori extends Model
{
  protected $table = 'list_kategori';

  protected $fillable = ['id_kategori', 'id_buku'];

  public function buku()
  {
    return $this->belongsTo(Buku::class, 'id_buku');
  }
  public function kategori()
  {
    return $this->belongsTo(KategoriBuku::class, 'id_kategori');
  }
}
