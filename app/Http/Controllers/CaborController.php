<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;

class CaborController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
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
    return redirect('/admin/cabor')->with('success', 'Data berhasil ditambahkan');
  }

  public function show()
  {
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
    return redirect('/admin/cabor')->with('success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    Cabor::destroy($id);
    return redirect('/admin/cabor')->with('success', 'Data berhasil dihapus');
  }
}
