<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminDataController extends Controller
{
  public function index()
  {
    $admins = Admin::with('user')->get();
    return view('adminDataAdmin', compact('admins'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6',
      'alamat' => 'required',
      'nomor_telepon' => 'required',
      'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $user = User::create([
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => 'admin'
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto')) {
      $foto = $request->file('foto');
      $fotoName = time() . '_' . $foto->getClientOriginalName();
      $foto->move(public_path('admin_photos'), $fotoName);
      $fotoPath = $fotoName;
    }

    Admin::create([
      'user_id' => $user->id,
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'nomor_telepon' => $request->nomor_telepon,
      'foto' => $fotoPath
    ]);

    return redirect()->back()->with('success', 'Admin berhasil ditambahkan');
  }

  public function update(Request $request, $id)
  {
    $admin = Admin::findOrFail($id);
    $user = $admin->user;

    $request->validate([
      'nama' => 'required',
      'email' => 'required|email|unique:users,email,' . $user->id,
      'alamat' => 'required',
      'nomor_telepon' => 'required',
      'password' => 'nullable|min:6',
      'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $user->update(['email' => $request->email]);

    if ($request->filled('password')) {
      $user->update(['password' => Hash::make($request->password)]);
    }

    // Cek jika ada file foto yang diunggah
    if ($request->hasFile('foto')) {
      // Hapus foto lama jika ada
      if ($admin->foto) {
        $oldFotoPath = public_path('admin_photos/' . $admin->foto);
        if (file_exists($oldFotoPath)) {
          unlink($oldFotoPath);
        }
      }

      $foto = $request->file('foto');
      $fotoName = time() . '_' . $foto->getClientOriginalName();
      $foto->move(public_path('admin_photos'), $fotoName);
      $admin->foto = $fotoName;
    }

    $admin->update([
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'nomor_telepon' => $request->nomor_telepon,
      'foto' => $admin->foto
    ]);

    return redirect()->back()->with('success', 'Admin berhasil diperbarui');
  }

  public function destroy($id)
  {
    $admin = Admin::findOrFail($id);
    $user = $admin->user;

    $admin->delete();
    $user->delete();

    return redirect()->back()->with('success', 'Admin berhasil dihapus');
  }
}
