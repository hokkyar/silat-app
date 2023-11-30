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
    $all_anggota = Anggota::orderBy('jenis', 'ASC')
      ->where('cabor_id', session('cabor')->id)
      ->get();
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

      // nomor sertifikasi
      $anggota->nomor_sertifikasi = implode(', ', [
        $request->nomor_sertifikasi_1 ?? null,
        $request->nomor_sertifikasi_2 ?? null,
        $request->nomor_sertifikasi_3 ?? null,
      ]);

      // foto sertifikasi
      $path_1 = 'https://th.bing.com/th/id/OIP.InM3BOFnXhf_eK3RNnyLlwAAAA?rs=1&pid=ImgDetMain';
      $path_2 = 'https://th.bing.com/th/id/OIP.InM3BOFnXhf_eK3RNnyLlwAAAA?rs=1&pid=ImgDetMain';
      $path_3 = 'https://th.bing.com/th/id/OIP.InM3BOFnXhf_eK3RNnyLlwAAAA?rs=1&pid=ImgDetMain';
      if ($request->file('foto_sertifikasi_1') || $request->file('foto_sertifikasi_2') || $request->file('foto_sertifikasi_3')) {
        $request->validate([
          'foto_sertifikasi_1' => 'max:2048',
          'foto_sertifikasi_2' => 'max:2048',
          'foto_sertifikasi_3' => 'max:2048',
        ], [
          'foto_sertifikasi_1.max' => 'File maksimal berukuran 2MB!',
          'foto_sertifikasi_2.max' => 'File maksimal berukuran 2MB!',
          'foto_sertifikasi_3.max' => 'File maksimal berukuran 2MB!',
        ]);
        if ($request->file('foto_sertifikasi_1')) {
          $path_1 = basename($request->file('foto_sertifikasi_1')->store('public/uploads'));
        }
        if ($request->file('foto_sertifikasi_2')) {
          $path_2 = basename($request->file('foto_sertifikasi_2')->store('public/uploads'));
        }
        if ($request->file('foto_sertifikasi_3')) {
          $path_3 = basename($request->file('foto_sertifikasi_3')->store('public/uploads'));
        }
      }
      $path = implode(', ', [$path_1, $path_2, $path_3]);
      $anggota->foto_sertifikasi = $path;
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
    return redirect('/pengurus/kelola/anggota')->with('toast_success', 'Data berhasil ditambahkan');
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
      // nomor sertifikasi
      $anggota->nomor_sertifikasi = implode(', ', [
        $request->nomor_sertifikasi_1 ?? null,
        $request->nomor_sertifikasi_2 ?? null,
        $request->nomor_sertifikasi_3 ?? null,
      ]);

      $path_1 = explode(', ', $anggota->foto_sertifikasi)[0];
      $path_2 = explode(', ', $anggota->foto_sertifikasi)[1];
      $path_3 = explode(', ', $anggota->foto_sertifikasi)[2];

      if ($request->file('foto_sertifikasi_1') || $request->file('foto_sertifikasi_2') || $request->file('foto_sertifikasi_3')) {
        $request->validate([
          'foto_sertifikasi_1' => 'max:2048',
          'foto_sertifikasi_2' => 'max:2048',
          'foto_sertifikasi_3' => 'max:2048',
        ], [
          'foto_sertifikasi_1.max' => 'File maksimal berukuran 2MB!',
          'foto_sertifikasi_2.max' => 'File maksimal berukuran 2MB!',
          'foto_sertifikasi_3.max' => 'File maksimal berukuran 2MB!',
        ]);
        if ($request->file('foto_sertifikasi_1')) {
          if (!strpos($path_1, 'https')) {
            Storage::delete('public/uploads/' . $path_1);
          }
          $path_1 = basename($request->file('foto_sertifikasi_1')->store('public/uploads'));
        }
        if ($request->file('foto_sertifikasi_2')) {
          if (!strpos($path_2, 'https')) {
            Storage::delete('public/uploads/' . $path_2);
          }
          $path_2 = basename($request->file('foto_sertifikasi_2')->store('public/uploads'));
        }
        if ($request->file('foto_sertifikasi_3')) {
          if (!strpos($path_3, 'https')) {
            Storage::delete('public/uploads/' . $path_3);
          }
          $path_3 = basename($request->file('foto_sertifikasi_3')->store('public/uploads'));
        }
      }
      $path = implode(', ', [$path_1, $path_2, $path_3]);
      $anggota->foto_sertifikasi = $path;
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
    return redirect('/pengurus/kelola/anggota')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    $anggota = Anggota::find($id);
    $foto = explode(', ', $anggota->foto_sertifikasi);
    if (!strpos($foto[0], 'https')) {
      Storage::delete('public/uploads/' . $foto[0]);
    }
    if (!strpos($foto[1], 'https')) {
      Storage::delete('public/uploads/' . $foto[1]);
    }
    if (!strpos($foto[2], 'https')) {
      Storage::delete('public/uploads/' . $foto[2]);
    }
    Anggota::destroy($id);
    return redirect('/pengurus/kelola/anggota')->with('toast_success', 'Data berhasil dihapus');
  }
}
