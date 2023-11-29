<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;

class CaborController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Anda yakin? seluruh data mengenai cabor ini akan dihapus');
    $all_cabor = Cabor::all();
    return view('admin.cabor.index', compact('all_cabor'));
  }

  public function create()
  {
    return view('admin.cabor.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama_cabor' => 'required'
    ]);
    Cabor::create($request->all());
    return redirect('/admin/cabor')->with('toast_success', 'Data berhasil ditambahkan');
  }

  public function show(Request $request, String $caborId)
  {
    if (strtolower($request->query('d')) === 'struktur') {
      $data = Cabor::with('struktur')->where('id', $caborId)->firstOrFail();
      return view('admin.cabor.show-struktur', compact('data'));
    }
    if (strtolower($request->query('d')) === 'anggota') {
      $data = Cabor::with('anggota')->where('id', $caborId)->firstOrFail();
      return view('admin.cabor.show-anggota', compact('data'));
    }
    if (strtolower($request->query('d')) === 'program') {
      $data = Cabor::with('program')->where('id', $caborId)->firstOrFail();
      return view('admin.cabor.show-program', compact('data'));
    }
    if (strtolower($request->query('d')) === 'prestasi') {
      $data = Cabor::with('prestasi')->where('id', $caborId)->firstOrFail();
      return view('admin.cabor.show-prestasi', compact('data'));
    }
    if (strtolower($request->query('d')) === 'inventaris') {
      $data = Cabor::with('inventaris')->where('id', $caborId)->firstOrFail();
      return view('admin.cabor.show-inventaris', compact('data'));
    }
    abort(404);
  }

  public function edit(string $id)
  {
    $cabor = Cabor::find($id);
    return view('admin.cabor.edit', compact('cabor'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'nama_cabor' => 'required'
    ]);
    Cabor::where('id', $id)->update($request->except('_method', '_token'));
    return redirect('/admin/cabor')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    Cabor::destroy($id);
    return redirect('/admin/cabor')->with('toast_success', 'Data berhasil dihapus');
  }
}
