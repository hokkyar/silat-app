<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
    $all_program = Program::orderBy('jenis', 'DESC')
      ->where('cabor_id', session('cabor')->id)
      ->get();
    return view('pengurus.program.index', compact('all_program'));
  }

  public function create()
  {
    return view('pengurus.program.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama_program' => 'required',
      'tanggal' => 'required|date',
      'jenis' => 'required'
    ]);
    Program::create([
      'cabor_id' => session('cabor')->id,
      'nama_program' => $request->nama_program,
      'tanggal' => $request->tanggal,
      'jenis' => $request->jenis,
      'lokasi' => $request->lokasi,
      'deskripsi' => $request->deskripsi,
    ]);
    return redirect('/pengurus/kelola/program')->with('toast_success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    $program = Program::find($id);
    return view('pengurus.program.edit', compact('program'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'nama_program' => 'required',
      'tanggal' => 'required|date',
      'jenis' => 'required'
    ]);
    Program::where('id', $id)->update([
      'nama_program' => $request->nama_program,
      'tanggal' => $request->tanggal,
      'jenis' => $request->jenis,
      'lokasi' => $request->lokasi,
      'deskripsi' => $request->deskripsi,
    ]);
    return redirect('/pengurus/kelola/program')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    Program::destroy($id);
    return redirect('/pengurus/kelola/program')->with('toast_success', 'Data berhasil dihapus');
  }
}
