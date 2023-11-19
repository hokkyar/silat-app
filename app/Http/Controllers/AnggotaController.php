<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
    $all_anggota = Anggota::all()->where('cabor_id', session('cabor')->id);
    return view('pengurus.anggota.index', compact('all_anggota'));
  }

  public function create(Request $request)
  {
    if (strtolower($request->query('j')) == 'atlet') {
      return view('pengurus.anggota.create-atlet');
    }
    if (strtolower($request->query('j')) == 'pelatih') {
      return view('pengurus.anggota.create-pelatih');
    }
    abort(404);
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required|date',
    ]);
    $anggota = new Anggota();
    $anggota->cabor_id = session('cabor')->id;
    $anggota->nama = $request->nama;
    $anggota->tempat_lahir = $request->tempat_lahir;
    $anggota->tanggal_lahir = $request->tanggal_lahir;

    if (strtolower($request->query('j')) == 'pelatih') {
      $anggota->jenis = 'pelatih';
      $anggota->nomor_sertifikasi = $request->nomor_sertifikasi;
      if ($request->file('foto_sertifikasi')) {
        $request->validate([
          'foto_sertifikasi' => 'max:2048',
        ], [
          'foto_sertifikasi.max' => 'File maksimal berukuran 2MB!'
        ]);
        $path = $request->file('foto_sertifikasi')->store('public/uploads');
        $anggota->foto_sertifikasi = basename($path);
      }
    }

    if (strtolower($request->query('j')) == 'atlet') {
      $request->validate([
        'nomor_kta' => 'required',
        'sekolah_pt' => 'required',
      ]);
      $anggota->jenis = 'atlet';
      $anggota->nomor_kta = $request->nomor_kta;
      $anggota->sekolah_pt = $request->sekolah_pt;
    }

    $anggota->save();
    return redirect('/pengurus/kelola/anggota')->with('success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    $anggota = Anggota::find($id);
    if ($anggota->jenis == 'atlet') {
      return view('pengurus.anggota.edit-atlet', compact('anggota'));
    }

    if ($anggota->jenis == 'pelatih') {
      return view('pengurus.anggota.edit-pelatih', compact('anggota'));
    }

    abort(404);
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'nama' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required|date',
    ]);
    $anggota = Anggota::find($id);
    $anggota->nama = $request->nama;
    $anggota->tempat_lahir = $request->tempat_lahir;
    $anggota->tanggal_lahir = $request->tanggal_lahir;

    if ($anggota->jenis == 'pelatih') {
      $anggota->nomor_sertifikasi = $request->nomor_sertifikasi;
      if ($request->file('foto_sertifikasi')) {
        $request->validate([
          'foto_sertifikasi' => 'max:2048',
        ], [
          'foto_sertifikasi.max' => 'File maksimal berukuran 2MB!'
        ]);

        if ($anggota->foto_sertifikasi) {
          Storage::delete('public/uploads/' . $anggota->foto_sertifikasi);
        }

        $path = $request->file('foto_sertifikasi')->store('public/uploads');
        $anggota->foto_sertifikasi = basename($path);
      }
    }

    if ($anggota->jenis == 'atlet') {
      $request->validate([
        'nomor_kta' => 'required',
        'sekolah_pt' => 'required',
      ]);
      $anggota->nomor_kta = $request->nomor_kta;
      $anggota->sekolah_pt = $request->sekolah_pt;
    }

    $anggota->save();
    return redirect('/pengurus/kelola/anggota')->with('success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    $anggota = Anggota::find($id);
    if ($anggota->foto_sertifikasi) {
      Storage::delete('public/uploads/' . $anggota->foto_sertifikasi);
    }
    Anggota::destroy($id);
    return redirect('/pengurus/kelola/anggota')->with('success', 'Data berhasil dihapus');
  }
}
