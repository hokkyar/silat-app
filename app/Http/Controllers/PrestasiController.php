<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
    $all_prestasi = Prestasi::where('cabor_id', session('cabor')->id)->get();
    return view('pengurus.prestasi.index', compact('all_prestasi'));
  }

  public function create()
  {
    return view('pengurus.prestasi.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama_kejuaraan' => 'required',
      'tanggal' => 'required',
    ]);

    $prestasi = new Prestasi();
    $prestasi->cabor_id = session('cabor')->id;
    $prestasi->nama_kejuaraan = $request->nama_kejuaraan;
    $prestasi->tanggal = $request->tanggal;
    $prestasi->prestasi = $request->prestasi;
    $prestasi->sertifikat = $request->sertifikat;

    if ($request->file('foto')) {
      $request->validate([
        'foto' => 'max:2048',
      ], [
        'foto.max' => 'File maksimal berukuran 2MB!'
      ]);

      $path = $request->file('foto')->store('public/uploads');
      $prestasi->foto = basename($path);
    }

    $prestasi->deskripsi = $request->deskripsi;
    $prestasi->save();
    return redirect('/pengurus/kelola/prestasi')->with('toast_success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    $prestasi = Prestasi::find($id);
    return view('pengurus.prestasi.edit', compact('prestasi'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'nama_kejuaraan' => 'required',
      'tanggal' => 'required',
    ]);

    $prestasi = Prestasi::find($id);
    $prestasi->nama_kejuaraan = $request->nama_kejuaraan;
    $prestasi->tanggal = $request->tanggal;
    $prestasi->prestasi = $request->prestasi;
    $prestasi->sertifikat = $request->sertifikat;

    if ($request->file('foto')) {
      $request->validate([
        'foto' => 'max:2048',
      ], [
        'foto.max' => 'File maksimal berukuran 2MB!'
      ]);

      if ($prestasi->foto) {
        Storage::delete('public/uploads/' . $prestasi->foto);
      }

      $path = $request->file('foto')->store('public/uploads');
      $prestasi->foto = basename($path);
    }

    $prestasi->deskripsi = $request->deskripsi;
    $prestasi->save();
    return redirect('/pengurus/kelola/prestasi')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    $prestasi = Prestasi::find($id);
    if ($prestasi->foto) {
      Storage::delete('public/uploads/' . $prestasi->foto);
    }
    Prestasi::destroy($id);
    return redirect('/pengurus/kelola/prestasi')->with('toast_success', 'Data berhasil dihapus');
  }
}
