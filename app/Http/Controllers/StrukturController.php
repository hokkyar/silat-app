<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
    $all_struktur = Struktur::all()->where('cabor_id', session('cabor')->id);
    return view('pengurus.struktur.index', compact('all_struktur'));
  }

  public function create()
  {
    return view('pengurus.struktur.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama_pengurus' => 'required',
      'jabatan' => 'required'
    ]);
    Struktur::create([
      'nama_pengurus' => Str::title($request->nama_pengurus),
      'jabatan' => Str::title($request->jabatan),
      'cabor_id' => session('cabor')->id,
    ]);
    return redirect('/pengurus/struktur')->with('toast_success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    $struktur = Struktur::find($id);
    return view('pengurus.struktur.edit', compact('struktur'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'nama_pengurus' => 'required',
      'jabatan' => 'required'
    ]);
    Struktur::where('id', $id)->update([
      'nama_pengurus' => Str::title($request->nama_pengurus),
      'jabatan' => Str::title($request->jabatan),
    ]);
    return redirect('/pengurus/struktur')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    Struktur::destroy($id);
    return redirect('/pengurus/struktur')->with('toast_success', 'Data berhasil dihapus');
  }
}
