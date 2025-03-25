<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
  public function index()
  {
    $buku = Buku::with('kategori')->get();
    $kategori = KategoriBuku::all();
    return view('adminDataBuku', compact('buku', 'kategori'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'judulbuku' => 'required|string|max:255',
      'isbn' => 'required|string|max:13|unique:buku',
      'penerbit' => 'required|string|max:255',
      'tahun_terbit' => 'required|integer',
      'stok' => 'required|in:Tersedia,Tidak Tersedia',
      'penulis' => 'required|string|max:255',
      'halaman' => 'required|integer',
      'deskripsi' => 'nullable|string',
      'kategori_id' => 'required|exists:kategori_buku,id',
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $gambarPath = null;
    if ($request->hasFile('gambar')) {
      $gambarPath = $request->file('gambar')->store('uploads/buku', 'public');
    }

    Buku::create([
      'judulbuku' => $request->judulbuku,
      'isbn' => $request->isbn,
      'penerbit' => $request->penerbit,
      'tahun_terbit' => $request->tahun_terbit,
      'stok' => $request->stok,
      'penulis' => $request->penulis,
      'halaman' => $request->halaman,
      'deskripsi' => $request->deskripsi,
      'kategori_id' => $request->kategori_id,
      'gambar' => $gambarPath,
    ]);

    return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
  }

  public function update(Request $request, $id)
  {
    $buku = Buku::findOrFail($id);

    $request->validate([
      'judulbuku' => 'required|string|max:255',
      'isbn' => 'required|string|max:13|unique:buku,isbn,' . $id,
      'penerbit' => 'required|string|max:255',
      'tahun_terbit' => 'required|integer',
      'stok' => 'required|in:Tersedia,Tidak Tersedia',
      'penulis' => 'required|string|max:255',
      'halaman' => 'required|integer',
      'deskripsi' => 'nullable|string',
      'kategori_id' => 'required|exists:kategori_buku,id',
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
      if ($buku->gambar) {
        Storage::disk('public')->delete($buku->gambar);
      }
      $buku->gambar = $request->file('gambar')->store('uploads/buku', 'public');
    }

    $buku->update($request->except('gambar'));

    return redirect()->back()->with('success', 'Buku berhasil diperbarui!');
  }

  public function destroy($id)
  {
    $buku = Buku::findOrFail($id);

    if ($buku->gambar) {
      Storage::disk('public')->delete($buku->gambar);
    }

    $buku->delete();

    return redirect()->back()->with('success', 'Buku berhasil dihapus!');
  }
}
