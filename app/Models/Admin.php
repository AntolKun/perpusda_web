<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'nama',
    'alamat',
    'nomor_telepon',
    'foto'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}