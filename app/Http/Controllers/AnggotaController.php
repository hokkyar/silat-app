<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
  public function index()
  {
    $all_anggota = Anggota::all()->where('cabor_id', session('cabor')->id);
    dd($all_anggota);
    return view('pengurus.anggota.index', compact('all_anggota'));
  }

  public function create(Request $request)
  {
    if (strtolower($request->query('j')) == 'atlet') {
      dd('tambah atlet');
    }
    if (strtolower($request->query('j')) == 'pelatih') {
      dd('tambah pelatih');
    }
    abort(404);
  }

  public function store(Request $request)
  {
    // $anggota = new Anggota();
    // if (strtolower($request->query('j')) == 'atlet') {
    //   $request->validate([]);   
    // }
    // if (strtolower($request->query('j')) == 'pelatih') {
    //   $request->validate([]);
    // }
    // $anggota->save();
    // return redirect('/pengurus/kelola/anggota')->with('success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    // $anggota = Anggota::find($id);
    // if($anggota->jenis == 'atlet'){
    //   return view('pengurus.anggota.edit-atlet');
    // }

    // if($anggota->jenis == 'pelatih'){
    //   return view('pengurus.anggota.edit-pelatih');
    // }

    // abort(404);
  }

  public function update(Request $request, string $id)
  {
    //
  }

  public function destroy(string $id)
  {
    // Anggota::destroy($id);
    // return redirect('/pengurus/kelola/anggota')->with('success', 'Data berhasil dihapus');
  }
}
