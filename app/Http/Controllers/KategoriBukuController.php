<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;

class KategoriBukuController extends Controller
{
  public function index()
  {
    $kategori_buku = KategoriBuku::latest()->get();
    return view('adminKategoriBuku', compact('kategori_buku'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required|unique:kategori_buku,nama',
      'deskripsi' => 'nullable'
    ]);

    KategoriBuku::create($request->all());

    return redirect()->back()->with('success', 'Kategori buku berhasil ditambahkan.');
  }

  public function update(Request $request, $id)
  {
    $kategori = KategoriBuku::findOrFail($id);

    $request->validate([
      'nama' => 'required|unique:kategori_buku,nama,' . $kategori->id,
      'deskripsi' => 'nullable'
    ]);

    $kategori->update($request->all());

    return redirect()->back()->with('success', 'Kategori buku berhasil diperbarui.');
  }

  public function destroy($id)
  {
    $kategori = KategoriBuku::findOrFail($id);
    $kategori->delete();

    return redirect()->back()->with('success', 'Kategori buku berhasil dihapus.');
  }
}
