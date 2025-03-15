<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
  use HasApiTokens;

  public function register(Request $request)
  {
    $request->validate([
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'nama' => 'required',
      'alamat' => 'required',
      'nomor_telepon' => 'required',
      'tempat_tanggal_lahir' => 'required',
      'nik' => 'required|unique:masyarakat',
      'foto' => 'nullable',
    ]);

    $user = User::create([
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => 'user',
    ]);

    Masyarakat::create([
      'user_id' => $user->id,
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'nomor_telepon' => $request->nomor_telepon,
      'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
      'nik' => $request->nik,
      'foto' => $request->foto,
    ]);

    return response()->json(['message' => 'Registrasi berhasil'], 201);
  }

  public function loginWeb(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return redirect()->back()->with('error', 'Email atau password salah!');
    }

    if ($user->role === 'user') {
      return redirect()->back()->with('error', 'Akses ditolak. Silakan login melalui aplikasi mobile.');
    }

    Auth::login($user);

    return redirect('/adminDashboard')->with('success', 'Login berhasil!');
  }

  public function loginApi(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json(['message' => 'Login gagal'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
      'message' => 'Login berhasil',
      'token' => $token,
      'user' => $user,
    ]);
  }

  public function logout(Request $request)
  {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logout berhasil']);
  }

  public function logoutWeb()
  {
    Auth::logout();
    return redirect('/login')->with('success', 'Logout berhasil!');
  }
}
