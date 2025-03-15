<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    // Seeder untuk User
    $adminUser = User::create([
      'email' => 'admin@example.com',
      'password' => Hash::make('password123'),
      'role' => 'admin'
    ]);

    $userMasyarakat = User::create([
      'email' => 'user@example.com',
      'password' => Hash::make('password123'),
      'role' => 'user'
    ]);

    // Seeder untuk Admin
    Admin::create([
      'user_id' => $adminUser->id,
      'nama' => 'Admin Satu',
      'alamat' => 'Jalan Admin No. 1',
      'nomor_telepon' => '08123456789',
      'foto' => null
    ]);

    // Seeder untuk Masyarakat (pastikan model sesuai nama tabel 'masyarakat')
    Masyarakat::create([
      'user_id' => $userMasyarakat->id,
      'nama' => 'Masyarakat Satu',
      'alamat' => 'Jalan Masyarakat No. 2',
      'nomor_telepon' => '08198765432',
      'tempat_tanggal_lahir' => '1990-05-15',
      'nik' => '1234567890123456',
      'foto' => null
    ]);
  }
}
