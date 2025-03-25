<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
  use HasFactory;

  protected $table = 'buku';

  protected $fillable = [
    'judulbuku',
    'isbn',
    'penerbit',
    'tahun_terbit',
    'stok',
    'penulis',
    'halaman',
    'deskripsi',
    'gambar',
    'kategori_id'
  ];

  public function kategori()
  {
    return $this->belongsTo(KategoriBuku::class, 'kategori_id');
  }
}
