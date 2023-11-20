<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengurusController extends Controller
{
  public function index()
  {
    confirmDelete('Warning', 'Yakin ingin menghapus data ini?');
    $users = User::with('cabor')->get()->where('role', 'pengurus');
    return view('admin.pengurus.index', compact('users'));
  }

  public function create()
  {
    $all_cabor = Cabor::all();
    return view('admin.pengurus.create', compact('all_cabor'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'username' => 'required|unique:users|regex:/^\S*$/',
      'password' => 'required',
      'cabor_id' => 'required',
    ], [
      'username.unique' => 'Username telah digunakan!',
      'username.regex' => 'Username tidak boleh mengandung spasi!'
    ]);
    User::create([
      'username' => strtolower($request->username),
      'password' => Hash::make($request->password),
      'role' => 'pengurus',
      'cabor_id' => $request->cabor_id,
    ]);
    return redirect('/admin/pengurus')->with('toast_success', 'Data berhasil ditambahkan');
  }

  public function show(string $id)
  {
    abort(404);
  }

  public function edit(string $id)
  {
    $pengurus = User::find($id);
    $all_cabor = Cabor::all();
    return view('admin.pengurus.edit', compact('pengurus', 'all_cabor'));
  }

  public function update(Request $request, string $id)
  {
    $user = User::find($id);
    if ($user->username != $request->username) {
      $request->validate(
        [
          'username' => 'required|unique:users|regex:/^\S*$/',
        ],
        [
          'username.unique' => 'Username telah digunakan!',
          'username.regex' => 'Username tidak boleh mengandung spasi!'
        ]
      );
    }
    $request->validate([
      'cabor_id' => 'required',
    ]);
    User::where('id', $id)->update([
      'username' => $request->username,
      'cabor_id' => $request->cabor_id,
    ]);
    return redirect('/admin/pengurus')->with('toast_success', 'Data berhasil diupdate');
  }

  public function destroy(string $id)
  {
    User::destroy($id);
    return redirect('/admin/pengurus')->with('toast_success', 'Data berhasil dihapus');
  }
}
