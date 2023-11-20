<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
    $all_inventaris = Inventaris::orderBy('jenis_aset', 'DESC')
      ->where('cabor_id', session('cabor')->id)
      ->get();
    return view('pengurus.inventaris.index', compact('all_inventaris'));
  }

  public function create()
  {
    return view('pengurus.inventaris.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'jenis_barang' => 'required',
      'harga_satuan' => 'required',
      'tanggal' => 'required',
      'jumlah' => 'required',
      'kondisi' => 'required',
      'jenis_aset' => 'required',
    ]);
    Inventaris::create([
      'cabor_id' => session('cabor')->id,
      'jenis_barang' => $request->jenis_barang,
      'harga_satuan' => $request->harga_satuan,
      'tanggal' => $request->tanggal,
      'jumlah' => $request->jumlah,
      'kondisi' => $request->kondisi,
      'jenis_aset' => $request->jenis_aset,
      'deskripsi' => $request->deskripsi,
    ]);
    return redirect('/pengurus/kelola/inventaris')->with('toast_success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    $inventaris = Inventaris::find($id);
    return view('pengurus.inventaris.edit', compact('inventaris'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'jenis_barang' => 'required',
      'harga_satuan' => 'required',
      'tanggal' => 'required',
      'jumlah' => 'required',
      'kondisi' => 'required',
      'jenis_aset' => 'required',
    ]);
    Inventaris::where('id', $id)->update([
      'cabor_id' => session('cabor')->id,
      'jenis_barang' => $request->jenis_barang,
      'harga_satuan' => $request->harga_satuan,
      'tanggal' => $request->tanggal,
      'jumlah' => $request->jumlah,
      'kondisi' => $request->kondisi,
      'jenis_aset' => $request->jenis_aset,
      'deskripsi' => $request->deskripsi,
    ]);
    return redirect('/pengurus/kelola/inventaris')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    Inventaris::destroy($id);
    return redirect('/pengurus/kelola/inventaris')->with('toast_success', 'Data berhasil dihapus');
  }
}
